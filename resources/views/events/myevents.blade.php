<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('My Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-between">
            @if($reservations->isEmpty())
                <div class="flex justify-center items-center h-96 w-full">
                    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">No tienes eventos reservados.</span>
                        <strong class="font-bold"><a href="{{ route('events.index') }}">¡Empieza ya a reservar!</a></strong>
                    </div>
                </div>
            @else
                @foreach ($reservations as $reservation)
                    <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-6 m-1 w-96 min-h-96">
                        <h3 class="text-xl font-semibold text-blue-600 mb-4">{{ $reservation->event->title }}</h3>
                        <img src="{{ asset($reservation->qr_code) }}" alt="Codigo QR" class="mb-4">
                        <div>
                            <p>📍{{ $reservation->event->location }}</p>
                            <p>📅{{ \Carbon\Carbon::parse($reservation->event->date_time)->format('d/m/Y H:i') }}</p>
                            <p>💰Precio Total: {{ $reservation->total_price }}€</p>
                            <p>🎟️Tickets Reservados: {{ $reservation->num_tickets }}</p>
                        </div>
                        <br>
                        <div class="flex gap-2">
                            @if ($reservation->status === 'pending')
                                <form action="{{ route('reservations.edit', $reservation->id) }}" method="get">
                                        @csrf
                                    <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">
                                        Comprar
                                    </button>
                                </form>
                            @endif
                            <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">
                                    Cancelar
                                </button>
                            </form>
                        </div>
                        <br>
                        <div class="{{ $reservation->status === 'pending' ? 'bg-yellow-500' : 'bg-green-500' }} text-white p-2 rounded w-full text-center">
                            <p>
                                {{ $reservation->status }}
                            </p>
                        </div>
                    </div>
                @endforeach  
            @endif
        </div>
    </div>
</div>
@include('layouts.footer')
</x-app-layout>