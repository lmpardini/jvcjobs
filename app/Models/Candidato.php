<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Candidato Class
 * @property integer $id
 * @property integer $user_id
 * @property boolean $ativo
 * @property boolean $primeiro_acesso
 * @property Vagas[] $Vagas
 * @property CandidaturaVaga[] $CandidaturaVaga
 * @property string $nome_social
 * @property string $rg
 * @property string $rg_orgao_emissor
 * @property integer $genero_id
 * @property Genero $Genero
 * @property Carbon $data_nascimento
 * @property integer $cep
 * @property string $endereco
 * @property string $numero
 * @property string $complemento
 * @property string $bairro
 * @property string $cidade
 * @property integer $estado_id
 * @property Estado $Estado
 * @property integer $pais_id
 * @property Paises $Pais
 * @property string $telefone
 * @property string $celular
 * @property string $nome_pai
 * @property string $nome_mae
 * @property integer $qtde_dependentes
 * @property integer $pis
 * @property string $pis_orgao_emissor
 * @property integer $pis_estado_id
 * @property Estado $EstadoPis
 * @property Carbon $pis_data_emissao
 * @property string $pis_complemento
 * @property string $ctps
 * @property string $ctps_numero_serie
 * @property integer $ctps_estado_id
 * @property Estado EstadoCTPS
 * @property string $ctps_data_emissao
 * @property integer $cnh
 * @property Carbon $cnh_data_emissao
 * @property integer $cnh_estado_id
 * @property Estado EstadoCNH
 * @property string $cnh_orgao_emissor
 * @property Carbon $cnh_validade
 * @property integer $cnh_categoria
 * @property string $cnh_complemento
 * @property integer $tit_eleitor
 * @property integer $tit_eleitor_estado_id
 * @property Estado EstadoTituloEleitor
 * @property integer $tit_eleitor_zona
 * @property integer $tit_eleitor_sessao
 * @property string $reservista
 * @property integer $etnia_id
 * @property Etnia $Etnia
 * @property string $observacao
 * @property boolean $curso_transporte_coletivo
 * @property Carbon $validade_curso_transporte_coletivo
 * @property boolean $curso_transporte_escolar
 * @property Carbon $validade_curso_transporte_escolar
 * @property boolean $trabalhou_empresa
 * @property Carbon $trabalhou_empresa_data_entrada
 * @property Carbon $trabalhou_empresa_data_saida
 * @property string $trabalhou_empresa_setor
 * @property integer $trabalhou_empresa_local_id
 * @property Local $LocalTrabalhou
 * @property boolean $parente_funcionario
 * @property string $nome_parente
 * @property string $setor_parente
 * @property integer $parente_funcionario_local_id
 * @property Local $LocalTrabalhoParente
 * @property boolean $indicacao_colaborador
 * @property string $nome_colaborador
 * @property string $setor_colaborador
 * @property integer $indicacao_colaborador_local_id
 * @property Local $LocalTrabalhoIndicacao
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 */

class Candidato extends Model
{
    use SoftDeletes;

    public function Vagas()
    {
        return $this->belongsToMany(Vagas::class, 'candidatura_vagas', 'candidato_id', 'vaga_id');
    }

    public function CandidaturaVaga()
    {
        return $this->hasMany(CandidaturaVaga::class, 'candidato_id', 'id');
    }

    public function Estado()
    {
        return $this->hasOne(Estado::class, 'id', 'estado_id');
    }

    public function EstadoPis()
    {
        return $this->hasOne(Estado::class, 'id', 'pis_estado_id');
    }

    public function EstadoCTPS()
    {
        return $this->hasOne(Estado::class, 'id', 'ctps_estado_id');
    }

    public function EstadoCNH()
    {
        return $this->hasOne(Estado::class, 'id', 'cnh_estado_id');
    }

    public function EstadoTituloEleitor()
    {
        return $this->hasOne(Estado::class, 'id', 'tit_eleitor_estado_id');
    }

    public function Etnia()
    {
        return $this->hasOne(Etnia::class, 'id', 'etnia_id');
    }

    public function Genero()
    {
        return $this->hasOne(Genero::class, 'id', 'genero_id');
    }

    public function Pais()
    {
        return $this->hasOne(Paises::class, 'id', 'pais_id');
    }

    public function LocalTrabalhou()
    {
        return $this->hasOne(Local::class, 'id', 'trabalhou_empresa_local_id');
    }

    public function LocalTrabalhoParente()
    {
        return $this->hasOne(Local::class, 'id', 'parente_funcionario_local_id');
    }

    public function LocalTrabalhoIndicacao()
    {
        return $this->hasOne(Local::class, 'id', 'indicacao_colaborador_local_id');
    }
}
