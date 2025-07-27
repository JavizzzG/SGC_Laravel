<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos Disponibles</title>
    <link rel="stylesheet" href="{{ secure_asset('css/cursos.css') }}">
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('inicio') }}">Inicio</a></li>
            <li><a href="{{ route('mis-cursos') }}">Mis Cursos</a></li>
            <li><a href="{{ route('showPerfil') }}">Perfil</a></li>
            <li>
            <form method="GET" action="{{ route('cursosFiltrados') }}" class="search-form">
                <input type="text" name="busqueda" placeholder="Buscar..." class="search-input">
                <button type="submit" class="search-button">🔍</button>
            </form>
            </li>
        </ul>
    </nav>


    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="page-title">Cursos Disponibles</h1>
        @if($cursos->count() > 0)
        <div class="cards-wrapper">
            @foreach($cursos as $curso)
                @if($curso->activo && $curso->fecha_limite_inscripcion > now())
                    <div class="curso-card">
                        <h2>{{ $curso->nombre }}</h2>
                        <p>{{ $curso->descripcion }}</p>
                        <a href="{{ route('showCurso', $curso) }}" class="btn-ver">Ver Detalles</a>
                    </div>
                @endif
            @endforeach
        </div>
        @else
            <p>No hay cursos disponibles.</p>
        @endif
    </div>
</body>
</html>
