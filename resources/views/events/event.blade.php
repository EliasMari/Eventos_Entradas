<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($event->title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="event-item mb-4 p-4 border rounded">
                    <p>{{ $event->description }}</p>
                    <img src="{{ asset('storage').'/'.$event->image_path }}" alt="{{ $event->title }}" class="w-full h-48 object-cover rounded">
                    <p>Precio: ${{ $event->price }}</p>
                    <p>Tickets disponibles: {{ $event->available_tickets }}</p>
                    <p>Fecha: {{ $event->date_time }}</p>
                    <p>Localización: {{ $event->location }}</p>
                    <br>
                    <form action="{{ route('reservations.store') }}" method="POST" class="inline-block mt-2">
                        @csrf
                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                        <input type="hidden" name="price" value="{{ $event->price }}">
                        <label for="">Número de tickets:</label>
                        <input type="number" name="num_tickets" value="1" min="1">
                        <button type="submit" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">
                            Añadir
                        </button>    
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>