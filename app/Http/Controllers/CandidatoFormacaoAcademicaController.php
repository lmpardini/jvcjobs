<?php

namespace App\Http\Controllers;

use App\Models\CandidadoExperienciaProfissional;
use App\Models\CandidatoFormacaoAcademica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CandidatoFormacaoAcademicaController extends Controller
{
    public function novaFormacao(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'candidato_id'       => 'required|exists:candidatos,id',
            'curso'              => 'required|string|max:255',
            'nome_instituicao'   => 'required|string|max:255',
            'modalidade_id'      => 'required|exists:formacao_academica_modalidades,id',
            'status_id'          => 'required|exists:formacao_academica_statuses,id',
            'data_inicio'        => 'required|date_format:Y-m-d',
            'data_conclusao'     => 'required|date_format:Y-m-d',
            'observacao'         => 'nullable|string|max:300',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->input())->with('aba', 'formacao');
        }

        try {
            DB::beginTransaction();

            $formacao = new CandidatoFormacaoAcademica();
            $formacao->candidato_id = $request->candidato_id;
            $formacao->curso = $request->curso;
            $formacao->nome_instituicao = $request->nome_instituicao;
            $formacao->modalidade_id = $request->modalidade_id;
            $formacao->status_id = $request->status_id;
            $formacao->data_inicio = $request->data_inicio;
            $formacao->data_conclusao = $request->data_conclusao;
            $formacao->observacao = $request->observacao;

            $formacao->save();

            DB::commit();

            return back()->with(['success' => 'Formação Academica cadastrada com sucesso!','aba' => 'formacao']);

        } catch (\Exception $e){
            DB::rollBack();
            return back()->withErrors($e->getMessage())->withInput($request->input());
        }
    }

    public function editarFormacao(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'formacao_id'        => 'required|exists:candidato_formacao_academicas,id',
            'candidato_id'       => 'required|exists:candidatos,id',
            'curso'              => 'required|string|max:255',
            'nome_instituicao'   => 'required|string|max:255',
            'modalidade_id'      => 'required|exists:formacao_academica_modalidades,id',
            'status_id'          => 'required|exists:formacao_academica_statuses,id',
            'data_inicio'        => 'required|date_format:Y-m-d',
            'data_conclusao'     => 'required|date_format:Y-m-d',
            'observacao'         => 'nullable|string|max:300',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->input())->with('aba', 'formacao');
        }

        try {
            DB::beginTransaction();

            /**
             * @var CandidatoFormacaoAcademica $formacao
             */
            $formacao = CandidatoFormacaoAcademica::whereId($request->formacao_id)->first();

            $formacao->candidato_id = $request->candidato_id;
            $formacao->candidato_id = $request->candidato_id;
            $formacao->curso = $request->curso;
            $formacao->nome_instituicao = $request->nome_instituicao;
            $formacao->modalidade_id = $request->modalidade_id;
            $formacao->status_id = $request->status_id;
            $formacao->data_inicio = $request->data_inicio;
            $formacao->data_conclusao = $request->data_conclusao;
            $formacao->observacao = $request->observacao;
            $formacao->save();

            DB::commit();

            return back()->with(['success' => 'Formação Academica atualizada com sucesso!','aba' => 'formacao']);

        } catch (\Exception $e){
            DB::rollBack();
            return back()->withErrors($e->getMessage())->withInput($request->input());
        }
    }

    public function deletarFormacao(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'formacao_id' => 'required|exists:candidato_formacao_academicas,id',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->input())->with('aba', 'experiencia');
        }

        try {
            DB::beginTransaction();

            /**
             * @var CandidatoFormacaoAcademica $formacao
             */
            $formacao = CandidatoFormacaoAcademica::whereId($request->formacao_id)->first();

            $formacao->delete();


            DB::commit();

            return back()->with(['success' => 'Formação Academica excluida com sucesso!','aba' => 'experiencia']);

        } catch (\Exception $e){
            DB::rollBack();
            return back()->withErrors($e->getMessage())->withInput($request->input());
        }
    }
}
