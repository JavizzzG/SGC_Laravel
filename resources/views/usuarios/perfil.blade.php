<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="{{ secure_asset('css/perfil.css') }}">
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('cursos') }}">Cursos</a></li>
            <li><a href="{{ url()->previous() }}">Volver</a></li>
            <li><a href="{{ route('inicio') }}">Regresar al Inicio</a></li>
        </ul>
    </nav>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="perfil-container">
        <div class="perfil-card">
            <h1 class="perfil-title">Perfil de Usuario</h1>

            <p><strong>Nombre:</strong> {{ auth()->user()->nombre }}</p>
            <p><strong>Apellido:</strong> {{ auth()->user()->apellido }}</p>
            <p><strong>Documento:</strong> {{ auth()->user()->documento }}</p>
            <p><strong>Teléfono:</strong> {{ auth()->user()->telefono }}</p>
            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>

            <div class="perfil-actions">
                <a href="{{ route('editPerfil') }}" class="btn-primary">Editar Perfil</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-secondary">Cerrar Sesión</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
