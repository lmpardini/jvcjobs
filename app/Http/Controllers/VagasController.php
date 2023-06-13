<?php

namespace App\Http\Controllers;

use App\Models\Vagas;
use Illuminate\Http\Request;

class VagasController extends Controller
{
    public function vagas()
    {
        $vagas = Vagas::get()->sortByDesc('destaque');

        return view('vagas', [
            'vagas' => $vagas
        ]);
    }

    public function vagasDetalhes(int $id)
    {
        $vaga = Vagas::whereId($id)->first();

        if (!$vaga) {
            return response()->view('errors.404');
        }

        return view('vaga-detalhe', [
            'vaga' => $vaga
        ]);
    }
}
