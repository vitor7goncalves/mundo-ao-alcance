@extends('welcome')

@section('title')


@section('content')
    <div class="container-fluid d-flex flex-column align-items-center justify-content-center w-100">
        <div class="d-flex flex-column align-items-center justify-content-center w50 m-3">
            <a href="/" class="w-50 d-flex justify-content-center">
                <img src="{{ asset('assets/logoForm.png') }}" alt="Logo" class="img-fluid">
            </a>
        </div>
        @if ($errors->any())
            <div id="error-alert" class="alert alert-danger position-absolute top-0 start-50 translate-middle-x w-50 mt-3 bg-primary-color">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('store') }}" method="post" class="w-100">
            @csrf
            @include('components.form-register')
        </form>
    </div>
    <script src="{{ asset('js/errorAlert.js') }}"></script>
@endsection