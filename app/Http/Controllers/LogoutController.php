<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Cookie;

class LogoutController extends Controller
{
    // Funcion que cierra la sesion de la cuenta eliminando las cookies
    public function cerrarSesion() 
    {
        $cookieParam = session_get_cookie_params();
        setcookie(
            session_name(),
            "",
            time() - (24*60*60*5),
            $cookieParam["path"],
            $cookieParam["domain"],
            $cookieParam["secure"],
            $cookieParam["httponly"]
        );
        session()->flush();
        return redirect()->route("inicio");
    }
}
