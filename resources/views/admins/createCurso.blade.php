<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Curso</title>
    <link rel="stylesheet" href="{{ secure_asset('css/create-curso.css') }}">
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('inicio-admin') }}">Inicio</a></li>
            <li><a href="{{ route('cursos-admin') }}">Cursos</a></li>
            <li><a href="{{ url()->previous() }}">Volver</a></li>
        </ul>
    </nav>

    <main class="container">
        <h1 class="title">Crear Nuevo Curso</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="form" method="POST" action="{{ route('storeCurso') }}" enctype="multipart/form-data">
            @csrf

            <label for="nombre">Nombre del Curso:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion">{{ old('descripcion') }}</textarea>

            <label for="fecha_limite_inscripcion">Fecha Límite de Inscripción:</label>
            <input type="date" id="fecha_limite_inscripcion" name="fecha_limite_inscripcion" value="{{ old('fecha_limite_inscripcion') }}">

            <label for="fecha_inicio">Fecha de Inicio:</label>
            <input type="date" id="fecha_inicio" name="fecha_inicio" value="{{ old('fecha_inicio') }}" required>

            <label for="fecha_fin">Fecha de Fin:</label>
            <input type="date" id="fecha_fin" name="fecha_fin" value="{{ old('fecha_fin') }}" required>

            <label for="cupo_maximo">Cupo Máximo:</label>
            <input type="number" id="cupo_maximo" name="cupo_maximo" value="{{ old('cupo_maximo') }}" required>

            <label for="activo">Estado del Curso:</label>
            <select id="activo" name="activo">
                <option value="1" {{ old('activo', true) ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ old('activo', false) ? 'selected' : '' }}>Inactivo</option>
            </select>

            <label for="imagen">Imagen del Curso:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*">

            <button type="submit" class="btn-submit">Crear Curso</button>
        </form>
    </main>
</body>
</html>
