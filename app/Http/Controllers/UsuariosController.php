<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    public function registro(){
        return view('login.registro');
    }
    
    public function CreateUsuario(Request $request){
        $usuario=$request->input('NombreUsuario');
        $contra = $request->input('Contraseña');
        $concontra = $request->input('ConContraseña');
        $nombre = $request->input('Nombre');
        $inden=$request->input('ClienteIdentidad');
        $apllido=$request->input('Apellido');
        $FechaNacim=$request->input('FechaNacimiento');
        $clientes=DB::select("call Create_Cliente(?,?,?,?,?,?,?,?)",array(1,$usuario,$contra,$nombre,$apllido,$inden,$FechaNacim,0));
        return redirect()->route('login');
    }
}
