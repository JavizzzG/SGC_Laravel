<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Inscripción</title>
</head>
<body>
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

    <h1>Confirmación de Inscripción</h1>
    <h4>Estas a punto de inscribirte al curso: {{ $curso->nombre }}</h4>
    <form action="{{ route('storeInscripcion', $curso) }}" method="POST">
        @csrf
        <input type="hidden" name="curso_id" value="{{ $curso->id }}">
        <input type="hidden" name="usuario_id" value="{{ auth()->user()->id }}">
        <input type="hidden" name="estado" value="2">
        <button type="submit">Confirmar Inscripción</button>
        <a href="{{ route('cursos') }}">Cancelar</a>
    </form>
</body>
</html>