<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Curso</title>
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
    <h1>Editar Curso</h1>
    <form method="POST" action="{{ route('updateCurso', $curso) }} " enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre:</label>
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

        <select id="activo" name="activo">
            <option value="1" {{ $curso->activo ? 'selected' : '' }}>Activo</option>
            <option value="0" {{ !$curso->activo ? 'selected' : '' }}>Inactivo</option>
        </select>

        @if( $curso->imagen )
            <img src="{{ asset('storage/' . $curso->imagen) }}" alt="Imagen del curso" style="max-width: 300px; max-height: 200px;">
        @else
            <p>No hay imagen del curso.</p>
        @endif

        <label for="imagen">Cambiar imagen del Curso:</label>
        <input type="file" id="imagen" name="imagen" accept="image/*" value="{{ old('imagen') }}">
        
        <button type="submit">Actualizar Curso</button>
    </form>
</body>
</html>