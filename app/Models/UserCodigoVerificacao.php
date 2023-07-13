<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/** *
 * @property integer $id
 * @property integer $user_id
 * @property integer $codigo_verificacao
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $deleted_at
 */

class UserCodigoVerificacao extends Model
{
    use SoftDeletes;

    protected $table = 'user_codigo_verificacaos';

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function User()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
