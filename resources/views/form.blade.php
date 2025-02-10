
<div class="mb-4">
    <label for="title">Título del Evento:</label>
    <input type="text" name="title" id="title" value="{{ isset($event) ? $event->title : '' }}" placeholder="Título del Evento" required><br><br>
</div>

<div class="mb-4">
    <label for="description">Descripción:</label>
    <textarea name="description" id="description" placeholder="Descripción" required>{{ isset($event) ? $event->description : '' }}</textarea><br><br>
</div>

<div class="mb-4">
    <label for="location">Localización:</label>
    <input type="text" name="location" id="location" value="{{ isset($event) ? $event->location : '' }}" placeholder="Localización" required><br><br>
</div>

<div class="mb-4">
    <label for="available_tickets">Tickets disponibles:</label>
    <input type="number" name="available_tickets" id="available_tickets" value="{{ isset($event) ? $event->available_tickets : '' }}" required><br><br>
</div>

<div class="mb-4">
    <label for="price">Precio:</label>
    <input type="number" name="price" id="price" value="{{ isset($event) ? $event->price : '' }}" required><br><br>
</div>

<div class="mb-4">
    <label for="image_path">Imagen del Evento:</label>
    <input type="file" name="image_path" id="image_path" required><br><br>
</div>

<div class="mb-4">
    <label for="date_time">Fecha del Evento:</label>
    <input type="datetime-local" name="date_time" id="date_time" value="{{ isset($event) ? $event->date_time : '' }}" required><br><br>
</div>

<button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-500 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
    Guardar
</button>