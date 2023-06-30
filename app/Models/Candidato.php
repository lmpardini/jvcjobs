<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Candidato Class
 *
 * @property integer $id
 * @property integer $user_id
 * @property boolean $ativo
 * @property boolean $primeiro_acesso
 * @property Vagas[] $Vagas
 * @property CandidaturaVaga[] $CandidaturaVaga
 *
 *
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
}
