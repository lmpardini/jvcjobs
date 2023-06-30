<?php

namespace App\Http\Controllers;

use App\Models\CandidaturaVaga;
use App\Models\StatusCandidatura;
use App\Models\Vagas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CandidatoController extends Controller
{
    public function meusDados()
    {
        return view('candidato.dados');
    }

    public function minhasVagas()
    {
        return view('candidato.vagas', [
            'vagas' => auth()->user()->Candidato->CandidaturaVaga
        ]);
    }
    public function candidatarVaga(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vaga_id' => 'required|numeric|exists:vagas,id'
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        /**
         * @var Vagas $vaga
         */
        $vaga = Vagas::whereId($request->vaga_id)->first();

        if (!$vaga){
            return back()->withErrors(['Vaga Invalida']);
        }

        /**
         * @var StatusCandidatura $statusCandidatura
         */
        $statusCandidatura = StatusCandidatura::where('slug', 'inscrito')->first();

        if (!$statusCandidatura){
            return back()->withErrors(['Status de candidatura Invalido']);
        }

        $candidaturaVaga = new CandidaturaVaga();
        $candidaturaVaga->vaga_id = $vaga->id;
        $candidaturaVaga->candidato_id = auth()->user()->Candidato->id;
        $candidaturaVaga->status_candidatura_id = $statusCandidatura->id;
        $candidaturaVaga->save();

        return redirect()->route('candidato.minhas-vagas')->with('success', 'Inscrição realizada com sucesso!');
    }
}
