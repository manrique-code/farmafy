<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Farmafy</title>
    <link rel="stylesheet" href="{{ asset('MenuCss/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('CrudCss/CrudUser.css') }}">
</head>
<body>
    <div class="container">
        <header>
            <img src="{{ asset('MenuCss/img/logo-place-holder.png') }}" alt="farmafy-logo" class="header-logo">
            <div class="header-menu">
                <a href="#" class="header-menu-selected">Inicio</a>
                <a href="#">Citas</a>
                <a href="#">Productos</a>
                <a href="#">Contactanos</a>
            </div>
            <div class="header-login">
                <a href="{{ route('registro')}}" class="sign-in-button button-secondary">Crear cuenta</a>
                <a href="{{ route('login')}}" class="login-button button">Login</a>
            </div>
        </header>
        @yield('content')
        <footer>

        </footer>
    </div>
</body>
</html>