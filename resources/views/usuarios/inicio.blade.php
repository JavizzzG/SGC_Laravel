<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
    <title>Inicio</title>
</head>
<body>
    <nav>
            <ul>
                <li><a href="{{ route('cursos') }}">Cursos</a></li>
                @guest
                    <li><a href="{{ route('login.form') }}">Iniciar Sesión</a></li>
                    <li><a href="{{ route('register') }}">Registrarse</a></li>
                @else
                    <li>
                        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                            @csrf
                            <button type="submit">Cerrar Sesión</button>
                        </form>
                    </li>
                @endguest
            </ul>
        </nav>
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
    <div class="card-container">
        <div class="action-card">
            <a href="{{ route('cursos') }}">
                <h2>Cursos</h2>
                <p>Explora todos los cursos disponibles.</p>
            </a>
        </div>
        <div class="action-card">
            <a href="{{ route('mis-cursos') }}">
                <h2>Mis Cursos</h2>
                <p>Revisa los cursos en los que estás inscrito.</p>
            </a>
        </div>
        <div class="action-card">
            <a href="{{ route('showPerfil') }}">
                <h2>Perfil</h2>
                <p>Ver y editar tu información personal.</p>
            </a>
        </div>
        <div class="action-card">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" claSS="card-button">
                    <h2>Cerrar Sesión</h2>
                    <p>Salir de tu cuenta de usuario.</p>
                </button>
            </form>
        </div>
    </div>
</body>
</html>