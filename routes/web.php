<?php

use App\Http\Controllers\FarmafyController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ProductosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*Route::get('/login', 'App\Http\Controllers\FarmafyController@Login')->name('login');*/
Route::get('/', function () {
    return view('menu_prin.menu');
})->name('inicio');

Route::get('/sysadmin', function () {
    return view('sysadmin.cuentaempleado');
})->name('cuentaempleado');

Route::get('/cita', function () {
    return view('Crud.registrar_cita');
})->name('cita');

Route::get('/productos2', function () {
    return view('Crud.agregarproducto');
})->name('productos2');

Route::get('/editarproducto', function () {
    return view('Crud.editarProducto');
})->name('editarproducto');

Route::get('/visualproducto', function () {
    return view('Crud.visualizarProducto');
})->name('visualproducto');

Route::get('/menuprin', function () {
    return view('menu_prin.menuprin');
})->name('menuprin');


Route::get('/conten', function () {
    return view('menu_prin.conten');
})->name('conten');

 //crud de empleados
Route::resource('/empleados', EmpleadosController::class);
Route::get('/empl','App\Http\Controllers\EmpleadosController@VerEmpleados')->name('empl');
Route::get('/find','App\Http\Controllers\EmpleadosController@FindEmpleados')->name('find');
Route::post('/IngresarEmpl','App\Http\Controllers\EmpleadosController@createEmpleado')->name('IngresarEmpl');
Route::post('/UpdateEmpl/{id}','App\Http\Controllers\EmpleadosController@UpdateEmpleado')->name('UpdateEmpl');
Route::post('/DeleteEmpl/{id}','App\Http\Controllers\EmpleadosController@DeleteEmpleado')->name('DeleteEmpl');

//crud de clientes
Route::resource('/clientes', ClientesController::class);
Route::get('/client','App\Http\Controllers\ClientesController@VerClientes')->name('client');
Route::get('/FindClientes','App\Http\Controllers\ClientesController@FindClientes')->name('FindClientes');
Route::post('/CreateCliente','App\Http\Controllers\ClientesController@CreateCliente')->name('CreateCliente');
Route::post('/Update_Cliente/{id}','App\Http\Controllers\ClientesController@Update_Cliente')->name('Update_Cliente');
Route::post('/Delete_Cliente/{id}','App\Http\Controllers\ClientesController@Delete_Cliente')->name('Delete_Cliente');


//registro
Route::resource('/registro', UsuariosController::class);
Route::get('/registro','App\Http\Controllers\UsuariosController@registro')->name('registro');
Route::post('/CreateUsuario','App\Http\Controllers\UsuariosController@CreateUsuario')->name('CreateUsuario');


//productos
Route::resource('/productos', ProductosController::class);
Route::get('/prod','App\Http\Controllers\ProductosController@VerProductos')->name('prod');
Route::get('/findprod','App\Http\Controllers\ProductosController@FindProductos')->name('findprod');
Route::post('/Ingresarprod','App\Http\Controllers\ProductosController@createProductos')->name('Ingresarprod');
Route::post('/Updateprod/{id}','App\Http\Controllers\ProductosController@UpdateProductos')->name('Updateprod');
Route::post('/Deleteprod/{id}','App\Http\Controllers\ProductosController@DeleteProductos')->name('Deleteprod');




// Todas las rutas con respecto a login
Route::get("login", "App\Http\Controllers\Login@iniciarSesion")->name("login");
Route::post('iniciarSesion', 'App\Http\Controllers\Login@inicioSesion');
Route::get("logout", "App\Http\Controllers\LogoutController@cerrarSesion")->name('logout');
// --------------------------------- Rutas para empleados ------------------------------
Route::get('/sysadmin', function () {
    return view('sysadmin.cuentaempleado');
})->name('cuentaempleado');

// Citas --------------------------------------------------------------------------------------------
Route::get('/cita', function () {
    return view('Crud.registrar_cita');
})->name('cita');
Route::get('/crearcita', 'App\Http\Controllers\CitasController@create')->name('crearCita');
Route::post('/crearcita-load', 'App\Http\Controllers\CitasController@mostrarDoctoresSegunCargo')->name('loadCargos');
Route::post('/crearcita-sendingtostore', 'App\Http\Controllers\CitasController@storeCita')->name('storeCita');
Route::post('/crearcita-verifyavailabilty', 'App\Http\Controllers\CitasController@horasNoDisponibles')->name('verifycita');
