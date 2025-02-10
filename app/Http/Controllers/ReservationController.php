<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
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
    Reservation::create($reservation); // Usa create en lugar de insert para que se manejen los timestamps automáticamente
    Event::where('id', $reservation['event_id'])->decrement('available_tickets', $reservation['num_tickets']);

    return redirect('dashboard');
;
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
        return redirect()->route('reservations.index')->with('success', 'Reserva actualizada con éxito.');
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
