
    <div class="mb-4">
        <label for="title" class="block text-sm font-medium text-gray-700">Título del Evento</label>
        <input type="text" name="title" id="title" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
    </div>

    <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
        <textarea name="description" id="description" rows="4" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
    </div>

    <div class="mb-4">
        <label for="location" class="block text-sm font-medium text-gray-700">Localización</label>
        <input type="text" name="location" id="location" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
    </div>

    <div class="mb-4">
        <label for="price" class="block text-sm font-medium text-gray-700">Precio</label>
        <input type="number" name="price" id="price" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
    </div>

    <div class="mb-4">
        <label for="tickets" class="block text-sm font-medium text-gray-700">Tickets disponibles</label>
        <input type="number" name="tickets" id="tickets" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
    </div>

    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Imagen del Evento</label>
        <input type="file" name="image" id="image" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
    </div>

    <div class="mb-4">
        <label for="date" class="block text-sm font-medium text-gray-700">Fecha del Evento</label>
        <input type="date" name="date" id="date" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
    </div>

    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-500 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Guardar
    </button>