<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\Cargos;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function VerEmpleados(){
        $texto=null;
        $tipUser=DB::select('call Ver_TipUSer()');
        $cargos= DB::select("call Ver_Cargos()");
        $empleado = DB::select("call Ver_Empleados()");
        return view('Crud.CrudUser', compact('empleado', 'cargos','texto','tipUser'));
        // return view('Crud.CrudUser')->with('empleado',$empleado);
    }

    public function FindEmpleados(Request $request){
        $texto = $request->get('TextoBusqueda');

        if($texto == ""){
            $tipUser=DB::select('call Ver_TipUSer()');
            $cargos= DB::select("call Ver_Cargos()");
            $empleado = DB::select("call Ver_Empleados()");
            return view('Crud.CrudUser', compact('empleado', 'texto','cargos','tipUser'));
        }else{
            $tipUser=DB::select('call Ver_TipUSer()');
            $empleado = DB::select("call Find_Empleados(?)",array($texto));
            $cargos= DB::select("call Ver_Cargos()");
            return view('Crud.CrudUser', compact('empleado', 'texto','cargos','tipUser'));
        }
       
        
    }

    public function createEmpleado(Request $request){
        $usuario=$request->input('Usuario');
        $contra = $request->input('Contraseña');
        $concontra = $request->input('ConContraseña');
        $nombre = $request->input('nombre');
        $TipoUser = $request->input('IdTipoUsuario');
        $Cargo = $request->input('IdCargo');
        $inden=$request->input('Identidad');
        $apllido=$request->input('apellido');
        $FechaNacim=$request->input('FechaNacimiento');
        $empleado = DB::select("call Inser_Empleados(?,?,?,?,?,?,?,?,?,?)",array($usuario,$contra,$TipoUser,$Cargo,$nombre,$apllido,$inden,1,1,$FechaNacim));
        return redirect()->route('empl');
    }

    public function UpdateEmpleado(Request $request, $id){
        $usuario=$request->input('Usuario');
        $contra = $request->input('Contraseña');
        $concontra = $request->input('ConContraseña');
        $nombre = $request->input('nombre');
        $TipoUser = $request->input('IdTipoUsuario');
        $Cargo = $request->input('IdCargo');
        $inden=$request->input('Identidad');
        $apllido=$request->input('apellido');
        $FechaNacim=$request->input('FechaNacimiento');
        $empleado = DB::select("call Inser_Empleados(?,?,?,?,?,?,?,?,?,?)",array($usuario,$contra,$TipoUser,$Cargo,$nombre,$apllido,$inden,$id,2, $FechaNacim));
        return redirect()->route('empl');
    }

    public function DeleteEmpleado(Request $request, $id){
        $usuario=$request->input('Usuario');
        $contra = $request->input('Contraseña');
        $concontra = $request->input('ConContraseña');
        $nombre = $request->input('nombre');
        $TipoUser = $request->input('IdTipoUsuario');
        $Cargo = $request->input('IdCargo');
        $inden=$request->input('Identidad');
        $apllido=$request->input('apellido');
        $FechaNacim=$request->input('FechaNacimiento');
        $empleado = DB::select("call Inser_Empleados(?,?,?,?,?,?,?,?,?,?)",array($usuario,'123',$TipoUser,$Cargo,$nombre,$apllido,$inden,$id,3,$FechaNacim));
        return redirect()->route('empl');
    }
}
