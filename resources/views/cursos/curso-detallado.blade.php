<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso Detallado</title>
</head>
<body>
    <h1>Detalles del Curso: {{ $curso->nombre }}</h1>
    <p><strong>Descripción:</strong> {{ $curso->descripcion }}</p>
    <p><strong>Fecha de Inicio:</strong> {{ $curso->fecha_inicio }}</p>
    <p><strong>Fecha de Fin:</strong> {{ $curso->fecha_fin }}</p>
    <p><strong>Cupo Máximo:</strong> {{ $curso->cupo_maximo }}</p>
</body>
</html>