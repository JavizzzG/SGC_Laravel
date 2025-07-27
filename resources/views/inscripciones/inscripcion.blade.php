<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Inscripción</title>
    <link rel="stylesheet" href="{{ secure_asset('css/inscripcion.css') }}">
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('inicio') }}">Inicio</a></li>
            <li><a href="{{ route('mis-cursos') }}">Mis Cursos</a></li>
            <li><a href="{{ route('showPerfil') }}">Perfil</a></li>
        </ul>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <h1 class="title">Confirmación de Inscripción</h1>
        <h2 class="subtitle">Estás a punto de inscribirte al curso:</h2>
        <p class="curso-nombre">{{ $curso->nombre }}</p>

        <form action="{{ route('storeInscripcion', $curso) }}" method="POST" class="formulario">
            @csrf
            <input type="hidden" name="curso_id" value="{{ $curso->id }}">
            <input type="hidden" name="usuario_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="estado" value="2">

            <div class="botones">
                <button type="submit" class="btn-confirmar">Confirmar Inscripción</button>
                <a href="{{ route('cursos') }}" class="btn-cancelar">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
