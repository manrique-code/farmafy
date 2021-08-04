<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Cookie;

class VerifyLogin extends Controller
{
    public function verificarSesion() {
        // return view('menu_prin.menu', ["userName"=> (isset($_SESSION["username"])) ? $_SESSION["username"] : "Joder"]);
        return view('menu_prin.menu', ['usuario'=>session('username')]);
    }
}
