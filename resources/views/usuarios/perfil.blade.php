<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>
<body>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1> Perfil de Usuario </h1>
    <p><strong>Nombre:</strong> {{ auth()->user()->nombre }}</p>
    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
    <p><strong>Documento:</strong> {{ auth()->user()->documento }}</p>
    <p><strong>Teléfono:</strong> {{ auth()->user()->telefono }}</p>
    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
    <a href="{{ route('editPerfil') }}">Editar Perfil</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Cerrar Sesión</button>
    </form>
</body>
</html>