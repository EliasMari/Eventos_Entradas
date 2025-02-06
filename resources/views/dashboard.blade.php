<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            @if($events->isEmpty())
                <p>No hay eventos disponibles.</p>
            @else
                <ul>
                @foreach($events as $event)
                    <div class="event-item mb-4 p-4 border rounded">
                        <img src="{{ asset($event->image_path) }}" alt="{{ $event->title }}" class="w-full h-48 object-cover rounded">
                        <h3 class="text-lg font-semibold">{{ $event->title }}</h3>
                        <p>Precio: ${{ $event->price }}</p>
                        <p>Tickets disponibles: {{ $event->available_tickets }}</p>
                        <p>Fecha: {{ $event->date_time }}</p>
                        <p>Localización: {{ $event->location }}</p>
                        <form action="{{ route('reservations.store') }}" method="POST" class="inline-block mt-2">
                                @csrf
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <button type="submit" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">
                                    Añadir
                                </button>
                            </form>
                        <br>
                        @if(auth()->user() && auth()->user()->hasRole('admin'))
                            <a href="{{ route('events.edit', $event->id) }}" class="inline-block mt-2 bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">
                                Editar
                            </a>
                            
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline-block mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">
                                    Eliminar
                                </button>
                            </form>
                        @endif
                    </div>
                @endforeach
                </ul>
            @endif
            </div>
        </div>
    </div>
</x-app-layout>
