<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Administrador</title>
    <link rel="stylesheet" href="{{ secure_asset('css/inicio-admin.css') }}">
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('cursos-admin') }}">Cursos</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit">Cerrar Sesión</button>
                </form>
            </li>
        </ul>
    </nav>

    <main class="container">
        <h1 class="title">Panel de Administración</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="stats-card">
            <h2 class="subtitle">Estadísticas</h2>
            <ul class="stats-list">
                <li><strong>{{ $cursos->count() }}</strong> Cursos Activos</li>
                <li><strong>{{ $inscripciones->count() }}</strong> Inscripciones Realizadas</li>
                <li><strong>{{ $inscripciones->where('estado', 2)->count() }}</strong> Inscripciones Aprobadas</li>
                <li><strong>{{ round($inscripciones->count() / max($cursos->count(),1), 2) }}</strong> Promedio de Inscripciones por Curso</li>
            </ul>
        </div>

        <div class="h22-container">
            <h2 class="tittle"><a href="{{ route('cursos-admin') }}">Administrar Cursos</h2>
        </div>

    </main>
</body>
</html>
