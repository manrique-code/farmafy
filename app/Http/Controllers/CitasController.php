<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Cookie;
use Illuminate\Support\Carbon;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargosDoctor = DB::select('CALL SP_MostrarSoloCargoDoctores();');
        // echo dd($cargosDoctor);
        return view('Crud.registrarCita', [
            "readyToSubmit" => false,
            "cargosDoctor" => $cargosDoctor,
            "selected" => 0,
            "fechaMinima" => now()->toDateString('d-m-Y'),
            "horaNoDisponible" => 1
        ]);
    }

    /**
     * Funcion que carga los tipos de doctores segun el tipo de cargo que este ocupe.
     * @param $request enviado desde el primer formulario de tipo de doctor
     * @return $response los doctores del cargo.
     */
    public function mostrarDoctoresSegunCargo(Request $request) 
    {
        $cargosDoctor = DB::select('CALL SP_MostrarSoloCargoDoctores();');
        $IdAreaDoctor = $request->input('doctores-areas');
        session(['areaDoctor' => $IdAreaDoctor]);
        $informacionDoctor = DB::select('CALL SP_MostrarDoctoresPorCargo(?)', array($IdAreaDoctor));
        return view('Crud.registrarCita', [
            "readyToSubmit" => false,
            "cargosDoctor" => $cargosDoctor,
            "selected" => $IdAreaDoctor,
            "doctores" => $informacionDoctor,
            "fechaMinima" => now()->toDateString('d-m-Y'),
            "horaNoDisponible" => 1
        ]);
    }

    /**
     * Funcion para verificar si un doctor tiene disponibilidad de horario
     */
    private static function esHoraDisponible($idDoctor, $fechaCita)
    {
        $cita = DB::select('CALL SP_DoctorTieneCitaEnFecha(?,?);', array($idDoctor, $fechaCita));
        return $cita[0]->TieneCita;
    }

    /**
     * Almacena la cita.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCita(Request $request)
    {
        $fechaCita = $request->input('fecha-cita') . ' ' . $request->input('hora');
        $idDoctor = intval($request->input('doctores'));
        $tieneCita = CitasController::esHoraDisponible($idDoctor, $fechaCita);
        if (!$tieneCita)
        {
            try {
                DB::select('CALL SP_CrearCita(?,?,?)', array(
                    $fechaCita,
                    session('Id'),
                    $idDoctor
                ));
                return redirect()->route('inicio');
            } catch (Exception $e) {
                echo "Un errorsito $e va, pero vamos a ver que se puede hacer";
            }
        } 
        else
        {
            $cargosDoctor = DB::select('CALL SP_MostrarSoloCargoDoctores();');
            $informacionDoctor = DB::select('CALL SP_MostrarDoctoresPorCargo(?)', array(session('areaDoctor')));
            return view('Crud.registrarCita', [
                "readyToSubmit" => false,
                "cargosDoctor" => $cargosDoctor,
                "selected" => session('areaDoctor'),
                "doctores" => $informacionDoctor,
                "fechaMinima" => now()->toDateString('d-m-Y'),
                "horaNoDisponible" => 1,
                "tieneCita" => "Esa hora está ocupada. Por favor, elija otra hora."
            ]);
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function edit(Citas $citas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citas $citas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Citas $citas)
    {
        //
    }
}
