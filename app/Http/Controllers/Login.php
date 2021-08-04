<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Cookie;

class Login extends Controller
{
    public function iniciarSesion() 
    {
        return view("login.login");
    }

    // funcion para crear las cookies
    // https://www.php.net/manual/en/function.session-set-cookie-params.php
    private static function crearCookies()
    {
        $sessionName = "farmafyUser";
        $secure = false;
        $httponly = true;
        $EXPIRE_COOKIE = (24*60*60) * 5;

        if (ini_set('session.use_only_cookies', 1) === FALSE) {
            echo "No se pudo iniciar una sesión segura (ini_set)";
            exit();
        }

        $cookieParam = session_get_cookie_params();

        session_set_cookie_params(
            $EXPIRE_COOKIE,
            $cookieParam["path"],
            $_SERVER['SERVER_NAME'],
            $secure,
            $httponly
        );

        session_name($sessionName);
        session_start();
    }

    private static function getUserInfo($idUsuario, $tipoUsuario)
    {
        $infoUsuario = null;
        if ($tipoUsuario === "Cliente") {
            $infoUsuario = DB::select(
                'CALL SP_InformacionUsuarioCliente(?);',
                array($idUsuario)
            );
            session([
                "IdUsuario" => $infoUsuario[0]->IdUsuario,
                "NombreUsuario" => $infoUsuario[0]->NombreUsuario,
                "TipoUsuario" => $infoUsuario[0]->TipoUsuario,
                "Id" => $infoUsuario[0]->IdCliente,
                "Identidad" => $infoUsuario[0]->ClienteIdentidad,
                "Nombre" => $infoUsuario[0]->Nombre,
                "Apellido" => $infoUsuario[0]->Apellido,
                "FechaNacimiento" => $infoUsuario[0]->FechaNacimiento
            ]);
        } else {
            $infoUsuario = DB::select(
                'CALL SP_InformacionUsuarioEmpleado(?);',
                array($idUsuario)
            );
            
            session([
                "IdUsuario" => $infoUsuario[0]->IdUsuario,
                "NombreUsuario" => $infoUsuario[0]->NombreUsuario,
                "TipoUsuario" => $infoUsuario[0]->TipoUsuario,
                "Id" => $infoUsuario[0]->IdEmpleado,
                "Identidad" => $infoUsuario[0]->NumIdentidadEmpleado,
                "Nombre" => $infoUsuario[0]->Nombre,
                "Apellido" => $infoUsuario[0]->Apellido,
                "FechaNacimiento" => $infoUsuario[0]->FechaNacimiento,
                "NombreCargo" => $infoUsuario[0]->NombreCargo
            ]);
        }
    }

    public function inicioSesion(Request $request) 
    {
        $usuario = $request->input('usuario');
        $contra = $request->input('contra');
        $login = DB::select('CALL SP_IniciarSesion(?,?)', array($usuario, $contra));
        if (count($login)) {
            // llamamos la funcion para poder crear las cookies y después almacenar información en ella con el session (helper).
            Login::crearCookies();
            $infoUsuario = Login::getUserInfo(
                $login[0]->IdUsuario,
                $login[0]->TipoUsuario
            );
            return redirect()->route('inicio');
        }
        else return view('login.login', ["errorSesion"=>"Usuario o contraseña incorrecto incorrecto"]);
    }
}
