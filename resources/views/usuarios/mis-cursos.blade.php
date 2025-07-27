<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Cursos</title>
    <link rel="stylesheet" href="{{ secure_asset('css/mis-cursos.css') }}">
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('inicio') }}">Inicio</a></li>
            <li><a href="{{ route('showPerfil') }}">Perfil</a></li>
            <li><a href="{{ route('cursos') }}">Cursos</a></li>
            <li><a href="{{ url()->previous() }}">Volver</a></li>
        </ul>
    </nav>

    <div class="container">
        <h1 class="title">Mis Cursos</h1>

        @php
            $estados = [
                2 => 'Activos',
                3 => 'Inactivos',
                4 => 'Finalizados',
                5 => 'Cancelados'
            ];
        @endphp

        @foreach($estados as $estado => $titulo)
            <section class="curso-seccion">
                <h2 class="seccion-titulo">{{ $titulo }}</h2>
                <ul class="curso-lista">
                    @foreach($cursos as $curso)
                        @php
                            $inscripcion = $inscripciones->where('curso_id', $curso->id)->first();
                        @endphp
                        @if($inscripcion && $inscripcion->estado == $estado)
                            <li class="curso-item">
                                <h3>{{ $curso->nombre }}</h3>
                                <p>{{ $curso->descripcion }}</p>
                                <p><strong>Finaliza:</strong> {{ $curso->fecha_fin }}</p>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </section>
        @endforeach
    </div>
</body>
</html>
