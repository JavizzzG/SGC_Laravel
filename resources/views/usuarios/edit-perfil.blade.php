<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="{{ secure_asset('css/editPerfil.css') }}">
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('cursos') }}">Cursos</a></li>
            <li><a href="{{ route('showPerfil') }}">Volver</a></li>
        </ul>
    </nav>

    <div class="form-container">
        <div class="form-card">
            <h1 class="form-title">Editar Perfil</h1>

            <form action="{{ route('updatePerfil') }}" method="POST" class="edit-form">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="{{ auth()->user()->nombre }}" required>
                </div>

                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido" name="apellido" value="{{ auth()->user()->apellido }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" required>
                </div>

                <div class="form-group">
                    <label for="documento">Documento</label>
                    <input type="text" id="documento" name="documento" value="{{ auth()->user()->documento }}" required>
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" id="telefono" name="telefono" value="{{ auth()->user()->telefono }}">
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>