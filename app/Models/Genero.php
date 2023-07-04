<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Genero Class
 *
 * @property integer $id
 * @property string $nome
 * @property string $slug
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 */

class Genero extends Model
{
    use SoftDeletes;

    protected $table = 'generos';

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
