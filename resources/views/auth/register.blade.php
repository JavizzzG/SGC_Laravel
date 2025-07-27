<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="{{ secure_asset('css/register.css') }}">
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('cursos') }}">Cursos</a></li>
            <li><a href="{{ url()->previous() }}">Volver</a></li>
            <li><a href="{{ route('index') }}">Regresar al Inicio</a></li>
        </ul>
    </nav>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="auth-container">
        <div class="auth-card">
            <h1 class="form-title">Registro de Usuario</h1>

            <form method="POST" action="{{ route('storeUser') }}" class="auth-form">
                @csrf

                <div class="form-group">
                    <label for="documento">Documento</label>
                    <input type="text" id="documento" name="documento" value="{{ old('documento') }}" required>
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                </div>

                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido" name="apellido" value="{{ old('apellido') }}" required>
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" id="telefono" name="telefono" value="{{ old('telefono') }}" placeholder="Opcional">
                </div>

                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmar Contraseña</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary">Registrar</button>
                    <a href="{{ route('login.form') }}" class="link">¿Ya tienes cuenta? Inicia sesión</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
