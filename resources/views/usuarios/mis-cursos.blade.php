<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Cursos</title>
</head>
<body>
    <h1>Mis Cursos</h1>
    <h2>Activos</h2>
<ul>
    @foreach($cursos as $curso)
        @php
            $inscripcion = $inscripciones->where('curso_id', $curso->id)->first();
        @endphp
        @if($inscripcion && $inscripcion->estado == 2)
            <li>
                <p>{{ $curso->nombre }}</p>
                <p>{{ $curso->descripcion}}</p>
                <p>Finalizado: {{ $curso->fecha_fin}}</p>
            </li>
        @endif
    @endforeach
</ul>

<h2>Inactivos</h2>
<ul>
    @foreach($cursos as $curso)
        @php
            $inscripcion = $inscripciones->where('curso_id', $curso->id)->first();
        @endphp
        @if($inscripcion && $inscripcion->estado == 3)
            <li>
                <p>{{ $curso->nombre }}</p>
                <p>{{ $curso->descripcion}}</p>
                <p>Finalizado: {{ $curso->fecha_fin}}</p>
            </li>
        @endif
    @endforeach
</ul>

<h2>Finalizados</h2>
<ul>
    @foreach($cursos as $curso)
        @php
            $inscripcion = $inscripciones->where('curso_id', $curso->id)->first();
        @endphp
        @if($inscripcion && $inscripcion->estado == 4)
            <li>
                <p>{{ $curso->nombre }}</p>
                <p>{{ $curso->descripcion}}</p>
                <p>Finalizado: {{ $curso->fecha_fin}}</p>
            </li>
        @endif
    @endforeach
</ul>

<h2>Cancelados</h2>
<ul>
    @foreach($cursos as $curso)
        @php
            $inscripcion = $inscripciones->where('curso_id', $curso->id)->first();
        @endphp
        @if($inscripcion && $inscripcion->estado == 5)
            <li>
                <p>{{ $curso->nombre }}</p>
                <p>{{ $curso->descripcion}}</p>
                <p>Finalizado: {{ $curso->fecha_fin}}</p>
            </li>
        @endif
    @endforeach
</ul>
</body>
</html>