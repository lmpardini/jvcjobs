<?php

namespace App\Http\Controllers;

use App\Models\Vagas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $vagasDestaque = Vagas::where('destaque', true)->get();

        $outrasVagas = Vagas::where('destaque', false)->get();

        /**
         * TODO Implementar Logica de componente para quando não houver vagas cadastradas
         */

        return view('home', ['vagasDestaque' => $vagasDestaque, 'outrasVagas' => $outrasVagas]);
    }
}
