<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Curso</title>
    <link rel="stylesheet" href="{{ secure_asset('css/edit-curso.css') }}">
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
        <h1 class="title">Editar Curso</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('updateCurso', $curso) }}" enctype="multipart/form-data" class="form-box">
            @csrf
            @method('PUT')

            <label for="nombre">Nombre del Curso:</label>
            <input type="text" id="nombre" name="nombre" value="{{ $curso->nombre }}" required>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion">{{ $curso->descripcion }}</textarea>

            <label for="fecha_limite_inscripcion">Fecha Límite de Inscripción:</label>
            <input type="date" id="fecha_limite_inscripcion" name="fecha_limite_inscripcion" value="{{ $curso->fecha_limite_inscripcion }}">

            <label for="fecha_inicio">Fecha de Inicio:</label>
            <input type="date" id="fecha_inicio" name="fecha_inicio" value="{{ $curso->fecha_inicio }}" required>

            <label for="fecha_fin">Fecha de Fin:</label>
            <input type="date" id="fecha_fin" name="fecha_fin" value="{{ $curso->fecha_fin }}" required>

            <label for="cupo_maximo">Cupo Máximo:</label>
            <input type="number" id="cupo_maximo" name="cupo_maximo" value="{{ $curso->cupo_maximo }}" required min="1">

            <label for="activo">Estado:</label>
            <select id="activo" name="activo">
                <option value="1" {{ $curso->activo ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ !$curso->activo ? 'selected' : '' }}>Inactivo</option>
            </select>

            @if($curso->imagen)
                <div class="imagen-actual">
                    <p>Imagen actual:</p>
                    <img src="{{ secure_asset('storage/' . $curso->imagen) }}" alt="Imagen del curso">
                </div>
            @else
                <p>No hay imagen del curso.</p>
            @endif

            <label for="imagen">Nueva Imagen del Curso:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*">

            <button type="submit" class="btn-submit">Actualizar Curso</button>
        </form>
    </main>
</body>
</html>
