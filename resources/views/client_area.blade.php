@extends('welcome')

@section('title')

@section('header')
    @include('components.navbar')
@endsection

@section('content')
    <div
        class="flex flex-column justify-content-center align-items-center position-relative mx-auto w-50 h-auto min-vh-50 border rounded border-gray-300 bg-primary-color p-5 mb-5">
        @if(session('success'))
            <div id="success-alert"
                class="alert alert-success position-absolute top-0 start-50 translate-middle-x w-50 mt-3 text-center bg-primary-color">
                <p class="text-success fw-bold mt-3">{{ session('success') }}</p>
            </div>
        @elseif($errors->any())
            <div id="error-alert"
                class="alert alert-danger position-absolute top-0 start-50 translate-middle-x w-50 mt-3 bg-primary-color">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h3 class="text-white mb-4">Minha conta</h3>

        <!-- Nome -->
        <div class="d-flex justify-content-between align-items-center mb-3 w-100">
            <label class="form-label text-white fw-bold">
                Nome: {{ Auth::user()->name }}
            </label>
            <button class="btn-second-color-two" id="toggle-name-btn" type="button">
                modificar
            </button>
        </div>
        <form action="{{ route('tradeName') }}" method="post" id="form-name" style="display: none;">
            @csrf
            <div class="flex flex-column">
                <input type="text" name="name" id="name" placeholder="Atualize seu nome" class="form-control mb-2" required>
                <button class="btn-second-color-two w-100 mb-3" type="submit">Atualizar</button>
            </div>
        </form>

        <!-- Telefone -->
        <div class="d-flex justify-content-between align-items-center mb-3 w-100">
            <label class="form-label text-white fw-bold">
                Telefone: {{ session('formatted_phone') }}
            </label>
            <button class="btn-second-color-two" id="toggle-phone-btn" type="button">
                modificar
            </button>
        </div>
        <form action="{{ route('tradePhone') }}" method="post" id="form-phone" style="display: none;">
            @csrf
            <div class="flex flex-column">
                <input type="tel" name="phone" id="phone" placeholder="Atualize seu telefone ex: (99) 99999-9999"
                    class="form-control mb-2" required>
                <button class="btn-second-color-two w-100 w-100 mb-3" type="submit">Atualizar</button>
            </div>
        </form>

        <!-- E-mail -->
        <div class="d-flex justify-content-between align-items-center mb-3 w-100">
            <label class="form-label text-white fw-bold">
                E-mail: {{ Auth::user()->email }}
            </label>
            <button class="btn-second-color-two" id="toggle-email-btn" type="button">
                modificar
            </button>
        </div>
        <form action="{{ route('tradeEmail') }}" method="post" id="form-email" style="display: none;">
        @csrf
            <div class="flex flex-column">
                <input type="email" name="email" id="email" placeholder="Atualize seu e-mail" class="form-control mb-2"
                    required>
                <input type="email" name="email_confirmation" id="email_confirmation" placeholder="Confirme seu e-mail"
                    class="form-control mb-2" required>
                <button class="btn-second-color-two w-100 w-100 mb-3" type="submit">Atualizar</button>
            </div>
        </form>

        <!-- Senha -->
        <div class="d-flex justify-content-between align-items-center mb-3 w-100">
            <label class="form-label text-white fw-bold">
                Alterar senha
            </label>
            <button class="btn-second-color-two" id="toggle-password-btn" type="button">
                modificar
            </button>
        </div>
        <form action="{{ route('tradePassword') }}" method="post" id="form-password" style="display: none;">
        @csrf
            <div class="flex flex-column">
                <input type="password" name="password" id="password" placeholder="Insira uma nova senha"
                    class="form-control mb-2" required>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    placeholder="Confirme sua nova senha" class="form-control mb-2" required>
                <button class="btn-second-color-two w-100 w-100 mb-3" type="submit">Atualizar</button>
            </div>
        </form>

        <!-- Excluir Conta -->
        <p class="text-center mt-4 text-white">Deseja excluir sua conta?</p>
        <form action="{{ route('deleteUser') }}" method="post" id="form-delete">
        @csrf
            <div class="flex flex-column">
                <button class="text-primary-color text-center border border-0 bg-primary-color fw-bold w-100 w-100 mb-3" type="submit">Clique aqui para excluir</button>
            </div>
        </form>
    </div>
    <script src="{{ asset('js/client_area.js') }}"></script>
    @if(session('success') || $errors->any())
        <script src="{{ asset('js/successAlert.js') }}"></script>
        <script src="{{ asset('js/errorAlert.js') }}"></script>
    @endif
@endsection