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
use Illuminate\Http\RedirectResponse;

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
}
