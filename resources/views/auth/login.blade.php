<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('cursos') }}">Cursos</a></li>
            <li><a href="{{ url()->previous() }}">Volver</a></li>
            <li><a href="{{ route('index') }}">Regresar al Inicio</a></li>
        </ul>
    </nav>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="auth-container">
        <div class="auth-card">
            <h1 class="form-title">Inicio de Sesión</h1>

            <form class="auth-form" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary">Iniciar Sesión</button>
                    <a href="{{ route('register') }}" class="link">¿Aún no tienes cuenta? Regístrate</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
