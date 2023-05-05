<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(\App\Http\Controllers\HomeController::class)
    ->group(function () {
        Route::get('/', 'home');
    });

Route::get('home', function () {
    return view('home');
});

Route::get('logado', function () {
    return view('home2');
});

Route::get('vagas', function () {
    return view('vagas');
});

Route::get('vaga-detalhe', function () {
    return view('vaga-detalhe');
});

Route::get('contato', function () {
    return view('contato');
});



