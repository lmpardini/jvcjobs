<?php

namespace App\Services;

use App\Models\Escolaridade;
use App\Models\Estado;
use App\Models\Etnia;
use App\Models\FormacaoAcademicaModalidade;
use App\Models\FormacaoAcademicaStatus;
use App\Models\Genero;
use App\Models\Local;
use App\Models\Paises;
use App\Models\User;
use App\Models\UserCodigoVerificacao;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class CandidatoService
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public static function carregaDadosSelectFormularios()
    {
        return collect([
            ['genero' => Genero::get()],
            ['estados' => Estado::get()],
            ['paises' => Paises::get()],
            ['etnias' => Etnia::get()],
            ['locais' => Local::get()],
            ['escolaridades' => Escolaridade::get()],
            ['modalidades' => FormacaoAcademicaModalidade::get()],
            ['statusFormacao' => FormacaoAcademicaStatus::get()],
        ]);
    }

    /**
     * @param string $slug
     * @return RedirectResponse
     */
    public static function buscaEstado(string $slug)
    {
        $estado = Estado::whereSlug($slug)->first();

        if (!$estado){
            return back()->withErrors(["Mensagem" => "Estado informado não é valido"]);
        }

        return $estado;
    }

    public static function buscaLocal(int $localId)
    {
        $local = Local::whereId($localId)->first();

        if (!$localId){
            return back()->withErrors(["Mensagem" => "Local informado não é valido"]);
        }

        return $local;
    }

    /**
     * @param User $user
     * @return void
     */
    public static function gerarCodigoVerificacao(User $user): void
    {
        $codigoVerificacao = '';
        for ($i = 0; $i < 6; $i++) {
            $codigoVerificacao .= mt_rand(0, 9);
        }

        $codigo = new UserCodigoVerificacao();
        $codigo->user_id = $user->id;
        $codigo->codigo_verificacao = $codigoVerificacao;
        $codigo->save();

        MailService::emailCodigoConfirmacao($codigoVerificacao, auth()->user());
    }
}
