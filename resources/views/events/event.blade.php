<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __($event->title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 h-full dark:bg-gray-800">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 h-full dark:bg-gray-800">
            <div class="flex flex-col md:flex-row">
                <!-- Div para la imagen -->
                <div class="md:w-1/2">
                    <img src="{{ asset('storage').'/'.$event->image_path }}" alt="{{ $event->title }}" class="w-full h-80 object-cover rounded">
                </div>
                
                <!-- Div para los detalles del evento -->
                <div class="md:w-1/2 p-4">
                    <p class="text-white mb-4">📝 Descripción: {{ $event->description }}</p>
                    <p class="text-white mb-4">📅 Fecha: {{ \Carbon\Carbon::parse($event->date_time)->format('d/m/Y H:i') }}</p>
                    <p class="text-white mb-4">📍 Localización: {{ $event->location }}</p>
                    <p class="text-white mb-4">🎟️ Tickets disponibles: {{ $event->available_tickets }}</p>
                    <p class="text-white mb-4">💰 Precio: {{ $event->price }}€</p>
                    <br>
                    <form action="{{ route('reservations.store') }}" method="POST" class="inline-block mt-2">
                        @csrf
                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                        <input type="hidden" name="price" value="{{ $event->price }}">
                        <label for="num_tickets" class="text-white">🎫 Número de tickets: </label>
                        <input type="number" name="num_tickets" value="1" min="1" max="{{ $event->available_tickets }}" class="ml-2 border rounded">
                        <button type="submit" class="bg-rose-500 text-white py-2 px-4 rounded hover:bg-rose-600">
                            ➕
                        </button>    
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</x-app-layout>