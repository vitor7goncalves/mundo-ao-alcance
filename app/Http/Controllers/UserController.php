<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $errorAlert = 'Desculpe-nos, não foi possível atender a sua requesição';
    public function login()
    {
        return view("login");
    }

    public function register()
    {
        return view("register");
    }

    public function clientArea()
    {
        return view("client_area");
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|string|email",
            "password" => "required|string"
        ], [
            "email.required" => "O campo de e-mail é obrigatório.",
            "email.email" => "Insira um endereço de e-mail válido.",
            "password.required" => "O campo de senha é obrigatório."
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $userPhone = Auth::user()->phone;
            $formattedPhone = preg_replace('/(\d{2})(\d{4,5})(\d{4})/', '($1) $2-$3', $userPhone);
            session(['formatted_phone' => $formattedPhone]);
            return redirect()->intended('/');
        }

        return back()->withErrors(
            [
                'login' => 'Dados incorretos',
            ]
        );
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|regex:/^\(\d{2}\) \d{4,5}-\d{4}$/',
            'email' => 'required|string|email|max:255|unique:users',
            'email_confirmation' => 'required|same:email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.unique' => 'Este e-mail já está cadastrado.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'A senha deve ter pelo menos 8 caracteres.',
            'password.confirmed' => 'A confirmação da senha não corresponde.',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'phone' => preg_replace('/[^0-9]/', '', $validatedData['phone']),
            'travelName' => "",
        ]);
        Auth::login($user);

        return redirect()->intended('/entrar');
    }

    public function tradeName(Request $request)
    {
        // Validação dos dados
        $validateData = $request->validate([
            'name' => "nullable|string|max:255",
        ]);

        // Usuário autenticado
        $userId = Auth::user()->id;
        $user = User::find($userId);

        // Verifica se o nome atual é igual ao novo
        if ($user->name === $validateData["name"]) {
            return redirect()->back()->withErrors(['error' => 'O novo nome não pode ser igual ao nome atual.']);
        }

        // Atualizar nome
        if ($user) {
            $user->name = $validateData['name'];
            $user->save();
            return redirect()->back()->with('success', 'Nome atualizado com sucesso!');
        }

        // Retorno caso não seja possível encontrar o usuário
        return redirect()->back()->withErrors(['error' => $this->errorAlert]);
    }

    public function tradePhone(Request $request)
    {
        $validateData = $request->validate([
            'phone' => "nullable|regex:/^\(\d{2}\) \d{4,5}-\d{4}$/",
        ]);

        $userId = Auth::user()->id;
        $user = User::find($userId);
        $formattedPhone = preg_replace('/\D/', '', $validateData['phone']);

        if (Auth::user()->phone === $formattedPhone) {
            return redirect()->back()->withErrors(['error' => "O novo número de telefone deve ser diferente do atual"]);
        }

        if ($user) {
            $user->phone = $formattedPhone;
            $user->save();
            $formattedPhone = preg_replace('/(\d{2})(\d{4,5})(\d{4})/', '($1) $2-$3', $formattedPhone);
            session(['formatted_phone' => $formattedPhone]);
            return redirect()->back()->with("success", "Telefone atualizado com sucesso!");
        }

        return redirect()->back()->withErrors(['error' => $this->errorAlert]);
    }

    public function tradeEmail(Request $request)
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);

        $validateData = $request->validate([
            'email' => 'nullable|string|email|max:255|unique:users,email,' . $userId,
            'email_confirmation' => 'nullable|same:email',
        ]);

        if(Auth::user()->email === $validateData['email'])
        {
            return redirect()-> back()->withErrors(['error'=>'O novo e-mail deve ser diferente do atual']);
        }

        if($user)
        {
            $user->email = $validateData['email'];
            $user->save();
            return redirect()->back()->with('success', 'Email atualizado com sucesso!');
        }

        return redirect()->back()->withErrors(['error'=> $this->errorAlert]);  
    }

    public function tradePassword(Request $request)
    {
        $validateData = $request->validate([
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $userId = Auth::user()->id;
        $user = User::find($userId);

        if(Auth::user()->password === $validateData['password'])
        {
            return redirect()->back()->withErrors(['error'=> 'A nova senha deve ser diferente da senha atual']);
        }

        if($user)
        {
            $user->password = bcrypt($validateData['password']);
            $user->save();
            return redirect()->back()->with('success', 'Senha atualizada com sucesso!');
        }

        return redirect()->back()->withErrors(['error'=> $this->errorAlert]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->intended('/');
    }

    public function updateTravelPackageBrazil(Request $request)
    {
        $validatedData = $request->validate([
            'img_name' => 'required|string|exists:brazil_travels,img_name',
            'location' => 'required|string|exists:brazil_travels,location',
        ]);

        $user = Auth::user();
        if ($user->travelName !== $validatedData['img_name'] || $user->location !== $validatedData['location']) {
            $user->travelName = $validatedData['img_name'];
            $user->location = $validatedData['location'];
            $user->save();
        }

        return redirect()->back()->with('success', 'Pacote de viagem adicionado com sucesso!');
    }

    public function updateTravelPackageWorld(Request $request)
    {
        $validatedData = $request->validate([
            'img_name' => 'required|string|exists:world_travels,img_name',
            'location' => 'required|string|exists:world_travels,location',
        ]);

        $user = Auth::user();
        if ($user->travelName !== $validatedData['img_name'] || $user->location !== $validatedData['location']) {
            $user->travelName = $validatedData['img_name'];
            $user->location = $validatedData['location'];
            $user->save();
        }

        return redirect()->back()->with('success', 'Pacote de viagem adicionado com sucesso!');
    }

    public function removeDestinations(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'Por favor, faça login para continuar.']);
        }

        if (is_null($user->travelName) && is_null($user->location)) {
            return redirect()->route('getDestinations')->with('info', 'Nenhum pacote de viagem para remover.');
        }

        $user->travelName = null;
        $user->location = null;
        $user->save();

        return redirect()->route('getDestinations')->with('success', 'Pacote de viagem removido com sucesso!');
    }

    public function deleteUser(Request $request)
    {
        $userId = $request->user()->id;
        $user = User::find($userId);

        if($user)
        {
            $user->delete();
            return redirect()->route('home')->with('success','Usuário deletado com sucesso!');
        }

        return redirect()->back()->withErrors(['error'=> $this->errorAlert]);
    }
}