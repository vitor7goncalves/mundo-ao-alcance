@extends('welcome')

@section('title', 'Viagens pelo Mundo')

@section('header')
    <div>
        @include('components.navbar')
    </div>
@endsection

@section('content')
    <div class="container-fluid text-center py-3">
        <div>
            <div class="position-relative">
                <h4 class="text-white mb-5">Escolha seu pacote de viagens internacional</h4>
                <p class="text-white">Descubra os destinos mais incríveis do mundo com ofertas exclusivas para você!</p>
                @if(session('success'))
                    <div id="success-alert"
                        class="alert alert-success position-absolute top-0 start-50 translate-middle-x w-50 mt-3 text-center bg-primary-color">
                        <p class="text-success fw-bold mt-3">{{ session('success') }}</p>
                    </div>
                @endif
                <div class="container-fluid w-100 h-50 d-flex flex-wrap justify-content-center align-items-center">
                    @foreach ($world as $wld)
                        <div class="card w-20 h-30 mx-3 position-relative">
                            <form action="{{ route('updateTravelPackageWorld') }}" method="post">
                                @csrf
                                <input type="hidden" name="img_name" value="{{ $wld['img_name']}}">
                                <input type="hidden" name="location" value="{{ $wld['location']}}">
                                <button type="submit" class="card-link-body border border-0 bg-second-color p-0"
                                    aria-label="Selecionar pacote para {{ $wld['destination'] }}">
                                    <div class="card-body-select text-center">
                                        <img src="{{ asset('assets/logo2.png') }} " alt="Ícone da logo"
                                            class="w-30 position-absolute icon-position">
                                        <div class="h-12">
                                            <img class="card-img-top img-card-select h-100"
                                                src="{{asset('assets/' . $wld['img_name'] . '.png') }}" alt="Imagem do destino">
                                        </div>
                                        <div class="h-15-r mt-3">
                                            <h5 class="card-title text-second-color">{{$wld['destination']}}</h5>
                                            <p class="card-text text-second-color text-muted fs-6 h-25 my-4 px-1">
                                                {{ Str::limit($wld['description'], 72, '...')}}
                                            </p>
                                            <p class="text-second-color text-muted fs-6">Pacotes a partir de:</p>
                                            <p class="card-text text-second-color fs-3">R$
                                                {{ number_format($wld['price'], 2, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/successAlert.js') }}"></script>
@endsection