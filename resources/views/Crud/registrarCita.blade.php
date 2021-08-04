@extends('layouts.master')
@push('registrar-cita-styles')
    <link rel="stylesheet" href="{{ asset('CrudCss/registrarCita.css') }}">
    <link rel="stylesheet" href="{{ asset('logincss/noLogin.css') }}">
@endpush
@section('title', 'Farmafy: Crear cuenta del empleado.')
@section('content')
    <main>
        @if (session('IdUsuario'))
        <section class="citas">
            <h2>Creando cita</h2>
            
            {{-- Formulario para saber el tipo de doctor --}}
            <label for="doctores-areas-select">¿Qué tipo de doctor necesitás?</label>
            <form action="{{ URL::to('/crearcita-load') }}" method="POST" class="area-citas">

                {{-- 
                - Para cargas los médicos por el tipo de área primero mandamos este formulatio que los conteien    
                --}}
                <input type="hidden" name="_token" value="<?php echo csrf_token()?>">
                <select name="doctores-areas" id="doctores-areas-select" class="doctores-areas-select" onchange="this.form.submit()">
                    <option value="#">Selecciona un tipo de doctor</option>
                    @foreach ($cargosDoctor as $cargoDoctor)
                        <option value="{{ $cargoDoctor->IdCargo }}" 
                            @if ($selected != 0 && $cargoDoctor->IdCargo == $selected)
                                {{ "selected" }}
                            @endif    
                        >{{ $cargoDoctor->NombreCargo }}</option>
                    @endforeach
                </select>

            </form>

            <form action="{{URL::to('/crearcita-sendingtostore')}}" method="POST" id="form-informacion-cita">
                <input type="hidden" name="_token" value="<?php echo csrf_token()?>">

                @if (isset($doctores))

                    <fieldset class="doctores">
                        <legend>Elije un doctor</legend>
                        <label for="doctores-select">Doctores</label>
                        <select name="doctores" id="doctores-select" class="doctores-select" onchange="document.getElementById('form-doctores').submit()">
                            <option value="#">Elije entre nuestros doctores</option>
                            @foreach ($doctores as $doctor)
                                <option value="{{ $doctor->IdEmpleado }}">{{ $doctor->NombreDoctor }}</option>
                            @endforeach
                        </select>
                    </fieldset>

                    <fieldset class="fechas">
                        <legend>Fecha de cita</legend>
                        <label for="dtp-fecha-cita">Días disponibles</label>
                        <input
                            type="date"
                            min="{{ $fechaMinima }}"
                            name="fecha-cita"
                            id="dtp-fecha-cita"
                            value="{{ $fechaMinima }}"
                        >
                    </fieldset>
    
                    <fieldset>
                        <legend>Hora de la cita</legend>
                        @for ($i = 8; $i < 18; $i++)
                            @if ($i !== 12)
                                @if ($i !== $horaNoDisponible)
                                    <input 
                                        type="radio"
                                        name="hora"
                                        id="hora-{{$i}}" 
                                        value="{{$i}}:00:00" 
                                        data-hora="{{$i}}:00 A.M." 
                                        onclick="
                                            document.getElementById('tieneCita') && document.getElementById('tieneCita').innerText = '';
                                        "
                                    >
                                    <label id="hora" for="hora-{{$i}}">{{$i}}:00 {{ ($i > 11) ? "P.M." : "A.M."}}</label>
                                @endif
                            @endif                        
                        @endfor
                        <p id="tieneCita">{{$tieneCita ?? ''}}</p>
                    </fieldset>
    
                </form>

                @else

                    <fieldset class="doctores disabled" disabled>
                        <legend class="message"> <i class="fas fa-long-arrow-alt-up"></i> Primero elije el área médica que está necesitando</legend>
                        <label for="doctores-select">Doctores</label>
                        <select name="doctores" id="doctores-select" class="doctores-select">
                            <option value="#">Elije entre nuestros doctores</option>
                        </select>
                    </fieldset>

                    <fieldset class="fechas" disabled>
                        <legend>Fecha de cita</legend>
                        <label for="dtp-fecha-cita">Días disponibles</label>
                        <input
                            type="date"
                            min="{{ $fechaMinima }}"
                            name="fecha-cita"
                            id="dtp-fecha-cita"
                            value="{{ $fechaMinima }}"
                        >
                    </fieldset>
    
                    <fieldset disabled>
                        <legend>Hora de la cita</legend>
                        @for ($i = 8; $i < 18; $i++)
                            @if ($i !== 12)
                                @if ($i !== $horaNoDisponible)
                                    <input 
                                        type="radio"
                                        name="hora"
                                        id="hora-{{$i}}" 
                                        value="{{$i}}:00:00" 
                                        data-hora="{{$i}}:00 A.M." 
                                        onclick="
                                            document.getElementById('tieneCita') && document.getElementById('tieneCita').innerText = '';
                                        "
                                    >
                                    <label id="hora" for="hora-{{$i}}">{{$i}}:00 {{ ($i > 11) ? "P.M." : "A.M."}}</label>
                                @endif
                            @endif                        
                        @endfor
                        <p id="tieneCita">{{$tieneCita ?? ''}}</p>
                    </fieldset>
    

                @endif

                
{{-- 
            <hr>

            <h2>Resumen de la cita</h2>
            <div class="informacion-cita">
                <div class="informacion-cliente">
                    <h3>Paciente (vos)</h3>
                    <p id="cliente-data"></p>
                </div>
                <div class="informacion-doctor">
                    <h3>Doctor</h3>
                    <p id="doctor-data"></p>
                </div>
                <div class="informacion-fecha">
                    <h3>Fecha de la cita</h3>
                    <p id="fecha-data"></p>
                </div>
            </div> --}}

            <h4 class="pregunta-cita">¿Está correcta la información?</h4>
            <button type="menu" class="cancelar"><a href="{{ URL::to('/') }}">Cancelar</a></button>
            <input type="submit" class="submit" value="Sí, crear cita" form="form-informacion-cita">

        </section>
        @else
            <section class="no-login">

                <article class="no-login-description">
                    <h3>¡Ups!, recordá <span class="acentuation">iniciar sesión</span> para poder crear una cita.</h3>
                    <button class="comeback-login"><a href="{{URL::to('/login')}}">Iniciar sesión</a></button>
                </article>

                <article class="no-login-img-container">
                    <img src="{{ asset('logincss/no-login.png') }}" alt="" class="no-login-img">
                </article>
            </section>

        @endif
    </main>
    {{-- @push('scripts-cita')
        <script src="{{ asset('Crudcss/Js/registrarCita.js') }}" type="text/javascript"></script>
    @endpush --}}
@endsection