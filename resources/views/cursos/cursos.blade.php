<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos</title>
</head>
<body>
    <h1>Cursos</h1>
    <ul>
        @foreach($cursos as $curso)
            <li>{{ $curso }}</li>
            <form method="POST" action="{{ route('showCurso') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $curso->id }}">
                <button type="submit">Ver detalles</button>
            </form>
        @endforeach
    </ul>
</body>
</html>