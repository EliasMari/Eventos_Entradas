<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($events->isEmpty())
                <div class="flex justify-center items-center h-96 w-full">
                    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">No hay eventos disponibles.</span>
                        <strong class="font-bold"><span>Estamos trabajando en ello</span></strong>
                    </div>
                </div>
            @else
                @if(auth()->user() && auth()->user()->hasRole('admin'))
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="dark:bg-gray-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Imagen</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Título</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Precio</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Tickets Disponibles</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Fecha</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Localización</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="dark:bg-gray-800 divide-y divide-gray-200">
                        @foreach($events as $event)
                            <tr>
                                <td><img src="{{ asset('storage').'/'.$event->image_path }}" alt="{{ $event->title }}" class="w-24 h-24 object-cover rounded"></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ $event->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-white">💰 {{ $event->price }}€</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-white">🎟️ {{ $event->available_tickets }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-white">📅 {{ \Carbon\Carbon::parse($event->date_time)->format('d/m/Y H:i') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-white">📍 {{ $event->location }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('events.edit', $event->id) }}" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600 transition">
                                            ✏️ Editar
                                        </a>
                                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="flex items-center">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 transition">
                                                🗑️ Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                 <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-6 dark:bg-gray-800">
                      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                          @foreach($events as $event)
                              <div class="event-item bg-white shadow-lg rounded-lg p-6 transition-transform transform hover:scale-105 dark:bg-gray-700">
                                  <div class="flex flex-col">
                                  @if ($event->available_tickets <= 0)
                                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white font-semibold text-3xl tracking-wide uppercase rounded-lg backdrop-blur-sm">
                                        <span class="px-4 py-2 bg-red-600 bg-opacity-80 text-white rounded-md shadow-md">SOLD OUT</span>
                                    </div>
                                    @endif
                                      <div class="flex-1 mb-4">
                                          <img src="{{ asset('storage').'/'.$event->image_path }}" alt="{{ $event->title }}" class="w-full h-64 object-cover rounded">
                                      </div>
                                      <hr class="my-4 border-gray-300 dark:border-gray-600">
                                      <div class="flex-1 text-left">
                                          <h3 class="text-xl font-semibold text-blue-600">{{ $event->title }}</h3>
                                          <p class="text-gray-700 dark:text-gray-300">💰 Precio: {{ $event->price }}€</p>
                                          <p class="text-gray-700 dark:text-gray-300">🎟️ Tickets disponibles: {{ $event->available_tickets }}</p>
                                          <p class="text-gray-700 dark:text-gray-300">📅 Fecha: {{ \Carbon\Carbon::parse($event->date_time)->format('d/m/Y H:i') }}</p>
                                          <p class="text-gray-700 dark:text-gray-300">📍 Localización: {{ $event->location }}</p>
                                          <div class="flex space-x-2 mt-4">
                                              <form action="{{ route('events.show', $event->id) }}" method="get">
                                                  @csrf
                                                  <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition">
                                                      🔍 Ver
                                                  </button>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          @endforeach
                      </div>
                  </div>
                @endif
            @endif
            </div>
    </main>
    @include('layouts.footer')
</x-app-layout>