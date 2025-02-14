<!-- Título del Evento -->
<div class="mb-4">
        <label for="title" class="block text-sm font-medium text-white">Título del Evento:</label>
        <input type="text" name="title" id="title" value="{{ isset($event) ? $event->title : '' }}" placeholder="Título del Evento" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-indigo-500">
    </div>

    <!-- Descripción -->
    <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-white">Descripción:</label>
        <textarea name="description" id="description" placeholder="Descripción" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-indigo-500">{{ isset($event) ? $event->description : '' }}</textarea>
    </div>

    <!-- Localización -->
    <div class="mb-4">
        <label for="location" class="block text-sm font-medium text-white">Localización:</label>
        <input type="text" name="location" id="location" value="{{ isset($event) ? $event->location : '' }}" placeholder="Localización" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-indigo-500">
    </div>

    <!-- Tickets disponibles -->
    <div class="mb-4">
        <label for="available_tickets" class="block text-sm font-medium text-white">Tickets disponibles:</label>
        <input type="number" name="available_tickets" id="available_tickets" value="{{ isset($event) ? $event->available_tickets : '' }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-indigo-500">
    </div>

    <!-- Precio -->
    <div class="mb-4">
        <label for="price" class="block text-sm font-medium text-white">Precio:</label>
        <input type="number" name="price" id="price" value="{{ isset($event) ? $event->price : '' }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-indigo-500">
    </div>

    <!-- Imagen del Evento -->
    <div class="mb-4">
        <label for="image_path" class="block text-sm font-medium text-white">Imagen del Evento:</label>
        @if(isset($event))
            <img src="{{ asset('storage').'/'.$event->image_path }}" width="50" height="50" alt="Imagen del Evento" class="mb-2">
        @endif
        <input type="file" name="image_path" id="image_path" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-indigo-500">
    </div>

    <!-- Fecha del Evento -->
    <div class="mb-4">
        <label for="date_time" class="block text-sm font-medium text-white">Fecha del Evento:</label>
        <input type="datetime-local" name="date_time" id="date_time" value="{{ isset($event) ? $event->date_time : '' }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-indigo-500">
    </div>

    <!-- Botón de Guardar -->
    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-500 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Guardar
    </button>