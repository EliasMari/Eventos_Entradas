<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Pago de Entradas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h3>Información del Evento</h3>
                    <p><strong>Nombre del Evento:</strong> {{ $reservation->event->title }}</p>
                    <p><strong>Ubicación:</strong> {{ $reservation->event->location }}</p>
                    <p><strong>Fecha y Hora:</strong> {{ $reservation->event->date_time }}</p>
                    <p><strong>Precio Total:</strong> {{ $reservation->total_price }}</p>
                    <p><strong>Tickets Reservados:</strong> {{ $reservation->num_tickets }}</p>
                </div>

                <div>
                    <h3 class="mt-4">Formulario de Pago</h3>
                    <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="payment_method">Método de Pago:</label>
                            <select name="payment_method" id="payment_method" class="form-control" required onchange="togglePaymentFields()">
                                <option value="">Seleccione un método</option>
                                <option value="credit_card">Tarjeta de Crédito</option>
                                <option value="paypal">PayPal</option>
                            </select>
                        </div>

                        <div id="credit_card_fields" style="display:none;">
                            <h4>Detalles de la Tarjeta de Crédito</h4>
                            <div class="form-group">
                                <label for="card_number">Número de Tarjeta:</label>
                                <input type="text" name="card_number" id="card_number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="expiry_date">Fecha de Expiración:</label>
                                <input type="text" name="expiry_date" id="expiry_date" class="form-control" required placeholder="MM/AA">
                            </div>
                            <div class="form-group">
                                <label for="cvv">CVV:</label>
                                <input type="text" name="cvv" id="cvv" class="form-control" required>
                            </div>
                        </div>

                        <div id="paypal_fields" style="display:none;">
                            <h4>Detalles de PayPal</h4>
                            <div class="form-group">
                                <label for="paypal_email">Correo Electrónico de PayPal:</label>
                                <input type="email" name="paypal_email" id="paypal_email" class="form-control" required>
                            </div>
                        </div>

                        <button type="submit" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600 mt-4">
                            Realizar Pago
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePaymentFields() {
            var method = document.getElementById("payment_method").value;
            document.getElementById("credit_card_fields").style.display = method === "credit_card" ? "block" : "none";
            document.getElementById("paypal_fields").style.display = method === "paypal" ? "block" : "none";
        }
    </script>
    @include('layouts.footer')
</x-app-layout>