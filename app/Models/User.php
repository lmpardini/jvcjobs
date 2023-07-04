<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\Controllers\VagasController;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * User Class
 *
 * @property integer $id
 * @property string $name
 * @property string $last_name
 * @property integer $cpf
 * @property string $email
 * @property Carbon $email_verified_at
 * @property string $password
 * @property boolean $ativo
 * @property boolean $primeiro_acesso
 * @property Candidato $Candidato
 * @property string $remember_token
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Candidato()
    {
        return $this->hasOne(Candidato::class, 'user_id', 'id');
    }
}
