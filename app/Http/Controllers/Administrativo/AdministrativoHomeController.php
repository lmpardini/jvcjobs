<?php

namespace App\Http\Controllers\Administrativo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdministrativoHomeController extends Controller
{
    public function home()
    {
        return view('administrativo.administrativo-home');
   }
}
