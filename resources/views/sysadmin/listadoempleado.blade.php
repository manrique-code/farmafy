@extends('layouts.master');
{{-- Con push mandamos los datos hasta el header --}}
@push('listado-empleados-styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endpush
{{-- Le indicamos el title que se mostrará en todas las páginas --}}
@section('title', 'Listado de empleados')
@section('content')
    <a href="{{ route('/') }}">Ir al inicio</a>
    <main>
        
    </main>
@endsection