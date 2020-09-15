<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje Recivido</title>
</head>
<body>
    <p><strong>Mensaje de Contacto</strong></p>
    <p>Resibiste un mensaje de: {{$msg['nombre']}}</p>
    <p>Con el Email: {{$msg['email']}}</p>
    <p>Su teléfono es: {{$msg['telefono']}}</p>
    <p><strong>Mensaje:</strong>{{$msg['mensaje']}}</p>

</body>
</html>