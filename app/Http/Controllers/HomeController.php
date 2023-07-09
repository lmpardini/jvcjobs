<?php

namespace App\Http\Controllers;

use App\Models\Vagas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $vagasDestaque = Vagas::where('destaque', true)->whereHas('StatusVaga', function ($query) {
            $query->where('slug', 'em_processo');
        })->with('LocalVaga')->limit(6)->orderByDesc('created_at')->get();

        $outrasVagas = Vagas::where('destaque', false)->whereHas('StatusVaga', function ($query) {
            $query->where('slug', 'em_processo');
        })->with('LocalVaga')->limit(9)->orderByDesc('created_at')->get();

        /**
         * TODO Implementar Logica de componente para quando não houver vagas cadastradas
         */

        return view('home', ['vagasDestaque' => $vagasDestaque, 'outrasVagas' => $outrasVagas]);
    }
}
