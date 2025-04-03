<div
    class="flex flex-column justify-content-center align-items-center mx-auto w-50 h-50 min-vh-50 border rounded border-gray-300 bg-primary-color p-5 mb-5">
    <h3 class="text-white">Insira deus dados para criar uma conta</h3>

    <label for="name" class="form-label text-white">nome</label>
    <input type="text" name="name" id="name" placeholder="digite seu nome" class="form-control" required>

    <label for="phone" class="form-label text-white mt-3">telefone</label>
    <input type="tel" name="phone" id="phone" placeholder="digite seu telefone ex: (99) 99999-9999" class="form-control" required>

    <label for="email" class="form-label text-white mt-3">email</label>
    <input type="email" name="email" id="email" placeholder="digite seu e-mail" class="form-control" required>

    <label for="email" class="form-label text-white mt-3">confirme seu email</label>
    <input type="email" name="email_confirmation" id="email_confirmation" placeholder="repita seu e-mail" class="form-control" required>

    <label for="password" class="form-label text-white mt-3">senha</label>
    <input type="password" name="password" id="password" placeholder="insira uma senha segura (mínimo 8 caracteres)" class="form-control" required>

    <label for="password" class="form-label text-white mt-3">confirmação de senha</label>
    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="repita a senha" class="form-control" required>

    <button class="btn-second-color w-100 mt-4" type="submit">Enviar</button>
    <p class="text-center mt-3 text-white">Já possui uma conta?</p>
    <a href="{{ route('login') }}" class="btn mt-1 w-100 text-decoration-none text-white">Acesse sua conta aqui!</a>
</div>