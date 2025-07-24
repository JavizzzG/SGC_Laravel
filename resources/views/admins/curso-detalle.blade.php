<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Curso</title>
</head>
<body>
    <h1>Detalles del Curso: {{ $curso->nombre }}</h1>
    <p><strong>Descripción:</strong> {{ $curso->descripcion }}</p>
    <p><strong>Fecha de Inscripción:</strong> {{ $curso->fecha_limite_inscripcion }}</p>
    <p><strong>Fecha de Inicio:</strong> {{ $curso->fecha_inicio }}</p>
    <p><strong>Fecha de Fin:</strong> {{ $curso->fecha_fin }}</p>
    <p><strong>Cupo Máximo:</strong> {{ $curso->cupo_maximo }}</p>
    <p><strong>Estado:</strong> {{ $curso->activo ? 'Activo' : 'Inactivo' }}</p>
    <h2>Acciones</h2>
    <form method="GET" action="{{ route('editCurso', $curso) }}">
        <button type="submit">Editar Curso</button>
    </form>
    <form method="POST" action="{{ route('destroyCurso', $curso) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar Curso</button>
    </form>
</body>
</html>