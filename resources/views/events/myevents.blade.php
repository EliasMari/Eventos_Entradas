<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-between">
            @if($reservations->isEmpty())
                <div class="flex justify-center items-center h-full w-full">
                    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">No tienes eventos reservados.</span>
                        <strong class="font-bold"><a href="{{ route('events.index') }}">¡Empiza ya a reservar!</a></strong>
                    </div>
                </div>
            @else
                @foreach ($reservations as $reservation)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 m-1 w-96 min-h-96"> <!-- Ajusta el ancho y establece una altura mínima -->
                        <h3>{{ $reservation->event->title }}</h3>
                        <img src="{{ asset($reservation->qr_code) }}" alt="Codigo QR">
                        <p>{{ $reservation->event->location }}</p>
                        <p>{{ $reservation->event->date_time }}</p>
                        <p>Precio Total: {{ $reservation->total_price }}</p>
                        <p>Tickets Reservados: {{ $reservation->num_tickets }}</p>
                        <p class="{{ $reservation->status === 'pending' ? 'text-red-500' : 'text-green-500' }}">
                            {{ $reservation->status }}
                        </p>
                        <form action="{{ route('reservations.edit', $reservation->id) }}" method="get">
                            @csrf
                            <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">
                                Comprar
                            </button>
                        </form>
                        <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">
                                Cancelar
                            </button>
                        </form>
                    </div>
                @endforeach  
            @endif
        </div>
    </div>
</div>
</x-app-layout>
