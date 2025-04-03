<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BrazilTravel;
use App\Models\WorldTravel;

class DestinationsController extends Controller
{
    public function brazilDestinations()
    {
        $brazil = BrazilTravel::all();
        return view('brazilDestinations', compact('brazil'));
    }

    public function worldDestinations()
    {
        $world = WorldTravel::all();
        return view("worldDestinations", compact('world'));
    }

    public function getDestinations(Request $request)
    {
        // Validação dos dados recebidos
        $validatedData = $request->validate([
            'travelName' => 'nullable|string|exists:users,travelName',
            'location' => 'nullable|string|in:b,w',
        ]);

        // Verifica se os campos `travelName` e `location` foram enviados
        if (!isset($validatedData['travelName']) || !isset($validatedData['location'])) {
            return view('acquired_destination', [
                'travel' => null,
                'info' => 'Nenhum pacote de viagem foi encontrado.',
            ]);
        }

        // Define o modelo com base na localização
        $model = $validatedData['location'] === 'b' ? BrazilTravel::class : WorldTravel::class;

        // Busca o pacote de viagem correspondente
        $travel = $model::where('img_name', $validatedData['travelName'])->first();

        // Retorna a view com o pacote ou mensagem informativa
        return view('acquired_destination', [
            'travel' => $travel,
            'info' => $travel ? null : 'Nenhum pacote de viagem foi encontrado para os dados fornecidos.',
        ]);
    }
}