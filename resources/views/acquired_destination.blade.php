@extends('welcome')

@section('title', 'Meus pacotes')

@section('header')
    <div>
        @include('components.navbar')
    </div>
@endsection

@section('content')
    <div class="container-fluid h-100vh position-relative">
        @if(session('success'))
            <div id="success-alert"
                class="alert alert-success position-absolute top-0 start-50 translate-middle-x w-50 mt-3 text-center bg-primary-color">
                <p class="text-success fw-bold mt-3">{{ session('success') }}</p>
            </div>
        @endif
        @if(isset($travel) && !empty($travel))
            <div class="border border-0 bg-second-color p-0 h-100"
                aria-label="Selecionar pacote para {{ $travel['destination'] }}">
                <div class="d-flex align-items-center card-body-select text-center h-30-p">
                    <div class="h-100">
                        <img class="card-img-top img-card-select h-100"
                            src="{{asset('assets/' . $travel['img_name'] . '.png') }}" alt="Imagem do destino">
                    </div>
                    <div class="mt-3 w-100">
                        <h5 class="card-title text-second-color">{{$travel['destination']}}</h5>
                        <p class="card-text text-second-color text-muted fs-6 h-25 my-2 px-1">
                            {{ $travel['description']}}
                        </p>
                        <p class="card-text text-second-color fw-bold fs-5">
                            Valor do Pacote: R$ {{ number_format($travel['price'], 2, ',', '.') }}<br>
                            Inclui passagens, hospedagem e muito mais!
                        </p>
                    </div>
                </div>
                <form action="{{ route('payment') }}" method="GET" class="d-inline">
                    <button type="submit"
                        class="h-10 w-100 p-2 text-white text-center border border-0 rounded-bottom btn btn-success "
                        aria-label="Remove viagem da lista">
                        efetuar o pagamento
                    </button>
                </form>
                <form action="{{ route('removeDestinations') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit"
                        class="h-10 w-100 p-2 text-white text-center border border-0 rounded-bottom btn btn-danger "
                        aria-label="Remove viagem da lista">
                        remover
                    </button>
                </form>
            </div>
        @else
            <div
                class="d-flex flex-column justify-content-center align-items-center border rounded border-gray-300 w-100 h-75 py-5 bg-primary-color">
                <h4 class="text-white mb-4">Que tal planejar a sua próxima aventura?</h4>
                <div class="d-flex flex-column justify-content-center align-items-center w-75">
                    <p class="text-white text-center mb-3">
                        Descubra as belezas que o Brasil guarda para você. Praias paradisíacas, florestas exuberantes e muito
                        mais esperam por sua visita!
                    </p>
                    <a class="btn btn-second-color w-100 mb-4 text-uppercase fw-bold py-3"
                        href="{{ route('brazilDestinations') }}">
                        Explorar destinos brasileiros
                    </a>
                    <p class="text-white text-center mb-3">
                        Pronto para conhecer novas culturas? Descubra cenários deslumbrantes e experiências inesquecíveis nos
                        mais variados destinos internacionais.
                    </p>
                    <a class="btn btn-second-color w-100 text-uppercase fw-bold py-3" href="{{ route('worldDestinations') }}">
                        Explorar destinos internacionais
                    </a>
                </div>
            </div>
        @endif
    </div>
    <script src="{{ asset('js/successAlert.js') }}"></script>
@endsection