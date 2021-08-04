@extends('layouts.master')
@section('title', 'Farmafy: Crear cuenta del empleado.')
@section('saludo')
    <a href="#">Bienvenido {{ $usuario ?? '' }}</a>
@endsection
@section('content')
    <main>
        <section class="appointment">
            <div class="appointment-text">
                <div class="pre-header">
                    <span></span>
                    <p></p>
                </div>
                <h1 class="header"><span class="highlight-text">Evitá las filas</span>, hacé cita con nuestros doctores.</h1>
                <p class="description">¡Realizá una cita personalizada con nuestros doctores cuando querás y podás! Recibí la mejor atención médica para cuidar tu salud y la de tu familia.</p>
                <div class="get-started-container">
                    <a href="#" class="get-started-button">Comenzar</a>
                </div>
            </div>
            <div class="appointment-img">
                <img src="{{ asset('MenuCss/img/citas.png') }}" alt="">
            </div>
        </section>
        <section class="comments">
            <h2>Comentarios de nuestros clientes</h2>
            <article class="comentarios">
                <div class="comentario">
                    <div class="profile-picture-container"><img src="{{ asset('MenuCss/img/clientes/salvador-nasralla.jpg') }}" alt="Salvador Nasralla" class="profile-picture"></div>
                    <span class="name">Salvador Nasralla</span>
                    <p class="qualification">4/5</p>
                    <p class="comment">"Puedo hacer mis citas y así ahorrarme ir directamente a la clínica, y no mencionar posiblemente contraer COVID. Me da tiempo de ir a grabar X-0 Da Dinero. Muy fácil y rapido. ¡Tenemos portero!"</p>
                </div>
                <div class="comentario">
                    <div class="profile-picture-container"><img src="{{ asset('MenuCss/img/clientes/benito-martinez.jpg') }}" alt="Benito Martinez" class="profile-picture"></div>
                    <span class="name">Benito Martinez</span>
                    <p class="qualification">11/5</p>
                    <p class="comment">"Ye, ye, ye. Muy buena aplicación donde puedo revisar la disponibilidad de los productos que necesito y hacer mis citas médicas al instante. Si tu novio no utiliza esta aplicación, ¡pa eso que no mame!, ye, ye, ye."</p>
                </div>
            </article>
        </section>
        <section class="products">
            <div class="product-img">
                <img src="{{ asset('MenuCss/img/productos.png') }}" alt="">
            </div>
            <div class="product-text">
                    <div class="pre-header">
                        <span></span>
                        <p></p>
                    </div>
                    <h1 class="header">Buscá entre nuestra <span class="highlight-text">amplia variedad de productos</span></h1>
                    <p class="description">Los mejores productos medicinales disponibles en el país para poder tratar tus enfermedades a tiempo. No tenés que venir a nuestra clínica para ver si tenemos un producto, ¡checalo aquí mismo sin dar un paso fuera de tu casa!</p>
                    <div class="get-started-container">
                        <a href="#" class="get-started-button">Ver productos</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection