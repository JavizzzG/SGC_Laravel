<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de inicio</title>
</head>
<body>
    @if(session('success'))
        <div>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <h1>Bienvenido a la página de inicio</h1>
    <p>Esta es una página de ejemplo para mostrar cómo se ve una vista en Laravel.</p>
    
    <p>Para más información, visita la <a href="https://laravel.com/docs">documentación de Laravel</a>.</p>

    <h2><a href="{{ route('login.form') }}">Iniciar Sesión</a></h2>
    <h2><a href="{{ route('register') }}">Registrarse</a></h2>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Cerrar Sesión</button>
    </form>
    <h2><a href="{{ route('cursos') }}">Ver Cursos</a></h2>

    @foreach($usuarios as $usuario)
        <div>
            <h3>{{ $usuario->nombre }} {{ $usuario->apellido }}</h3>
            <p>Documento: {{ $usuario->documento }}</p>
            <p>Email: {{ $usuario->email }}</p>
            <p>Teléfono: {{ $usuario->telefono ?? 'No proporcionado' }}</p>
        </div>
    @endforeach
    <footer>
        <p>Mama clara</p>
    </footer>
</body>
</html>