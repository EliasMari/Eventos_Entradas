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
    <div style="background-color: #f7fafc; padding: 24px;">
        <div style="max-width: 600px; margin: auto; background-color: white; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); padding: 24px;">
            <h1 style="font-size: 24px; font-weight: bold; text-align: center; color: #2d3748;">Confirmación de Pago</h1>
            <p style="margin-top: 16px; color: #4a5568;">Estimado {{ $ticketInfo['usuario'] }},</p>
            <p style="margin-top: 8px; color: #4a5568;">Gracias por su pago. A continuación, encontrará su información de entrada:</p>
            
            <div style="margin-top: 16px; padding: 16px; border: 1px solid #cbd5e0; border-radius: 8px;">
                <p style="font-weight: bold;">Información de la entrada:</p>
                <p style="color: #4a5568;">Evento: {{ $ticketInfo['evento'] }}</p>
                <p style="color: #4a5568;">Fecha y hora: {{ $ticketInfo['fecha_hora'] }}</p>
                <p style="color: #4a5568;">Número de entradas: {{ $ticketInfo['num_tickets'] }}</p>
            </div>
    
            <p style="margin-top: 16px; color: #4a5568; text-align: center;">¡Esperamos que disfrute del evento!</p>
        </div>
    </div>
</body>
</html>