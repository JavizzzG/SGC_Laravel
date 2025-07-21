<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de inicio</title>
</head>
<body>
    <h1>Bienvenido a la página de inicio</h1>
    <p>Esta es una página de ejemplo para mostrar cómo se ve una vista en Laravel.</p>
    
    <p>Para más información, visita la <a href="https://laravel.com/docs">documentación de Laravel</a>.</p>

    <h2><a href="{{ route('login.form') }}">Iniciar sesión</a></h2>
    <h2><a href="{{ route('register.form') }}">Registrarse</a></h2>

    <footer>
        <p>Mama clara</p>
    </footer>
</body>
</html>