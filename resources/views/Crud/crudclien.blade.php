@extends('layouts.master')
@push('view-styles')
<link rel="stylesheet" href="{{ asset('CrudCss/CrudUser.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">{{-- Aquí va el css de nuestra pantalla --}}
@endpush
@section('title', 'Tabla de Clientes')
@section('content')
<div class="contenedor prin">
        <div class="Contenedor2">
            <div class="titulobuscar">
                <h1>Clientes</h1>
                <div class="input-buscar">
                    <form action="{{route('FindClientes')}}" method="get">

                        <div class="input-buscar-2">
                            <button type="submit" class="buscar"><i type="submit" class="fas fa-search icon"></i></button><input type="search" id="buscar" value="{{$texto}}" class="buscar" name="TextoBusqueda" placeholder="Buscar">
                        </div>
                    </form>
                    <div class="button-1">
                        <button type="button" class="btn btn-primary botton" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Crear Usuario</button>
                    </div>
                </div>

            </div>
            <div class="tabla">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Codigo</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Identidad</th>
                            <th scope="col">Fecha Nacimiento</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($clientes)<=0)                        
                        <tr>
                            <td>No hay Resultados</td>
                        </tr>
                        @else
                        @foreach($clientes as $cliente)
                        <tr>
                            <td data-label="codigo">{{$cliente->IdCliente}}</td>
                            <td data-label="Nombre">{{$cliente->Nombre}}</td>
                            <td data-label="Apellido">{{$cliente->Apellido}}</td>
                            <td data-label="Identidad">{{$cliente->ClienteIdentidad}}</td>
                            <td data-label="Fecha Nacimiento">{{$cliente->FechaNacimiento}}</td>
                            <td data-label="Usuario">{{$cliente->NombreUsuario}}</td>
                            <td>
                                <button type="button" class="btn btn-primary botton " data-bs-toggle="modal" data-bs-target="#exampleModalup{{$cliente->IdCliente}}" data-bs-whatever="@mdo">Editar</button>
                                <button type="button" class="btn btn-primary botton" data-bs-toggle="modal" data-bs-target="#exampleModaldel{{$cliente->IdCliente}}" data-bs-whatever="@mdo">Eliminar</button>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- insert -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="formulario" method="post" action="{{route('CreateCliente')}}">
                    @csrf
                        <h1>Crear Usuario</h1>
                        <div class="contenedor">

                            <div class="input-contenedor">
                                <div class="flex">
                                    <div class="inp margin">
                                        <i class="fas fa-user icon"></i><input type="text" placeholder="Nombre" name="Nombre">
                                    </div>
                                    <div class="inp">
                                        <i class="fas fa-user icon"></i><input type="text" placeholder="Apellido" name="Apellido">
                                    </div>
                                </div>
                            </div>
                            <div class="input-contenedor">
                                <div class="flex">
                                    <div class="inp margin">
                                        <i class="fas fa-user icon"></i><input type="text" placeholder="Identidad" name="ClienteIdentidad">
                                    </div>
                                    <div class="inp">
                                        <i class="fas fa-table icon"></i><input type="date" class="date" name="FechaNacimiento">
                                    </div>
                                </div>
                            </div>
                            <div class="input-contenedor">
                                <div class="">
                                    <div class="inp margin">
                                        <i class="fas fa-users icon"></i><input type="text" placeholder="Usuario" id="user" name="NombreUsuario">
                                    </div>
                                </div>
                            </div>

                            <div class="input-contenedor">
                                <div class="flex">
                                    <div class="inp margin">
                                        <i class="fas fa-key icon"></i><input type="password" placeholder="Contraseña" name="Contraseña">

                                    </div>
                                    <div class="inp">
                                        <i class="fas fa-key icon"></i><input type="password" placeholder="Confirmar Contraseña" name="ConContraseña">
                                    </div>
                                </div>
                            </div>
                            <div class="input-contenedor">
                                <div class="flex">
                                    <div class="inp ">
                                        <button type="submit" class="btn btn-secondary botton" data-bs-dismiss="modal">Guardar</button>

                                    </div>
                                    <div class="inp space">
                                    <button type="button" class="btn btn-secondary botton" data-bs-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Update -->
    @foreach($clientes as $cliente)
    <div class="modal fade" id="exampleModalup{{$cliente->IdCliente}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="formulario" method="post" action="{{route('Update_Cliente',$cliente->IdCliente)}}">
                    @csrf
                        <h1>Editar Usuario</h1>
                        <div class="contenedor">

                            <div class="input-contenedor">
                                <div class="flex">
                                    <div class="inp margin">
                                        <i class="fas fa-user icon"></i><input type="text" placeholder="Nombre" value="{{$cliente->Nombre}}" name="Nombre">
                                    </div>
                                    <div class="inp">
                                        <i class="fas fa-user icon"></i><input type="text" placeholder="Apellido" value="{{$cliente->Apellido}}" name="Apellido">
                                    </div>
                                </div>
                            </div>
                            <div class="input-contenedor">
                                <div class="flex">
                                    <div class="inp margin">
                                        <i class="fas fa-user icon"></i><input type="text" placeholder="Identidad" value="{{$cliente->ClienteIdentidad}}" name="ClienteIdentidad">
                                    </div>
                                    <div class="inp">
                                        <i class="fas fa-table icon"></i><input type="date" class="date" value="{{$cliente->FechaNacimiento}}" name="FechaNacimiento">
                                    </div>
                                </div>
                            </div>
                            <div class="input-contenedor">
                                <div class="">
                                    <div class="inp margin">
                                        <i class="fas fa-users icon"></i><input type="text" placeholder="Usuario" id="user" value="{{$cliente->NombreUsuario}}" name="NombreUsuario">
                                    </div>
                                </div>
                            </div>

                            <div class="input-contenedor">
                                <div class="flex">
                                    <div class="inp margin">
                                        <i class="fas fa-key icon"></i><input type="password" placeholder="Contraseña" name="Contraseña">

                                    </div>
                                    <div class="inp">
                                        <i class="fas fa-key icon"></i><input type="password" placeholder="Confirmar Contraseña" name="ConContraseña">
                                    </div>
                                </div>
                            </div>
                            <div class="input-contenedor">
                                <div class="flex">
                                    <div class="inp ">
                                        <button type="submit" class="btn btn-secondary botton" data-bs-dismiss="modal">Actualizar</button>

                                    </div>
                                    <div class="inp space">
                                    <button type="button" class="btn btn-secondary botton" data-bs-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach


    <!-- Delete -->
    @foreach($clientes as $cliente)
    <div class="modal fade" id="exampleModaldel{{$cliente->IdCliente}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="formulario" method="post" action="{{route('Delete_Cliente',$cliente->IdCliente)}}">
                    @csrf
                        <h1>Eliminar Usuario</h1>
                        <div class="contenedor">

                            <div class="input-contenedor">
                                <div class="flex">
                                    <div class="inp margin">
                                        <i class="fas fa-user icon"></i><input type="text" placeholder="Nombre" value="{{$cliente->Nombre}}" name="Nombre" disabled>
                                    </div>
                                    <div class="inp">
                                        <i class="fas fa-user icon"></i><input type="text" placeholder="Apellido" value="{{$cliente->Apellido}}" name="Apellido" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="input-contenedor">
                                <div class="flex">
                                    <div class="inp margin">
                                        <i class="fas fa-user icon"></i><input type="text" placeholder="Identidad" value="{{$cliente->ClienteIdentidad}}" name="ClienteIdentidad" disabled>
                                    </div>
                                    <div class="inp">
                                        <i class="fas fa-table icon"></i><input type="date" class="date" value="{{$cliente->FechaNacimiento}}" name="FechaNacimiento" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="input-contenedor">
                                <div class="">
                                    <div class="inp margin">
                                        <i class="fas fa-users icon"></i><input type="text" placeholder="Usuario" id="user" value="{{$cliente->NombreUsuario}}" name="NombreUsuario" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="input-contenedor">
                                <div class="flex">
                                    <div class="inp margin">
                                        <i class="fas fa-key icon"></i><input type="password" placeholder="Contraseña" name="Contraseña" disabled>

                                    </div>
                                    <div class="inp">
                                        <i class="fas fa-key icon"></i><input type="password" placeholder="Confirmar Contraseña" name="ConContraseña" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="input-contenedor">
                                <div class="flex">
                                    <div class="inp ">
                                        <button type="submit" class="btn btn-secondary botton" data-bs-dismiss="modal">Actualizar</button>

                                    </div>
                                    <div class="inp space">
                                    <button type="button" class="btn btn-secondary botton" data-bs-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
    
    {{-- Aqui va el contenido de HTML la página web. --}}
@endsection

@push('scripts-cita')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endpush