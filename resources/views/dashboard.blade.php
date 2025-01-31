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
                        <img src="{{ asset($event->image) }}" alt="{{ $event->title }}" class="w-full h-48 object-cover rounded">
                        <h3 class="text-lg font-semibold">{{ $event->title }}</h3>
                        <p>Precio: ${{ $event->price }}</p>
                        <p>Tickets disponibles: {{ $event->tickets }}</p>
                        <p>Fecha: {{ $event->date->format('d-m-Y') }}</p>
                        <p>Localización: {{ $event->location }}</p>
                        <a href="{{ route('payment', $event->id) }}" class="inline-block mt-2 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                            Pagar
                        </a>

                        @if(auth()->user() && auth()->user()->hasRole('admin'))
                            <a href="{{ route('events.edit', $event->id) }}" class="inline-block mt-2 bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600">
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
