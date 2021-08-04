@extends('layouts.master')
@push('view-styles')
<link rel="stylesheet" href="{{ asset('CrudCss/GalProd.css') }}">
@endpush
@section('content')
<h1>Productos Disponibles</h1>
<div class="container prin">

    <div class="item"> 
      <img src="images/img1.jpg" alt="" class="item-img">
      <div class="item-text">
        <h3>Imagen 1</h3>
        <p>Lorem ipsum dolor sit amet, consectetur.</p>
      </div>
    </div>
    
    <div class="item">
      <img src="images/img2.jpg" alt="" class="item-img">
      <div class="item-text">
        <h3>Imagen 1</h3>
        <p>Lorem ipsum dolor sit amet, consectetur.</p>
      </div>
    </div>
    
    <div class="item">
      <img src="images/img3.jpg" alt="" class="item-img">
      <div class="item-text">
        <h3>Imagen 1</h3>
        <p>Lorem ipsum dolor sit amet, consectetur.</p>
      </div>
    </div>
    
    <div class="item">
      <img src="images/img4.jpg" alt="" class="item-img">
      <div class="item-text">
        <h3>Imagen 1</h3>
        <p>Lorem ipsum dolor sit amet, consectetur.</p>
      </div>
    </div>
    
    
    <div class="item">
      <img src="images/img5.jpg" alt="" class="item-img">
      <div class="item-text">
        <h3>Imagen 1</h3>
        <p>Lorem ipsum dolor sit amet, consectetur.</p>
      </div>
    </div>
    
    <div class="item">
      <img src="images/img6.jpg" alt="" class="item-img">
      <div class="item-text">
        <h3>Imagen 1</h3>
        <p>Lorem ipsum dolor sit amet, consectetur.</p>
      </div>
    </div>
  </div>
@endsection