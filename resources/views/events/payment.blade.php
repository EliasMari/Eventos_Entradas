<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Payment') }}
        </h2>
    </x-slot>

    <div class="dark:bg-gray-900 min-h-screen flex justify-center items-center mb-6">
        <div class="max-w-4xl w-full dark:bg-gray-800 dark:shadow-lg rounded-lg overflow-hidden p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-white">
                <div>
                    <h3 class="text-blue-600 font-semibold text-lg">Información del Evento</h3>
                    <p><strong>Nombre del Evento:</strong> {{ $reservation->event->title }}</p>
                    <p><strong>Ubicación:</strong> {{ $reservation->event->location }}</p>
                    <p><strong>Fecha y Hora:</strong> {{ \Carbon\Carbon::parse($reservation->event->date_time)->format('d/m/Y H:i') }}</p>
                    <p><strong>Precio Total:</strong> {{ $reservation->total_price }}</p>
                    <p><strong>Tickets Reservados:</strong> {{ $reservation->num_tickets }}</p>
                </div>
                <div>
                    <h3 class="text-blue-600 font-semibold text-lg">Formulario de Pago</h3>
                    <form action="{{ route('reservations.update', $reservation->id) }}" method="POST" class="mt-4">
                        @csrf
                        @method('PUT')
                        <label for="payment_method" class="block font-semibold text-white">Método de Pago:</label>
                        <select name="payment_method" id="payment_method" class="w-full p-2 border rounded-lg text-gray-800" required onchange="methods()">
                            <option value="">Seleccione un método</option>
                            <option value="credit_card">Tarjeta de Crédito</option>
                            <option value="paypal">PayPal</option>
                        </select>
                        
                        <div id="credit_card_fields" class="mt-4 hidden">
                            <h4 class="font-semibold text-white">Detalles de la Tarjeta de Crédito</h4>
                            <input type="text" name="card_number" id="card_number" class="w-full p-2 border rounded-lg text-gray-800 mt-2" placeholder="Número de Tarjeta" required>
                            <input type="text" name="expiry_date" id="expiry_date" class="w-full p-2 border rounded-lg text-gray-800 mt-2" placeholder="MM/AA" required>
                            <input type="text" name="cvv" id="cvv" class="w-full p-2 border rounded-lg text-gray-800 mt-2" placeholder="CVV" required>
                        </div>

                        <div id="paypal_fields" class="mt-4 hidden">
                            <h4 class="font-semibold text-white">Detalles de PayPal</h4>
                            <input type="email" name="paypal_email" id="paypal_email" class="w-full p-2 border rounded-lg text-gray-800 mt-2" placeholder="Correo Electrónico de PayPal" required>
                        </div>

                        <button type="submit" class="w-full bg-rose-500 text-white py-2 px-4 rounded-lg hover:bg-rose-600 mt-4">
                            Realizar Pago
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function methods() {
            var method = document.getElementById("payment_method").value;
            document.getElementById("credit_card_fields").classList.toggle("hidden", method !== "credit_card");
            document.getElementById("paypal_fields").classList.toggle("hidden", method !== "paypal");
        }
    </script>
    @include('layouts.footer')
</x-app-layout>
