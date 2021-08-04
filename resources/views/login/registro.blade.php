<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="{{ asset('logincss/Registro.css') }}">
</head>

<body>
    <form class="formulario" method="post" action="{{route('CreateUsuario')}}">
        @csrf
        <h1>Crear Usuario</h1>
        <div class="contenedor">

            <div class="input-contenedor">
                <div class="flex">
                    <div class="inp margin">
                        <i class="fas fa-user icon"></i><input type="text" placeholder="Nombre" name="Nombre">
                    </div>
                    <div class="inp">
                        <i class="fas fa-user icon"></i><input type="text" placeholder="Apellido" name="Apellido">
                    </div>
                </div>
            </div>
            <div class="input-contenedor">
                <div class="flex">
                    <div class="inp margin">
                        <i class="fas fa-user icon"></i><input type="text" placeholder="Identidad" name="ClienteIdentidad">
                    </div>
                    <div class="inp">
                        <i class="fas fa-table icon"></i><input type="date" class="date" name="FechaNacimiento">
                    </div>
                </div>
            </div>
            <div class="input-contenedor">
                <div class="">
                    <div class="inp margin">
                        <i class="fas fa-users icon"></i><input type="text" placeholder="Usuario" id="user" name="NombreUsuario">
                    </div>
                </div>
            </div>

            <div class="input-contenedor">
                <div class="flex">
                    <div class="inp margin">
                        <i class="fas fa-key icon"></i><input type="password" placeholder="Contraseña" name="Contraseña">

                    </div>
                    <div class="inp">
                        <i class="fas fa-key icon"></i><input type="password" placeholder="Confirmar Contraseña" name="ConContraseña">
                    </div>
                </div>
            </div>
            <div class="input-contenedor">
                <div class="flex">
                    <div class="inp ">
                        <button type="submit" class="btn btn-secondary button" data-bs-dismiss="modal">Guardar</button>

                    </div>
                    <div class="inp space">
                        <a href="{{route('inicio')}}"><button type="button" class="btn btn-primary button">Cancelar</button></a>
                    </div>
                </div>
            </div>
        </div>


        <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
        <p>¿Ya tienes una cuenta?<a class="link" href="{{route('login')}}">Iniciar Sesion</a></p>
        </div>
    </form>
</body>

</html>