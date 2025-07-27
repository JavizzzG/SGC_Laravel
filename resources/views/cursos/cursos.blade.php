<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos</title>
</head>
<body>
    <h1>Cursos</h1>
    <ul>
        @foreach($cursos as $curso)
        @if( $curso->activo && $curso->fecha_limite_inscripcion > now())
            <li>{{ $curso->nombre }}</li>
            <p>{{ $curso->descripcion }}</p>
            <a href="{{ route('showCurso', $curso) }}">Ver detalles</a>
        @endif
        @endforeach
    </ul>
</body>
</html>