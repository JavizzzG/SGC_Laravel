<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Inscripción</title>
    <link rel="stylesheet" href="{{ secure_asset('css/inscri-detalles.css') }}">
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('inicio-admin') }}">Inicio</a></li>
            <li><a href="{{ route('cursos-admin') }}">Cursos</a></li>
            <li><a href="{{ url()->previous() }}">Volver</a></li>
            <li>
                <form method="GET" action="{{ route('usuariosFiltrados') }}" class="search-form">
                    <input type="hidden" name="curso_id" value="{{ $curso->id }}">
                    <input type="text" name="busqueda" placeholder="Buscar..." class="search-input">
                    <button type="submit" class="search-button">🔍</button>
                </form>
            </li>
        </ul>
    </nav>

    <main class="container">
        <h1 class="title">Detalles de Inscripción</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <h2>Curso: {{ $curso->nombre }}</h2>
        <h3>Cantidad de usuarios: {{ $usuarios->count() }}</h3>
        <form method="POST" action="{{ route('updateEstado', $curso->id) }}" class="form-box">
            @csrf
            @method('PUT')
            <ul class="lista-usuarios">
                @if($usuarios->count() > 0)
                @foreach($usuarios as $usuario)
                    @php
                        $inscripcion = $inscripciones->where('usuario_id', $usuario->id)->first();
                    @endphp
                    <li class="usuario-card">
                        <p><strong>Usuario:</strong> {{ $usuario->nombre }}</p>
                        <p><strong>Documento:</strong> {{ $usuario->documento }}</p>
                        <p><strong>Fecha de Inscripción:</strong> {{ $inscripcion->created_at->format('d/m/Y') }}</p>
                        <p><strong>Email:</strong> {{ $usuario->email }}</p>
                        <p><strong>Teléfono:</strong> {{ $usuario->telefono }}</p>
                        <label for="estado_{{ $usuario->id }}"><strong>Estado:</strong></label>
                        <select name="estado[{{ $usuario->id }}]" id="estado_{{ $usuario->id }}">
                            <option value="2" {{ $inscripcion->estado == 2 ? 'selected' : '' }}>Aprobado</option>
                            <option value="3" {{ $inscripcion->estado == 3 ? 'selected' : '' }}>Rechazado</option>
                            <option value="4" {{ $inscripcion->estado == 4 ? 'selected' : '' }}>Terminado</option>
                            <option value="5" {{ $inscripcion->estado == 5 ? 'selected' : '' }}>Cancelado</option>
                            <option value="6" {{ $inscripcion->estado == 6 ? 'selected' : '' }}>En curso</option>
                        </select>
                    </li>
                @endforeach
                @else
                    <p>No hay usuarios registrados para este curso.</p>
                @endif
            </ul>

            <button type="submit" class="btn-submit">Guardar Cambios</button>
        </form>
    </main>
</body>
</html>
