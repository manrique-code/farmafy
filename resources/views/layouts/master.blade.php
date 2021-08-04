<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('MenuCss/menu.css') }}">
    {{-- Iconos de FontAwesome --}}
    <link rel="stylesheet" href="{{ asset('font-awesome/css/all.css') }}">
    @stack('crear-cuenta-empleados-styles')
    @stack('listado-empleados-styles')
    @stack('registrar-cita-styles')
    @stack('view-styles')
    <title>@yield('title')</title>
</head>
<body>
    <header>
            <img src="{{ asset('MenuCss/img/logo-place-holder.png') }}" alt="farmafy-logo" class="header-logo">
            <div class="header-menu">
                <div class="menu">
                    <a href="#" class="header-menu-selected">Inicio</a>
                    <a href="#">Citas</a>
                    <a href="{{route('conten')}}">Productos</a>
                    <a href="#">Contactanos</a>
                </div>
            </div>
            <div class="header-login">
                @if (session('NombreUsuario'))
                    {{-- {{ session('NombreUsuario') }} --}}
                    {{-- En caso de que la persona haya iniciado sesión se mostrará este componente --}}
                    <nav class="menu-user" id="menu-user">
                        <div class="pfp-container" id="pfp-button" title="{{ session('Nombre') }} dá click para ver opciones.">
                            <img src="{{ asset('MenuCss/img/clientes/pfp.webp') }}" alt="" class="pfp">
                        </div>
                        <div class="options" id="options">
                            @if (session('TipoUsuario') === "Cliente")
                                <a class="saludo">Hola, {{ session('Nombre') }}</a>
                                <a href="#">Ver citas programadas</a>
                                <a href="#">Ver perfil</a>
                                <a href="{{ route('logout') }}" class="logout">Cerrar sesión</a>
                            @else
                                <a class="saludo">Hola, {{ session('Nombre') }}</a>
                                <a href="#">Ver citas programadas</a>
                                <a href="#">Ver perfil</a>
                                <a href="#">Opciones más avanzadas va</a>
                                <a href="{{ route('logout') }}" class="logout">Cerrar sesión</a>
                            @endif
                        </div>
                    </nav>
                @else
                    {{-- Sino el header normal para que el usuario pueda iniciar sesión --}}
                    <a href="{{ route('registro')}}" class="sign-in-button button-secondary">Crear cuenta</a>
                    <a href="{{ route('login')}}" class="login-button button">Login</a>
                @endif
            </div>
    </header>
    @yield('content')
    <footer>
        <section class="developers-name">
            <i class="fab fa-laravel" title="El Grupo de los Sergio Inc."></i>
            <h3>Developed by El Grupo de los Sergios©</h3>
        </section>
        <section class="social-media">
            <i class="fab fa-facebook" title="El Grupo de los Sergio Inc."></i>
            <i class="fab fa-instagram square" title="El Grupo de los Sergio Inc."></i>
            <i class="fab fa-twitter-square" title="El Grupo de los Sergio Inc."></i>
        </section>
    </footer>
    <script src="{{ asset('MenuCss/js/scripts.js') }}"></script>
    @stack('scripts-cita')
</body>
</html>