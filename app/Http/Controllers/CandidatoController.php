<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    public function meusDados()
    {

        return view('candidato.dados');

    }
}
