<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * CandidaturaVaga Class
 *
 * @property integer $id
 * @property integer $candidato_id
 * @property integer $vaga_id
 * @property integer $status_candidatura_id
 * @property Vagas $Vaga
 * @property StatusCandidatura $StatusCandidatura
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 */

class CandidaturaVaga extends Model
{
    use SoftDeletes;

    protected $table = 'candidatura_vagas';

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function StatusCandidatura()
    {
        return $this->hasOne(StatusCandidatura::class, 'id', 'status_candidatura_id');
    }

    public function Vaga()
    {
        return $this->hasOne(Vagas::class, 'id', 'vaga_id');
    }

}
