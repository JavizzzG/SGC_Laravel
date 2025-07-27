<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Curso</title>
    <link rel="stylesheet" href="{{ secure_asset('css/detalleC-admin.css') }}">
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('inicio-admin') }}">Inicio</a></li>
            <li><a href="{{ route('cursos-admin') }}">Cursos</a></li>
            <li><a href="{{ url()->previous() }}">Volver</a></li>
        </ul>
    </nav>

    <main class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <h1 class="title">Detalles del Curso</h1>

        <div class="curso-info">
            <p><strong>Nombre:</strong> {{ $curso->nombre }}</p>
            <p><strong>Descripción:</strong> {{ $curso->descripcion }}</p>
            <p><strong>Fecha de Inscripción:</strong> {{ $curso->fecha_limite_inscripcion }}</p>
            <p><strong>Fecha de Inicio:</strong> {{ $curso->fecha_inicio }}</p>
            <p><strong>Fecha de Fin:</strong> {{ $curso->fecha_fin }}</p>
            <p><strong>Cupo Máximo:</strong> {{ $curso->cupo_maximo }}</p>
            <p><strong>Estado:</strong> {{ $curso->activo ? 'Activo' : 'Inactivo' }}</p>

            @if($curso->imagen)
                <p><strong>Imagen del Curso:</strong></p>
                <img src="{{ asset('storage/' . $curso->imagen) }}" alt="Imagen del Curso" class="curso-img">
            @endif
        </div>

        <div class="actions">
            <form method="GET" action="{{ route('editCurso', $curso) }}">
                <button type="submit" class="btn edit">Editar Curso</button>
            </form>
            <form method="POST" action="{{ route('destroyCurso', $curso) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn delete">Eliminar Curso</button>
            </form>
            <a href="{{ route('inscri-detalles', $curso->id) }}" class="btn view">Ver Inscripciones</a>
        </div>
    </main>
</body>
</html>
