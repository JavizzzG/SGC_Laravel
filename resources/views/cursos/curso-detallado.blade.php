<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso Detallado</title>
</head>
<body>
    @if( $curso->activo )
    <h1>Detalles del Curso: {{ $curso->nombre }}</h1>
    <p><strong>Descripción:</strong> {{ $curso->descripcion }}</p>
    <p><strong>Fecha Límite de Inscripción:</strong> {{ $curso->fecha_limite_inscripcion }}</p>
    <p><strong>Fecha de Inicio:</strong> {{ $curso->fecha_inicio }}</p>
    <p><strong>Fecha de Fin:</strong> {{ $curso->fecha_fin }}</p>
    <p><strong>Cupo Máximo:</strong> {{ $curso->cupo_maximo }}</p>
    @if($curso->imagen)
        <p><strong>Imagen del Curso:</strong></p>
        <img src="{{ asset('storage/' . $curso->imagen) }}" alt="Imagen del Curso" style="max-width: 300px; max-height: 200px;">
    @endif

    <h2><a href="{{ route('inscribirCurso', $curso->id) }}">Inscribirse al Curso</a></h2>

    @else
        <h1>Curso Inactivo</h1>
        <p>Este curso no está disponible actualmente.</p>
    @endif
</body>
</html>