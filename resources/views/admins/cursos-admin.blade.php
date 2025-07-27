<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos - Administración</title>
    <link rel="stylesheet" href="{{ secure_asset('css/cursos-admin.css') }}">
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('inicio-admin') }}">Inicio</a></li>
            <li><a href="{{ url()->previous() }}">Volver</a></li>
            <li>
            <form method="GET" action="{{ route('cursosFiltradosAdmin') }}" class="search-form">
                <input type="text" name="busqueda" placeholder="Buscar..." class="search-input">
                <button type="submit" class="search-button">🔍</button>
            </form>
            </li>
        </ul>
    </nav>

    <main class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="header">
            <h1 class="title">Gestión de Cursos</h1>
            <a class="btn-create" href="{{ route('createCurso') }}">+ Crear Curso</a>
        </div>

        <section class="course-list">
            @forelse($cursos as $curso)
                <div class="course-card">
                    <h2>{{ $curso->nombre }}</h2>
                    <p>{{ $curso->descripcion }}</p>
                    <a class="btn-details" href="{{ route('showCursoAdmin', $curso) }}">Ver detalles</a>
                </div>
            @empty
                <p>No hay cursos registrados aún.</p>
            @endforelse
        </section>
    </main>
</body>
</html>
