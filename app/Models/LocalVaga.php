<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * LocalVaga Class
 *
 * @property integer $id
 * @property string $nome
 * @property string $slug
 * @property integer $local_vaga_transoft_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 */

class LocalVaga extends Model
{
    use SoftDeletes;

    protected $table = 'local_vagas';

    protected $hidden = [
      'created_at',
      'updated_at',
      'deleted_at',
    ];
}
