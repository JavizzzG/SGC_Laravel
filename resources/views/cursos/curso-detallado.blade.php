<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso Detallado</title>
    <link rel="stylesheet" href="{{ secure_asset('css/curso-detalle.css') }}">
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('inicio') }}">Inicio</a></li>
            <li><a href="{{ route('mis-cursos') }}">Mis Cursos</a></li>
            <li><a href="{{ route('showPerfil') }}">Perfil</a></li>
            <li><a href="{{ url()->previous() }}">Volver</a></li>
        </ul>
    </nav>

    <div class="container">
        @if($curso->activo)
            <h1 class="curso-title">{{ $curso->nombre }}</h1>

            <div class="curso-info">
                <p><strong>Descripción:</strong> {{ $curso->descripcion }}</p>
                <p><strong>Fecha límite de inscripción:</strong> {{ $curso->fecha_limite_inscripcion }}</p>
                <p><strong>Fecha de inicio:</strong> {{ $curso->fecha_inicio }}</p>
                <p><strong>Fecha de fin:</strong> {{ $curso->fecha_fin }}</p>
                <p><strong>Cupo máximo:</strong> {{ $curso->cupo_maximo }}</p>

                @if($curso->imagen)
                    <div class="curso-imagen">
                        <img src="{{ secure_asset('storage/' . $curso->imagen) }}" alt="Imagen del Curso">
                    </div>
                @endif
            </div>

            <a href="{{ route('inscribirCurso', $curso->id) }}" class="btn-inscribirse">Inscribirse al Curso</a>
        @else
            <h1 class="curso-inactivo">Curso Inactivo</h1>
            <p>Este curso no está disponible actualmente.</p>
        @endif

        <div class="volver">
            <a href="{{ route('cursos') }}" class="btn-volver">← Volver a cursos</a>
        </div>
    </div>
</body>
</html>
