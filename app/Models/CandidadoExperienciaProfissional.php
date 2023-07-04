<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * CandidatoExperienciaProfissionalClass
 *
 * @property integer $id
 * @property integer $candidato_id
 * @property Candidato $Candidato
 * @property string $nome_empresa
 * @property string $cidade
 * @property integer $estado_id
 * @property Estado $Estado
 * @property integer $pais_id
 * @property Paises $Pais
 * @property string $cargo
 * @property string $funcao
 * @property string $salario
 * @property string $observacao
 * @property Carbon $data_inicio
 * @property Carbon $data_fim
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 */

class CandidadoExperienciaProfissional extends Model
{
    use SoftDeletes;

    protected $table = 'candidado_experiencia_profissionals';

    protected $hidden = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    public function Estado()
    {
        return $this->hasOne(Estado::class, 'id', 'estado_id');
    }

    public function Pais()
    {
        return $this->hasOne(Paises::class, 'id', 'país_id');
    }

    public function Candidato()
    {
        return $this->hasOne(Candidato::class, 'id', 'candidato_id');
    }
}
