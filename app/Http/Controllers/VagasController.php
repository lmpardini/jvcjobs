<?php

namespace App\Http\Controllers;

use App\Models\Vagas;
use Illuminate\Http\Request;

class VagasController extends Controller
{
    public function vagas()
    {
        $vagas = Vagas::get()->sortByDesc('destaque');

        /**
         * TODO Implementar Logica de componente para quando não houver vagas cadastradas
         */

        return view('vagas', [
            'vagas' => $vagas
        ]);
    }

    public function vagasDetalhes(int $id)
    {
        $vaga = Vagas::whereId($id)->first();

        /**
         * TODO Implementar view page not found informando que houve erro na requisição
         */

        if (!$vaga) {
            return view('home');
        }

        return view('vaga-detalhe', [
            'vaga' => $vaga
        ]);
    }
}
