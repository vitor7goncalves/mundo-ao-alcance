@extends('welcome')

@section('title', 'Mundo Ao Alcance')

@section('header')
    @include('components.navbar')
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active position-relative">
                <img src="{{ asset('assets/inicio.png') }}" class="d-block w-100" alt="Slide 1">
                <div
                    class="carousel-caption d-none d-md-block bg-semi-transparence w-100 h-100 position-absolute top-0 start-0">
                    <h2 class="mb-3">Bem-vindo ao Mundo Ao Alcance</h2>
                    <h1 class="text-warning">Aproveite até 30% de desconto em pacotes família!</h1>
                    <h1 class="text-warning"> Oferta imperdível!</h1>
                    <h5 class="mb-5">Descubra os melhores pacotes de viagens!</h5>
                    <a href="#mainContent" class="btn-second-color">Explore Agora</a>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item position-relative">
                <img src="{{ asset('assets/brasil.png') }}" class="d-block w-100" alt="Slide 2">
                <div
                    class="carousel-caption d-none d-md-block bg-semi-transparence w-100 h-100 position-absolute top-0 start-0">
                    <h1 class="mb-3">Viagens pelo Brasil</h1>
                    <h5 class="mb-5">Explore as belezas naturais e culturais do país.</h5>
                    <a href="#mainContent" class="btn-second-color">Explore Mais</a>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item position-relative">
                <img src="{{ asset('assets/mundo.png') }}" class="d-block w-100" alt="Slide 3">
                <div
                    class="carousel-caption d-none d-md-block bg-semi-transparence w-100 h-100 position-absolute top-0 start-0">
                    <h1 class="mb-3">Viagens Internacionais</h1>
                    <h5 class="mb-5">Conheça destinos incríveis pelo mundo!</h5>
                    <a href="#mainContent" class="btn-second-color">Explore Mais</a>
                </div>
            </div>
        </div>
        <!-- Controles de Navegação -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Próximo</span>
        </button>
    </div>
@endsection

@section('content')
    <div class="container-fluid text-center">
        <h4 class="text-light">Explore o Mundo com Facilidades</h4>
        <p class="text-light">Descubra pacotes incríveis para viagens pelo Brasil e pelo mundo.</p>
    </div>
    <div class="container-fuid d-flex flex-column align-items-center justify-content-center w-100 my-5">
        <h3 class="text-white">Escolha seu destino!</h3>
        <div class="container-fuid d-flex align-items-center justify-content-center w-100">
            <div class="card w-25 h-30 m-3 position-relative">
                <a href="{{route('brazilDestinations')}}" class="card-link-body">
                    <div class="card-body-select text-center h-30">
                        <img src="{{ asset('assets/logo2.png') }} " alt="" class="w-30 position-absolute icon-position">
                        <img src="{{ asset('assets/FernandoDeNoronha.png') }}" class="card-img-top img-card-select"
                            alt="Viagem">
                        <h5 class="card-title mt-3">Viagens pelo Brasil</h5>
                        <p class="card-text mt-3">Descubra destinos incríveis em todo o país.</p>
                    </div>
                </a>
            </div>
            <div class="card w-25 h-30 m-3 position-relative">
                <a href="{{ route('worldDestinations') }}" class="card-link-body">
                    <div class="card-body-select text-center h-30">
                        <img src="{{ asset('assets/logo2.png') }} " alt="" class="w-30 position-absolute icon-position">
                        <img src="{{ asset('assets/AlpesSuiços.png') }}" class="card-img-top img-card-select" alt="Viagem">
                        <h5 class="card-title mt-3">Viagens pelo Mundo</h5>
                        <p class="card-text mt-3">Lugares lindos e exóticos espalhados pelo mundo.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection