<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
</head>
<body>
    <h1>Editar Perfil</h1>
    <form action="{{ route('updatePerfil') }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ auth()->user()->nombre }}" required>
        <br>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="{{ auth()->user()->apellido }}" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" required>
        <br>
        <label for="documento">Documento:</label>
        <input type="text" id="documento" name="documento" value="{{ auth()->user()->documento }}" required>
        <br>
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="{{ auth()->user()->telefono }}">
        <br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>