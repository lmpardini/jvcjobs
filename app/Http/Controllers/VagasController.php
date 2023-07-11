<?php

namespace App\Http\Controllers;

use App\Models\Vagas;
use Illuminate\Http\Request;

class VagasController extends Controller
{
    public function vagas(Request $request)
    {
        $selectFiltro = Vagas::get();

        $cidades =  [];
        $cargos  =  [];

        $selectFiltro->map(function ($item) use (&$cargos, &$cidades) {
            $cidades[] = $item->LocalVaga->nome;
            $cargos[] = $item->nome;
        });

        $vagas = Vagas::whereHas('StatusVaga', function ($query) {
            $query->where('slug', 'em_processo');
        })->when($request->cidade && $request->cidade !== 'todos', function ($query) use ($request) {
            $query->whereHas('LocalVaga', function ($query) use ($request) {
                $query->where('nome', $request->cidade);
            });
        })->when($request->cargo && $request->cargo !== 'todos', function ($query) use ($request) {
            $query->where('nome', $request->cargo);
        })->with('LocalVaga')->orderByDesc('destaque')->paginate(10);

        $cidades = collect($cidades)->unique()->values()->sort();
        $cargos = collect($cargos)->unique()->values()->sort();

        return view('vagas', [
            'vagas' => $vagas,
            'cidades' => $cidades,
            'cargos' => $cargos,
            'input_cidade' => $request->cidade,
            'input_cargo' => $request->cargo,
        ]);
    }

    public function vagasDetalhes(int $id)
    {
        /**
         * @var Vagas $vaga
         */
        $vaga = Vagas::whereHas('StatusVaga', function ($query) {
            $query->where('slug', 'em_processo');
        })->whereId($id)->with('LocalVaga')->first();

        if (!$vaga) {
            return response()->view('errors.404');
        }

        $inscritoVaga = false;

        if (auth()->user() && auth()->user()->PerfilUsuario->slug === 'candidato') {
            $vagasInscritas = collect(auth()->user()->Candidato->Vagas);

            if ($vagasInscritas->contains('id', $vaga->id)) {
                $inscritoVaga = true;
            }
        }

        return view('vaga-detalhe', [
            'vaga' => $vaga,
            'inscrito' => $inscritoVaga
        ]);
    }
}
