<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>Página de inicio</title>
</head>
<body>
    <nav>
            <ul>
                <li><a href="{{ route('cursos') }}">Cursos</a></li>
                @guest
                    <li><a href="{{ route('login.form') }}">Iniciar Sesión</a></li>
                    <li><a href="{{ route('register') }}">Registrarse</a></li>
                @else
                    <li>
                        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                            @csrf
                            <button type="submit">Cerrar Sesión</button>
                        </form>
                    </li>
                @endguest
            </ul>
        </nav>
    @if(session('success'))
        <div>
            <p>{{ session('success') }}</p>
        </div>
    @endif
    <header>
        <h1>Sistema de Gestión de Cursos</h1>
        <p>Bienvenido al portal donde puedes descubrir, inscribirte y gestionar tus cursos en línea.</p>
    </header>

    <section>
        <h2>¿Quiénes somos?</h2>
        <p>Somos una plataforma dedicada a facilitar el aprendizaje y la capacitación a través de cursos virtuales de alta calidad.</p>
    </section>

    <section>
        <h2>¿Qué hacemos?</h2>
        <p>Ofrecemos una variedad de cursos en diferentes áreas, permitiendo a los usuarios aprender a su propio ritmo y mejorar sus habilidades.</p>
    </section>
    <footer class="footer">
        <p class="footer-copy">&copy; {{ date('Y') }} Sistema de Gestión de Cursos. Todos los derechos reservados.</p>
        <p class="footer-links">
            <a class="footer-link" href="{{ route('cursos') }}">Ver cursos</a> |
            <a class="footer-link" href="mailto:empresa@sgc.com">Contacto</a>
        </p>
    </footer>
</body>
</html>