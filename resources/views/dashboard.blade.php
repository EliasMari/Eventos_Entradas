<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($events->isEmpty())
            <div class="flex justify-center items-center h-full w-full">
                <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">No hay eventos disponibles.</span>
                    <strong class="font-bold"><span>Estamos trabajando en ello</span></strong>
                </div>
            </div>
            @else
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($events as $event)
                        <div class="event-item bg-white shadow-lg rounded-lg p-4 transition-transform transform hover:scale-105">
                            <div class="flex flex-col">
                                <div class="flex-1 mb-2">
                                    <img src="{{ asset('storage').'/'.$event->image_path }}" alt="{{ $event->title }}" class="w-full h-64 object-cover rounded">
                                </div>
                                <hr class="my-4 border-t-2 border-gray-300">
                                <div class="flex-1 text-left">
                                    <h3 class="text-lg font-semibold">{{ $event->title }}</h3>
                                    <p class="text-gray-700">Precio: ${{ $event->price }}</p>
                                    <p class="text-gray-700">Tickets disponibles: {{ $event->available_tickets }}</p>
                                    <p class="text-gray-700">Fecha: {{ $event->date_time }}</p>
                                    <p class="text-gray-700">Localización: {{ $event->location }}</p>
                                    <div class="flex space-x-2 mt-2">
                                        <form action="{{ route('events.show', $event->id) }}" method="get">
                                            @csrf
                                            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                                                Ver
                                            </button>
                                        </form>
                                        @if(auth()->user() && auth()->user()->hasRole('admin'))
                                            <a href="{{ route('events.edit', $event->id) }}" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">
                                                Editar
                                            </a>
                                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="flex items-center">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">
                                                    Eliminar
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
