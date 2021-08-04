@extends('layouts.master')
@push('crear-cuenta-empleados-styles')
    <link rel="stylesheet" href="{{ asset('logincss/cuenta-empleado.css') }}">
@endpush
@section('title', 'Farmafy: Crear cuenta del empleado.')
@section('content')
    <main>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{URL::to('empleados')}}" method="POST">
            @csrf
            <h2>Registro del empleado</h2>
            <fieldset class="personalData">
                <legend>Datos personales</legend>
                <label for="txtIdEmp">Número de Identidad</label>
                <input type="text" id="txtIdEmp" placeholder="0000-0000-00000" name="NumIdentidad">
                <label for="txtNomEmp">Nombre</label>
                <input type="text" id="txtNomEmp" placeholder="Linus" name="Nombre">
                <label for="txtApeEmp">Apellido</label>
                <input type="text" id="txtApeEmp" placeholder="Torvalds" name="Apellido">
                <label for="dptEdad">Fecha de nacimiento</label>
                <input type="date" name="FechaNacimiento" id="" name="FechaNacimiento">
            </fieldset>
            <fieldset class="adminData">
                <legend>Datos administrativos</legend>
                <label for="cboxCharge">Cargo que funge</label>
                <select name="" id="cboxCharge" class="charge">
                    <option value="">Seleccione el cargo</option>
                </select>
            </fieldset>
            <fieldset class="userData">
                <legend>Datos del usuario</legend>
                <label for="txtEmail">Correo Electronico</label>
                <input type="email" name="" id="txtEmail">
                <label for="txtUser">Nombre de usuario</label>
                <input type="text" id="txtUser">
                <label for="txtContra">Contraseña</label>
                <input type="password" id="txtContra">
            </fieldset>
            <input type="submit" class="button-cuenta-save" title="Guardar el empleado en la base de datos" value="Crear cuenta de empleado">
        </form>
    </main>
@endsection