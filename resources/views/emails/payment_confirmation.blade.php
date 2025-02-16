<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Pago</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        .qr-code {
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Confirmación de Pago</h1>
        <p>Estimado usuario,</p>
        <p>Gracias por su pago. A continuación, encontrará su información de entrada:</p>
        
        <div class="ticket-info">
            <p><strong>Información de la entrada:</strong></p>
            <p>{{ $ticketInfo }}</p>
        </div>

        <div class="qr-code">
            <p><strong>Su código QR:</strong></p>
            <img src="{{ $qrCode }}" alt="Código QR">
        </div>

        <p>¡Esperamos que disfrute del evento!</p>
    </div>
</body>
</html>