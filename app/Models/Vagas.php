<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * Class Vagas
 *
 * @property integer $id
 * @property string $nome
 * @property string $local
 * @property integer $numero_candidatos
 * @property string $descricao
 * @property string $requisitos
 * @property boolean $destaque
 * @property boolean $ativo
 * @property integer $status_vaga_id
 * @property StatusVaga $StatusVaga
 * @property integer $local_vaga_id
 * @property LocalVaga $LocalVaga
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 */

class Vagas extends Model
{
    use SoftDeletes;

    protected $table = 'vagas';

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function StatusVaga(): HasOne
    {
        return $this->hasOne(StatusVaga::class, 'id', 'status_vaga_id');
    }
    public function LocalVaga()
    {
        return $this->hasOne(LocalVaga::class, 'id', 'local_vaga_id');
    }
}
