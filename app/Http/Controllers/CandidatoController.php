<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\CandidaturaVaga;
use App\Models\Escolaridade;
use App\Models\Estado;
use App\Models\Etnia;
use App\Models\Genero;
use App\Models\Local;
use App\Models\Paises;
use App\Models\StatusCandidatura;
use App\Models\Vagas;
use App\Services\CandidatoService;
use App\Services\MailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CandidatoController extends Controller
{
    public function meusDados()
    {
        $dadosSelectForm = CandidatoService::carregaDadosSelectFormularios();

        return view('candidato.dados',[
            'genero'                     => $dadosSelectForm[0]['genero'],
            'estados'                    => $dadosSelectForm[1]['estados'],
            'paises'                     => $dadosSelectForm[2]['paises'],
            'etnias'                     => $dadosSelectForm[3]['etnias'],
            'locais'                     => $dadosSelectForm[4]['locais'],
            'escolaridades'              => $dadosSelectForm[5]['escolaridades'],
            'modalidades'                => $dadosSelectForm[6]['modalidades'],
            'statusFormacao'             => $dadosSelectForm[7]['statusFormacao'],
            'experienciasProfissionais'  => auth()->user()->Candidato->CandidatoExperienciaProfissional->sortByDesc('data_inicio'),
            'formacaoAcademicas'         => auth()->user()->Candidato->CandidatoFormacaoAcademica->sortByDesc('data_inicio'),
        ])->with('aba', 'dados');
    }

    public function editarDados(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name"                                  => "required|string",
            "last_name"                             => "required|string",
            "email"                                 => "required|email",
            "nome_social"                           => "nullable|string",
            "data_nascimento"                       => "required|date_format:Y-m-d",
            "genero_slug"                           => "required|string|exists:generos,slug",
            "etnia_slug"                            => "required|string|exists:etnias,slug",
            "escolaridade_slug"                     => "required|string|exists:escolaridades,slug",
            "rg"                                    => "required|string",
            "rg_orgao_emissor"                      => "required|string",
            "cep"                                   => "required|formato_cep",
            "endereco"                              => "required|string",
            "numero"                                => "required|string",
            "complemento"                           => "nullable|string",
            "bairro"                                => "required|string",
            "cidade"                                => "required|string",
            "estado_abreviacao"                     => "required|string|exists:estados,abreviacao",
            "pais_slug"                             => "required|string|exists:paises,slug",
            "telefone"                              => "nullable|telefone_com_ddd",
            "celular"                               => "required|celular_com_ddd",
            "nome_pai"                              => "nullable|string",
            "nome_mae"                              => "nullable|string",
            "qtde_dependentes"                      => "nullable|numeric",
            "pis"                                   => "nullable|numeric",
            "pis_orgao_emissor"                     => "nullable|string",
            "pis_data_emissao"                      => "nullable|date_format:Y-m-d",
            "pis_complemento"                       => "nullable|string",
            "pis_estado_slug"                       => "nullable|string|exists:estados,slug",
            "ctps"                                  => "nullable|string",
            "ctps_numero_serie"                     => "nullable|string",
            "ctps_estado_slug"                        => "nullable|string|exists:estados,slug",
            "ctps_data_emissao"                     => "nullable|date_format:Y-m-d",
            "cnh"                                   => "nullable|numeric",
            "cnh_data_emissao"                      => "nullable|date_format:Y-m-d",
            "cnh_estado_slug"                         => "nullable|string|exists:estados,slug",
            "cnh_orgao_emissor"                     => "nullable|string",
            "cnh_validade"                          => "nullable|date_format:Y-m-d",
            "cnh_categoria"                         => "nullable|string",
            "cnh_complemento"                       => "nullable|string",
            "tit_eleitor"                           => "nullable|numeric",
            "tit_eleitor_zona"                      => "nullable|numeric",
            "tit_eleitor_sessao"                    => "nullable|numeric",
            "tit_eleitor_estado_slug"                 => "nullable|string|exists:estados,slug",
            "reservista"                            => "nullable|string",
            "curso_transporte_coletivo"             => "nullable|boolean",
            "validade_curso_transporte_coletivo"    => "nullable|required_if:curso_transporte_coletivo,true|date_format:Y-m-d",
            "curso_transporte_escolar"              => "nullable|boolean",
            "validade_curso_transporte_escolar"     => "nullable|required_if:curso_transporte_escolar,true|date_format:Y-m-d",
            "trabalhou_empresa"                     => "nullable|boolean",
            "trabalhou_empresa_data_entrada"        => "nullable|required_if:trabalhou_empresa,true|date_format:Y-m-d",
            "trabalhou_empresa_data_saida"          => "nullable|required_if:trabalhou_empresa,true|date_format:Y-m-d",
            "trabalhou_empresa_setor"               => "nullable|required_if:trabalhou_empresa,true|string",
            "trabalhou_empresa_local_id"            => "nullable|required_if:trabalhou_empresa,true|numeric",
            "parente_funcionario"                   => "nullable|boolean",
            "nome_parente"                          => "nullable|required_if:parente_funcionario,true|string",
            "setor_parente"                         => "nullable|required_if:parente_funcionario,true|string",
            "parente_funcionario_local_id"          => "nullable|required_if:parente_funcionario,true|numeric",
            "indicacao_colaborador"                 => "nullable|boolean",
            "nome_colaborador"                      => "nullable|required_if:indicacao_colaborador,true|string",
            "setor_colaborador"                     => "nullable|required_if:indicacao_colaborador,true|string",
            "indicacao_colaborador_local_id"        => "nullable|required_if:indicacao_colaborador,true|numeric",
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->input());
        }

        try {
            DB::beginTransaction();

            /**
             * @var Genero $genero
             */
            $genero = Genero::whereSlug($request->genero_slug)->first();

            if (!$genero){
                return back()->withErrors(["Mensagem" => "Genero informado não é valido"])->withInput($request->input());
            }

            /**
             * @var Etnia $etnia
             */
            $etnia = Etnia::whereSlug($request->etnia_slug)->first();

            if (!$etnia){
                return back()->withErrors(["Mensagem" => "Etnia informada não é valida"])->withInput($request->input());
            }

            /**
             * @var Escolaridade $escolaridade
             */
            $escolaridade = Escolaridade::whereSlug($request->escolaridade_slug)->first();

            if (!$escolaridade){
                return back()->withErrors(["Mensagem" => "Escolaridade informada não é valida"])->withInput($request->input());
            }

            /**
             * @var Paises $pais
             */
            $pais = Paises::whereSlug($request->pais_slug)->first();

            if (!$pais){
                return back()->withErrors(["Mensagem" => "Pais informado não é valido"])->withInput($request->input());
            }

            /**
             * @var Estado $estado
             * @var Estado $estadoCTPS
             * @var Estado $estadoCNH
             * @var Estado $estadoTituloEleitor
             */
            $estado = Estado::where('abreviacao', $request->estado_abreviacao)->first();

            if (isset($request->ctps_estado_slug) && $request->ctps_estado_slug !== null) {
                $estadoCTPS = CandidatoService::buscaEstado($request->ctps_estado_slug);
            }

            if (isset($request->cnh_estado_slug) && $request->cnh_estado_slug !== null) {
                $estadoCNH = CandidatoService::buscaEstado($request->cnh_estado_slug);
            }

            if (isset($request->tit_eleitor_estado_slug) && $request->tit_eleitor_estado_slug !== null) {
                $estadoTituloEleitor = CandidatoService::buscaEstado($request->tit_eleitor_estado_slug);
            }

            /**
             * @var Local $localTrabalhouEmpresa
             * @var Local $localParenteFuncionario
             * @var Local $localIndicacaoFuncionario
             */
            if (isset($request->trabalhou_empresa_local_id) && $request->trabalhou_empresa_local_id !== null) {
                $localTrabalhouEmpresa = CandidatoService::buscaLocal($request->trabalhou_empresa_local_id);
            }

            if (isset($request->parente_funcionario_local_id) && $request->parente_funcionario_local_id !== null) {
                $localParenteFuncionario = CandidatoService::buscaLocal($request->parente_funcionario_local_id);
            }

            if (isset($request->indicacao_colaborador_local_id) && $request->indicacao_colaborador_local_id !== null) {
                $localIndicacaoFuncionario = CandidatoService::buscaLocal($request->indicacao_colaborador_local_id);
            }

            /**
             * @var Candidato $candidato
             */
            $candidato = auth()->user()->Candidato;

            $candidato->nome_social = $request->nome_social;
            $candidato->data_nascimento = $request->data_nascimento;
            $candidato->rg = $request->rg;
            $candidato->rg_orgao_emissor = $request->rg_orgao_emissor;
            $candidato->cep = Str::remove('-', $request->cep);
            $candidato->endereco = $request->endereco;
            $candidato->numero = $request->numero;
            $candidato->complemento = $request->complemento;
            $candidato->bairro = $request->bairro;
            $candidato->cidade = $request->cidade;
            $candidato->telefone = Str::remove(['-', '(', ')', ' '], $request->telefone);
            $candidato->celular = Str::remove(['-', '(', ')', ' '], $request->celular);
            $candidato->nome_pai = $request->nome_pai;
            $candidato->nome_mae = $request->nome_mae;
            $candidato->qtde_dependentes = $request->qtde_dependentes;
            $candidato->pis = $request->pis;
            $candidato->pis_orgao_emissor = $request->pis_orgao_emissor;
            $candidato->pis_data_emissao = $request->pis_data_emissao;
            $candidato->pis_complemento = $request->pis_complemento;
            $candidato->ctps = $request->ctps;
            $candidato->ctps_numero_serie = $request->ctps_numero_serie;
            $candidato->ctps_data_emissao = $request->ctps_data_emissao;
            $candidato->cnh = $request->cnh;
            $candidato->cnh_data_emissao = $request->cnh_data_emissao;
            $candidato->cnh_orgao_emissor = $request->cnh_orgao_emissor;
            $candidato->cnh_validade = $request->cnh_validade;
            $candidato->cnh_categoria = $request->cnh_categoria;
            $candidato->cnh_complemento = $request->cnh_complemento;
            $candidato->tit_eleitor = $request->tit_eleitor;
            $candidato->tit_eleitor_zona = $request->tit_eleitor_zona;
            $candidato->tit_eleitor_sessao = $request->tit_eleitor_sessao;
            $candidato->reservista = $request->reservista;
            $candidato->curso_transporte_coletivo = $request->curso_transporte_coletivo ?? false;
            $candidato->validade_curso_transporte_coletivo = $request->validade_curso_transporte_coletivo;
            $candidato->curso_transporte_escolar = $request->curso_transporte_escolar ?? false;
            $candidato->validade_curso_transporte_escolar = $request->validade_curso_transporte_escolar;
            $candidato->trabalhou_empresa = $request->trabalhou_empresa ?? false;
            $candidato->trabalhou_empresa_data_entrada = $request->trabalhou_empresa_data_entrada;
            $candidato->trabalhou_empresa_data_saida = $request->trabalhou_empresa_data_saida;
            $candidato->trabalhou_empresa_setor = $request->trabalhou_empresa_setor;
            $candidato->trabalhou_empresa_local_id = isset($localTrabalhouEmpresa) ? $localTrabalhouEmpresa->id : null;
            $candidato->parente_funcionario = $request->parente_funcionario ?? false;
            $candidato->nome_parente = $request->nome_parente;
            $candidato->setor_parente = $request->setor_parente;
            $candidato->parente_funcionario_local_id  = isset($localParenteFuncionario) ? $localParenteFuncionario->id : null;
            $candidato->indicacao_colaborador = $request->indicacao_colaborador ?? false;
            $candidato->nome_colaborador = $request->nome_colaborador;
            $candidato->setor_colaborador = $request->setor_colaborador;
            $candidato->indicacao_colaborador_local_id = isset($localIndicacaoFuncionario) ? $localIndicacaoFuncionario->id : null;
            $candidato->genero_id = $genero->id;
            $candidato->etnia_id = $etnia->id;
            $candidato->escolaridade_id = $escolaridade->id;
            $candidato->estado_id = $estado->id;
            $candidato->pais_id = $pais->id;
            $candidato->ctps_estado_id = isset($estadoCTPS) ? $estadoCTPS->id : null;
            $candidato->cnh_estado_id = isset($estadoCNH) ? $estadoCNH->id : null;
            $candidato->tit_eleitor_estado_id = isset($estadoTituloEleitor) ? $estadoTituloEleitor->id : null;
            $candidato->save();

            $user = auth()->user();

            $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->primeiro_acesso = false;
            $user->save();

            DB::commit();

            return back()->with('success', 'Cadastro atualizado com sucesso!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors($e->getMessage())->withInput($request->input());
        }
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

        MailService::emailInscricaoVaga(auth()->user(), $vaga);

        return redirect()->route('candidato.minhas-vagas')->with('success', 'Inscrição realizada com sucesso!');
    }
}
