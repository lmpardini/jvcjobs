<?php

namespace App\Services;

use App\Models\Estado;
use App\Models\Etnia;
use App\Models\Genero;
use App\Models\Local;
use App\Models\Paises;

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
        ]);
    }

    /**
     * @param int $estado_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function buscaEstado(int $estado_id)
    {
        $estado = Estado::whereId($estado_id)->first();

        if (!$estado_id){
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
