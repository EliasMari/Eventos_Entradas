<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all(); // Obtiene todos los eventos
        return view('dashboard', compact('events')); // Pasa los eventos a la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([]);
        $event = $request->except('_token');

        if($request->hasFile('image_path')) {
            $event['image_path'] = $request->file('image_path')->store('uploads', 'public');
        }

        Event::create($event);
        return redirect('dashboard');
        // return response()->json($event);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id);
        return view('events.event', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $event = $request->except('_token', '_method');
        if($request->hasFile('image_path')) {
            $image = Event::findOrFail($id);
            Storage::delete(/**'public/'.*/$image->image_path);
            $event['image_path'] = $request->file('image_path')->store('uploads', 'public');
        }
        Event::where('id', $id)->update($event);
        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect('dashboard');
    }
}
