<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
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


    public function VerProductos(){
        $texto=null;
        $producto = DB::select("call Ver_Productos()");
        return view('Crud.visualizarProducto', compact('producto','texto'));
        // return view('Crud.CrudUser')->with('empleado',$empleado);
    }

    public function FindProductos(Request $request){
        $texto = $request->get('TextoBusqueda');
        $producto = DB::select("call Find_Producto(?)",array($texto));
        return view('Crud.visualizarProducto', compact('producto', 'texto'));
        
    }

    public function createProductos(Request $request){
        $idproducto=$request->input('IdProducto');
        $precio = $request->input('Precio');
        $nombre = $request->input('NombreProducto');
        $disponibilidad = $request->input('Disponibilidad');
        $producto = DB::select("call Insertar_Producto(?,?,?,?,?)",array($idproducto,$precio,$nombre,$disponibilidad,1));
        return redirect()->route('prod');
    }

    public function UpdateProductos(Request $request, $id){
        $idproducto=$request->input('IdProducto');
        $precio = $request->input('Precio');
        $nombre = $request->input('NombreProducto');
        $disponibilidad = $request->input('Disponibilidad');;
        $producto = DB::select("call Insertar_Producto(?,?,?,?,?)",array($idproducto,$precio,$nombre,$disponibilidad,$id,2));
        return redirect()->route('prod');
    }

    public function DeleteProductos(Request $request, $id){
        $idproducto=$request->input('IdProducto');
        $precio = $request->input('Precio');
        $nombre = $request->input('NombreProducto');
        $disponibilidad = $request->input('Disponibilidad');
        $producto = DB::select("call Insertar_Producto(?,?,?,?,?)",array($idproducto,$precio,$nombre,$disponibilidad,$id,3));
       
        return redirect()->route('prod');
    }

    
}
