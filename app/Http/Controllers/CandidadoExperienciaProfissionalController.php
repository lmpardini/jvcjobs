<?php

namespace App\Http\Controllers;

use App\Models\CandidadoExperienciaProfissional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CandidadoExperienciaProfissionalController extends Controller
{
    public function novaExperiencia(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'candidato_id' => 'required|exists:candidatos,id',
            'nome_empresa' => 'required|string|max:255',
            'cidade'       => 'required|string|max:255',
            'estado_id'    => 'required|exists:estados,id',
            'pais_id'      => 'required|exists:paises,id',
            'funcao'       => 'required|string|max:255',
            'salario'      => 'nullable|string|max:255',
            'data_inicio'  => 'required|date_format:Y-m-d',
            'data_fim'     => 'required|date_format:Y-m-d',
            'observacao'   => 'nullable|max:300'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->input())->with('aba', 'experiencia');
        }

        try {
            DB::beginTransaction();

            $experiencia = new CandidadoExperienciaProfissional();
            $experiencia->candidato_id = $request->candidato_id;
            $experiencia->nome_empresa = $request->nome_empresa;
            $experiencia->cidade = $request->cidade;
            $experiencia->estado_id = $request->estado_id;
            $experiencia->pais_id = $request->pais_id;
            $experiencia->funcao = $request->funcao;
            $experiencia->salario = $request->salario;
            $experiencia->data_inicio = $request->data_inicio;
            $experiencia->data_fim = $request->data_fim;
            $experiencia->observacao = $request->observacao;
            $experiencia->save();

            DB::commit();

            return back()->with(['success' => 'Experiencia Profissional cadastrada com sucesso!','aba' => 'experiencia']);

        } catch (\Exception $e){
            DB::rollBack();
            return back()->withErrors($e->getMessage())->withInput($request->input());
        }
    }

    public function editarExperiencia(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'experiencia_id' => 'required|exists:candidado_experiencia_profissionals,id',
            'candidato_id'   => 'required|exists:candidatos,id',
            'nome_empresa'   => 'required|string|max:255',
            'cidade'         => 'required|string|max:255',
            'estado_id'      => 'required|exists:estados,id',
            'pais_id'        => 'required|exists:paises,id',
            'funcao'         => 'required|string|max:255',
            'salario'        => 'nullable|string|max:255',
            'data_inicio'    => 'required|date_format:Y-m-d',
            'data_fim'       => 'required|date_format:Y-m-d',
            'observacao'     => 'nullable|max:300'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->input())->with('aba', 'experiencia');
        }

        try {
            DB::beginTransaction();

            /**
             * @var CandidadoExperienciaProfissional $experiencia
             */
            $experiencia = CandidadoExperienciaProfissional::whereId($request->experiencia_id)->first();

            $experiencia->candidato_id = $request->candidato_id;
            $experiencia->nome_empresa = $request->nome_empresa;
            $experiencia->cidade = $request->cidade;
            $experiencia->estado_id = $request->estado_id;
            $experiencia->pais_id = $request->pais_id;
            $experiencia->funcao = $request->funcao;
            $experiencia->salario = $request->salario;
            $experiencia->data_inicio = $request->data_inicio;
            $experiencia->data_fim = $request->data_fim;
            $experiencia->observacao = $request->observacao;
            $experiencia->save();

            DB::commit();

            return back()->with(['success' => 'Experiencia Profissional atualizada com sucesso!','aba' => 'experiencia']);

        } catch (\Exception $e){
            DB::rollBack();
            return back()->withErrors($e->getMessage())->withInput($request->input());
        }
    }

    public function deletarExperiencia(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'experiencia_id' => 'required|exists:candidado_experiencia_profissionals,id',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->input())->with('aba', 'experiencia');
        }

        try {
            DB::beginTransaction();

            /**
             * @var CandidadoExperienciaProfissional $experiencia
             */
            $experiencia = CandidadoExperienciaProfissional::whereId($request->experiencia_id)->first();

            $experiencia->delete();


            DB::commit();

            return back()->with(['success' => 'Experiencia excluida com sucesso!','aba' => 'experiencia']);

        } catch (\Exception $e){
            DB::rollBack();
            return back()->withErrors($e->getMessage())->withInput($request->input());
        }
    }
}
