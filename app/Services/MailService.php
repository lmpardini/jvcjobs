<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public static function emailCodigoConfirmacao($codigoVerificacao, User $user)
    {

        Mail::send('mail.verificacao-cadastro', ['data' => ['codigo_verificacao' => $codigoVerificacao, 'nome' => $user->name]], function($message) use ($user)
        {
            $message->to($user->email)->from(getenv('MAIL_FROM_ADDRESS'), getenv('MAIL_FROM_NAME'))->subject('Confirmação de Cadastro');
        });
    }
}
