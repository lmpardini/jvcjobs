<?php

namespace App\Services;

use App\Models\User;
use App\Models\Vagas;
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

    public static function emailBoasVindas(User $user)
    {

        Mail::send('mail.boas-vindas', ['data' => ['nome' => $user->name]], function($message) use ($user)
        {
            $message->to($user->email)->from(getenv('MAIL_FROM_ADDRESS'), getenv('MAIL_FROM_NAME'))->subject('Boas Vindas!');
        });
    }

    public static function emailInscricaoVaga(User $user, Vagas $vaga)
    {

        Mail::send('mail.inscricao-vaga', ['data' => ['nome' => $user->name, 'nome_vaga' => $vaga->nome, 'local_vaga' => $vaga->LocalVaga->nome]], function($message) use ($user)
        {
            $message->to($user->email)->from(getenv('MAIL_FROM_ADDRESS'), getenv('MAIL_FROM_NAME'))->subject('Confirmação de inscrição');
        });
    }
}
