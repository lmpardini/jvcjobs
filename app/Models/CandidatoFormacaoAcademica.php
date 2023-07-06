<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/** CandidatoFormacaoAcademica Class
 *
 * @property integer $id
 * @property integer $candidato_id
 * @property Candidato $Candidato
 * @property string $curso
 * @property string $nome_instituicao
 * @property integer $modalidade_id
 * @property FormacaoAcademicaModalidade $Modalidade
 * @property integer $status_id
 * @property FormacaoAcademicaStatus $Status
 * @property Carbon $data_inicio
 * @property Carbon $data_conclusao
 * @property string $observacao
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 */

class CandidatoFormacaoAcademica extends Model
{
    use SoftDeletes;

    protected $table = 'candidato_formacao_academicas';

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function Candidato()
    {
        return $this->hasOne(Candidato::class, 'id', 'candidato_id');
    }

    public function Status()
    {
        return $this->hasOne(FormacaoAcademicaStatus::class, 'id', 'status_id');
    }

    public function Modalidade()
    {
        return $this->hasOne(FormacaoAcademicaModalidade::class, 'id', 'modalidade_id');
    }
}
