<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Curso</title>
</head>
<body>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>Crear Curso</h1>
    <form method="POST" action="{{ route('storeCurso') }}">
        @csrf
        <label for="nombre">Nombre del Curso:</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" value="{{ old('descripcion') }}"></textarea>
        <label for="fecha_limite_inscripcion">Fecha Límite de Inscripción:</label>
        <input type="date" id="fecha_limite_inscripcion" name="fecha_limite_inscripcion" value="{{ old('fecha_limite_inscripcion') }}">
        <label for="fecha_inicio">Fecha de Inicio:</label>
        <input type="date" id="fecha_inicio" name="fecha_inicio" value="{{ old('fecha_inicio') }}" required>
        <label for="fecha_fin">Fecha de Fin:</label>
        <input type="date" id="fecha_fin" name="fecha_fin" value="{{ old('fecha_fin') }}" required>
        <label for="cupo_maximo">Cupo Máximo:</label>
        <input type="number" id="cupo_maximo" name="cupo_maximo" value="{{ old('cupo_maximo') }}" required>
        <select id="activo" name="activo">
            <option value="1" {{ old('activo', true) ? 'selected' : '' }}>Activo</option>
            <option value="0" {{ old('activo', false) ? 'selected' : '' }}>Inactivo</option>
        </select>
        <button type="submit">Crear Curso</button>
    </form>
</body>
</html>