<div
    class="flex flex-column justify-content-center align-items-center mx-auto w-50 h-50 min-vh-50 border rounded border-gray-300 bg-primary-color p-5 mb-5">
    <h3 class="text-white">Entre com sua conta</h3>

    <label for="email" class="form-label text-white">email</label>
    <input type="email" name="email" id="email" placeholder="digite seu e-mail" class="form-control" required>

    <label for="password" class="form-label text-white mt-3">senha</label>
    <input type="password" name="password" id="password" placeholder="digite sua senha" class="form-control" required>

    <button class="btn-second-color w-100 mt-4" type="submit">Entrar</button>
    <p class="text-center mt-3 text-white">Não possui uma conta?</p>
    <a href="{{ route('register') }}" class="btn mt-1 w-100 text-decoration-none text-white">Crie sua conta aqui!</a>
</div>