<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <h1>Bienvenido al panel de administración</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <h2><a href="{{ route('cursos-admin') }}">Ver Cursos</a></h2>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Cerrar Sesión</button>
    </form>

    <h2>Estadísticas</h2>
    <h3>{{ $cursos->count() }} Cursos Activos</h3>
    <h3>{{ $inscripciones->count() }} Inscripciones Realizadas</h3>
    <h3>{{ $inscripciones->where('estado', 2)->count() }} Inscripciones Aprobadas</h3>
    <h3>{{ $inscripciones->count() / $cursos->count() }} Promedio de Inscripciones por Curso</h3>
</body>
</html>