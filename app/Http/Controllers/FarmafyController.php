<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FarmafyController extends Controller
{
    public function Login(){
        return view('login.login');
    }

    public function Record(){
        return view('login.registro');
    }
}
