<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * StatusVaga Class
 *
 * @property integer $id
 * @property string $nome
 * @property string $slug
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 */

class StatusVaga extends Model
{
    use SoftDeletes;

    protected $table = 'status_vagas';

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
