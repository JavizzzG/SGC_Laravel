<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Inscripción</title>
</head>
<body>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Detalles de Inscripción</h1>
    <h2>Curso: {{ $curso->nombre }}</h2>
    <h3>Cantidad de usuarios: {{ $usuarios->count() }}</h3>
    <h3>Inscripciones:</h3>
    <ul>
        <form method="POST" action="{{ route('updateEstado', $curso->id) }}">
            @csrf
            @method('PUT')
        @foreach($usuarios as $usuario)
            <li>
                Usuario: {{ $usuario->nombre }}
                - Documento: {{ $usuario->documento }}
                - Fecha de Inscripción: {{ $inscripciones->where('usuario_id', $usuario->id)->first()->created_at}}
                - Email: {{ $usuario->email }}
                - Teléfono: {{ $usuario->telefono }}
                - Estado:
                <select name="estado[{{ $usuario->id }}]">
                    <option value="2" {{ $inscripciones->where('usuario_id', $usuario->id)->first()->estado == 2 ? 'selected' : '' }}>Aprobado</option>
                    <option value="3" {{ $inscripciones->where('usuario_id', $usuario->id)->first()->estado == 3 ? 'selected' : '' }}>Rechazado</option>
                    <option value="4" {{ $inscripciones->where('usuario_id', $usuario->id)->first()->estado == 4 ? 'selected' : '' }}>Terminado</option>
                    <option value="5" {{ $inscripciones->where('usuario_id', $usuario->id)->first()->estado == 5 ? 'selected' : '' }}>Cancelado</option>
                    <option value="6" {{ $inscripciones->where('usuario_id', $usuario->id)->first()->estado == 6 ? 'selected' : '' }}>En curso</option>
                </select>
            </li>
        @endforeach
        <button type="submit">Guardar Cambios</button>
        </form>
    </ul>
    <h2><a href="{{ route('cursos-admin') }}">Volver a Cursos</a></h2>
</body>
</html>