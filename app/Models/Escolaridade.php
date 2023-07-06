<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Escolaridade Class
 *
 * @property integer $id
 * @property string $nome
 * @property string $slug
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 */

class Escolaridade extends Model
{
    use SoftDeletes;

    protected $table = 'escolaridades';

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
