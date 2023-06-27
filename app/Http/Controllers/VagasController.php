<?php

namespace App\Http\Controllers;

use App\Models\Vagas;
use Illuminate\Http\Request;

class VagasController extends Controller
{
    public function vagas(Request $request)
    {

        $cidades =  [];
        $cargos  =  [];

        $vagas = Vagas::when($request->cidade && $request->cidade !== 'todos', function ($query) use ($request) {
            $query->where('local', $request->cidade);
        })->when($request->cargo && $request->cargo !== 'todos', function ($query) use ($request) {
            $query->where('nome', $request->cargo);
        })->get()->sortByDesc('destaque');

        $vagas->map(function ($item) use (&$cargos, &$cidades) {
           $cidades[] = $item->local;
           $cargos[] = $item->nome;
        });

        $cidades = collect($cidades)->unique()->values();
        $cargos = collect($cargos)->unique()->values();

        return view('vagas', [
            'vagas' => $vagas,
            'cidades' => $cidades,
            'cargos' => $cargos,
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
