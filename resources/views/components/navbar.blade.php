<nav class="navbar navbar-expand-lg bg-primary-color d-flex justify-content-between px-5">
    <div class="container-fluid w-100">
        <a href="/" class="w-25">
            <img src="{{ asset('assets/logo.png') }} " alt="Logo do site" class="w-25">
        </a>
        @if (Auth::user())
            <div class="nav-item dropdown">
                <a class="dropdown-toggle text-primary-color p-3 mx-5" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu bg-primary-color floating-session w-50 pt-4 text-center">
                    <form action="{{ route('getDestinations') }}" method="GET" class="d-inline w-100">
                        @csrf
                        <input type="hidden" name="travelName" value="{{ Auth::user()->travelName }}">
                        <input type="hidden" name="location" value="{{ Auth::user()->location }}">
                        <button type="submit"
                            class="h-auto w-100 p-2 text-primary-color text-center border border-0 bg-primary-color fw-bold"
                            aria-label="Meus pacotes">
                            meus pacotes
                        </button>
                    </form>
                    <div class="mb-1 text-primary-color">_____________</div>
                    <div class="w-100 mt-3">
                        <a href="{{ route('clientArea') }}" aria-label="Area do cliente"
                            class="d-inline mt-3 text-primary-color text-center text-decoration-none">
                            minha conta
                        </a>
                    </div>
                    <div class="mb-1 text-primary-color">_____________</div>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline w-100 mt-3">
                        @csrf
                        <button type="submit"
                            class="h-auto w-100 p-2 text-primary-color text-center border border-0 bg-primary-color fw-bold"
                            aria-label="Sair da conta">
                            sair
                        </button>
                    </form>
                </div>
            </div>
        @else
            <div class=" d-flex border-color-primary">
                <a href="{{ route('login') }}" aria-label="Entrar"
                    class="h-100 w-7 p-2 text-primary-color text-center text-decoration-none border-color-primary-a">entrar</a>
                <p class="text-primary-color">|</p>
                <a href="{{ route('register') }}" aria-label="Registrar"
                    class="h-100 w-7 p-2 text-primary-color text-center text-decoration-none border-color-primary-a">registrar</a>
            </div>
        @endif
    </div>
</nav>