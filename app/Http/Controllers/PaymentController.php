<?php

namespace   App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
class PaymentController extends Controller
{
    public function payment()
    {
        return view("payment");
    }

    public function processPayment()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'Por favor, faça login para continuar.']);
        }

        if (is_null($user->travelName) && is_null($user->location)) {
            return redirect()->route('getDestinations')->with('info', 'Falha no Pagamento.');
        }

        $user->travelName = null;
        $user->location = null;
        $user->save();

        return redirect()->route('getDestinations')->with('success', 'Pagamento Concluído com Sucesso!');
    }
}