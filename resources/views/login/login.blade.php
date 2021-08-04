<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesion</title>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="{{ asset('logincss/login.css') }}">


</head>

<body>
    <h1>Iniciar Sesion Farmafy</h1>
    <form class="contenedor" action="{{ URL::to('/iniciarSesion') }}" method="POST">
        <input type="hidden" name="_token" value="<?php echo csrf_token()?>"><input type="hidden" name="_token" value="<?php echo csrf_token()?>">
        <div class="input-contenedor">
            <i class="fas fa-users icon"></i>
            <input type="text" placeholder="Usuario" name="usuario">
        </div>

        <div class="input-contenedor">
            <i class="fas fa-key icon"></i>
            <input type="password" placeholder="Contraseña" name="contra" id="contra">
            @if (isset($errorSesion))
                <p id="errorSesion" class="errorSesion">{{ $errorSesion }}</p>
            @endif
        </div>
        <input type="submit" value="Login" class="button">
        <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
        <p>¿No tienes una cuenta? <a class="link" href="{{ route('registro')}}">Registrate </a></p>
    </form>
    <script src="{{ asset('logincss/scripts.js')}}"></script>
</body>
</html>