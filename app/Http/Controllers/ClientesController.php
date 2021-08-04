<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    public function VerClientes(){
        $texto=null;
        $clientes = DB::select("call Ver_Clientes()");
        return view('crud.crudclien', compact('clientes', 'texto'));
        
    }

    public function FindClientes(Request $request){
        $texto = $request->get('TextoBusqueda');

        if($texto == ""){
           
            $clientes = DB::select("call Ver_Clientes()");
            return view('Crud.crudclien', compact('clientes', 'texto'));
        }else{
            $clientes = DB::select("call Find_Clientes(?)",array($texto));            
            return view('Crud.crudclien', compact('clientes', 'texto'));
        }        
    }

    public function CreateCliente(Request $request){
        $usuario=$request->input('NombreUsuario');
        $contra = $request->input('Contraseña');
        $concontra = $request->input('ConContraseña');
        $nombre = $request->input('Nombre');
        $inden=$request->input('ClienteIdentidad');
        $apllido=$request->input('Apellido');
        $FechaNacim=$request->input('FechaNacimiento');
        $clientes=DB::select("call Create_Cliente(?,?,?,?,?,?,?,?)",array(1,$usuario,$contra,$nombre,$apllido,$inden,$FechaNacim,0));
        return redirect()->route('client');
    }

    public function Update_Cliente(Request $request, $id){
        $usuario=$request->input('NombreUsuario');
        $contra = $request->input('Contraseña');
        $concontra = $request->input('ConContraseña');
        $nombre = $request->input('Nombre');
        $inden=$request->input('ClienteIdentidad');
        $apllido=$request->input('Apellido');
        $FechaNacim=$request->input('FechaNacimiento');
        $clientes=DB::select("call Create_Cliente(?,?,?,?,?,?,?,?)",array(2,$usuario,$contra,$nombre,$apllido,$inden,$FechaNacim,$id));
        return redirect()->route('client');
    }

    public function Delete_Cliente(Request $request, $id){
        $usuario=$request->input('NombreUsuario');
        $contra = $request->input('Contraseña');
        $concontra = $request->input('ConContraseña');
        $nombre = $request->input('Nombre');
        $inden=$request->input('ClienteIdentidad');
        $apllido=$request->input('Apellido');
        $FechaNacim=$request->input('FechaNacimiento');
        $clientes=DB::select("call Create_Cliente(?,?,?,?,?,?,?,?)",array(3,$usuario,$contra,$nombre,$apllido,$inden,$FechaNacim,$id));
        return redirect()->route('client');
    }
}
