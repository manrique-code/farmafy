@extends('layouts.master')
@push('view-styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
<link rel="stylesheet" href="{{ asset('CrudCss/CrudUser.css') }}">
@endpush
@section('title', '*Reemplazar este texto. Aquí va el titulo de nuestra página*')
@section('content')
<div class="contenedor prin">
        <div class="Contenedor2">
            <div class="titulobuscar">
                <h1>Tabla de Empleados</h1>
                <div class="input-buscar">
                    <form action="{{route('find')}}" method="get">

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
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Identidad</th>
                            <th scope="col">Fecha Nacimiento</th>
                            <th scope="col">Cargo</th>
                            <th scope="col">Nombre Usuario</th>
                            <th scope="col">Tipo Usuario</th>
                            <th scope="col">Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($empleado)<=0) <tr>
                            <td>No hay Resultados</td>
                            </tr>
                            @else
                            @foreach($empleado as $empleados)
                            <tr>
                                <td data-label="codigo">{{$empleados->IdEmpleado}}</td>
                                <td data-label="Nombre">{{$empleados->Nombre}}</td>
                                <td data-label="Apellido">{{$empleados->Apellido}}</td>
                                <td data-label="Identidad">{{$empleados->NumIdentidadEmpleado}}</td>
                                <td data-label="Cargo">{{$empleados->NombreCargo}}</td>
                                <td data-label="Nombre Usuario">{{$empleados->NombreUsuario}}</td>
                                <td data-label="Tipo Usuario">{{$empleados->TipoUsuario}}</td>
                                <td data-label="Tipo Usuario">{{$empleados->FechaNacimiento}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary botton " data-bs-toggle="modal" data-bs-target="#exampleModal{{$empleados->IdEmpleado}}" data-bs-whatever="@mdo">Editar</button>
                                    <button type="button" class="btn btn-primary botton" data-bs-toggle="modal" data-bs-target="#exampleModaldel{{$empleados->IdEmpleado}}">Eliminar</button>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @foreach($empleado as $empleados)
    <div class="modal fade" id="exampleModal{{$empleados->IdEmpleado}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="formulario" method="post" action="{{route('UpdateEmpl', $empleados->IdEmpleado)}}">
                        @csrf

                        <h1>Editar Empleados</h1>
                        <div class="contenedor">

                            <div class="input-contenedor">
                                <div class="flex">
                                    <div class="inp margin">
                                        <i class="fas fa-user icon"></i><input value="{{$empleados->Nombre}}" type="text" placeholder="Nombre" name="nombre">
                                    </div>
                                    <div class="inp">
                                        <i class="fas fa-user icon"></i><input value="{{$empleados->Apellido}}" type="text" placeholder="Apellido" name="apellido">
                                    </div>
                                </div>
                            </div>
                            <div class="input-contenedor">
                                <div class="flex">
                                    <div class="inp margin">
                                        <i class="fas fa-user icon"></i><input value="{{$empleados->NumIdentidadEmpleado}}" type="text" placeholder="Identidad" name="Identidad">
                                    </div>
                                    <div class="inp">
                                        <i class="fas fa-users icon"></i><select name="IdCargo" id="TipoUser" class="date TipoUser">
                                            <option value="{{$empleados->IdCargo}}">{{$empleados->NombreCargo}}</option>
                                            @foreach($cargos as $cargo)
                                            <option value="{{$cargo->IdCargo}}">{{$cargo->NombreCargo}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="input-contenedor">
                                <div class="flex">
                                    <div class="inp ">
                                        <i class="fas fa-users icon"></i><select name="IdTipoUsuario" id="TipoUser" class="">
                                            <option value="{{$empleados->IdTipoUsuario}}">{{$empleados->TipoUsuario}}</option>
                                            @foreach($tipUser as $tipUsers)
                                            <option value="{{$tipUsers->IdTipoUsuario}}">{{$tipUsers->TipoUsuario}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="inp ">
                                        <i class="fas fa-users icon"></i><input type="date" value="{{$empleados->FechaNacimiento}}" class="date" name="FechaNacimiento">
                                    </div>
                                </div>

                            </div>

                            <div class="input-contenedor">
                                <div class="">
                                    <div class="inp margin">
                                        <i class="fas fa-users icon"></i><input value="{{$empleados->NombreUsuario}}" type="text" placeholder="Usuario" id="user" name="Usuario">
                                    </div>
                                </div>
                            </div>

                            <div class="input-contenedor">
                                <div class="flex">
                                    <div class="inp margin">
                                        <i class="fas fa-key icon"></i><input type="password" placeholder="********" name="Contraseña">
                                    </div>
                                    <div class="inp">
                                        <i class="fas fa-key icon"></i><input type="password" placeholder="********" name="ConContraseña" value="123">
                                    </div>
                                </div>
                            </div>
                            <div class="input-contenedor">
                                <div class="flex">
                                    <div class="inp ">

                                        <input type="submit" class="btn btn-primary botton" name="Guardar" value="Guardar">

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




    <!-- ingresar user -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="formulario" method="post" action="{{route('IngresarEmpl')}}">
                        @csrf
                        <h1>Crear Nuevo Empleado</h1>
                        <div class="contenedor">
                            <div class="input-contenedor">
                                <div class="flex">
                                    <div class="inp margin">
                                        <i class="fas fa-user icon"></i><input type="text" placeholder="Nombre" name="nombre">
                                    </div>
                                    <div class="inp">
                                        <i class="fas fa-user icon"></i><input type="text" placeholder="Apellido" name="apellido">
                                    </div>
                                </div>
                            </div>
                            <div class="input-contenedor">
                                <div class="flex">
                                    <div class="inp margin">
                                        <i class="fas fa-user icon"></i><input type="text" placeholder="Identidad" name="Identidad">
                                    </div>
                                    <div class="inp">
                                        <i class="fas fa-users icon"></i><select name="IdCargo" id="TipoUser" class="date TipoUser">
                                            <option value="">Seleccione su Cargo</option>
                                            @foreach($cargos as $cargo)
                                            <option value="{{$cargo->IdCargo}}">{{$cargo->NombreCargo}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="input-contenedor">
                                <div class="flex">
                                    <div class="inp ">
                                        <i class="fas fa-users icon"></i><select name="IdTipoUsuario" id="TipoUser" class="">
                                            <option value="">Seleccione Tipo de Usuario</option>
                                            @foreach($tipUser as $tipUsers)
                                            <option value="{{$tipUsers->IdTipoUsuario}}">{{$tipUsers->TipoUsuario}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="inp ">
                                        <i class="fas fa-users icon"></i><input type="date" value="FechaNacimiento" name="FechaNacimiento" class="date" >
                                    </div>
                                </div>

                            </div>

                            <div class="input-contenedor">
                                <div class="">
                                    <div class="inp margin">
                                        <i class="fas fa-users icon"></i><input type="text" placeholder="Usuario" id="user" name="Usuario">
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

                                        <input type="submit" class="btn btn-primary botton" name="Guardar" value="Guardar">
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



    <!-- Eliminar User -->
    @foreach($empleado as $empleados)
    <div class="modal fade" id="exampleModaldel{{$empleados->IdEmpleado}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="formulario" method="post" action="{{route('DeleteEmpl', $empleados->IdEmpleado)}}">
                        @csrf

                        <h1>Eliminar Empleados</h1>
                        <div class="contenedor">

                            <div class="input-contenedor">
                                <div class="flex">
                                    <div class="inp margin">
                                        <i class="fas fa-user icon"></i><input value="{{$empleados->Nombre}}" type="text" placeholder="Nombre" name="nombre" disabled>
                                    </div>
                                    <div class="inp">
                                        <i class="fas fa-user icon"></i><input value="{{$empleados->Apellido}}" type="text" placeholder="Apellido" name="apellido" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="input-contenedor">
                                <div class="flex">
                                    <div class="inp margin">
                                        <i class="fas fa-user icon"></i><input value="{{$empleados->NumIdentidadEmpleado}}" type="text" placeholder="Identidad" name="Identidad" disabled>
                                    </div>
                                    <div class="inp">
                                        <i class="fas fa-users icon"></i><select name="IdCargo" id="TipoUser" class="date TipoUser" disabled>
                                            <option value="{{$empleados->IdCargo}}">{{$empleados->NombreCargo}}</option>
                                            @foreach($cargos as $cargo)
                                            <option value="{{$cargo->IdCargo}}">{{$cargo->NombreCargo}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="input-contenedor">
                                <div class="flex">
                                    <div class="inp ">
                                        <i class="fas fa-users icon"></i><select name="IdTipoUsuario" id="TipoUser" class="" disabled>
                                            <option value="{{$empleados->IdTipoUsuario}}">{{$empleados->TipoUsuario}}</option>
                                            @foreach($tipUser as $tipUsers)
                                            <option value="{{$tipUsers->IdTipoUsuario}}">{{$tipUsers->TipoUsuario}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="inp ">
                                        <i class="fas fa-users icon"></i><input type="date" value="{{$empleados->FechaNacimiento}}" class="date" name="FechaNacimiento" disabled>
                                    </div>
                                </div>

                            </div>

                            <div class="input-contenedor">
                                <div class="">
                                    <div class="inp margin">
                                        <i class="fas fa-users icon"></i><input value="{{$empleados->NombreUsuario}}" type="text" placeholder="Usuario" id="user" name="Usuario" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="input-contenedor">
                                <div class="flex">
                                    <div class="inp margin">
                                        <i class="fas fa-key icon"></i><input type="password" placeholder="********" name="Contraseña" disabled>
                                    </div>
                                    <div class="inp">
                                        <i class="fas fa-key icon"></i><input type="password" placeholder="********" name="ConContraseña" value="123" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="input-contenedor">
                                <div class="flex">
                                    <div class="inp ">

                                        <input type="submit" class="btn btn-primary botton" name="Guardar" value="Eliminar">

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
@endsection

@push('scripts-cita')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endpush