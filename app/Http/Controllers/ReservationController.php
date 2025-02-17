<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Mail\PaymentConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all(); // Obtiene todos los eventos
        $reservations = Reservation::where('user_id', auth()->user()->id)->get(); // Obtiene todas las reservas
        return view('events.myevents', compact('events', 'reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $reservation = $request->except('_token', '_method');
    $reservation['user_id'] = auth()->user()->id; // Asegúrate de que esto sea correcto
    $reservation['total_price'] = $reservation['num_tickets'] * $reservation['price'];
    
    $fileName = 'reservation_' . time() . '.png';
    $userName = auth()->user()->name; // Obtén el nombre del usuario
    $qrContent = "Usuario: $userName, Tickets: {$reservation['num_tickets']}"; // Crea el contenido del QR
    $qrCode = QrCode::format('png')->size(300)->generate($qrContent);
    Storage::disk('public')->put($fileName, $qrCode);
    $reservation['qr_code'] = $fileName;

    Reservation::create($reservation); // Usa create en lugar de insert para que se manejen los timestamps automáticamente
    Event::where('id', $reservation['event_id'])->decrement('available_tickets', $reservation['num_tickets']);

    return redirect('dashboard');

}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('events.payment', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $reservation = Reservation::findOrFail($id);
        $reservation->update(['status' => 'confirmed']);

        // Obtener el QR y la información de la entrada
        //$qrCode = Storage::disk('public')->url($reservation->qr_code);
        // Obtener la información de la entrada
        try {
            $event = Event::find($reservation->event_id); // Asegúrate de que tienes el evento
            $ticketInfo = [
                'usuario' => auth()->user()->name,
                'num_tickets' => $reservation->num_tickets,
                'evento' => $event->title,
                'fecha_hora' => $event->date_time,
            ];

            // Enviar el correo
            Mail::to($request->user()->email)->send(new PaymentConfirmation($ticketInfo));
        } catch (\Throwable $th) {
            //throw $th;
        } finally {
            return redirect()->route('reservations.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        Event::where('id', $reservation->event_id)->increment('available_tickets', $reservation->num_tickets);
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Reserva eliminada con éxito.');
    }
}
