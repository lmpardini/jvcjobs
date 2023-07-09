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
        Route::get('/', 'home')->name('home');
    });

Route::controller(\App\Http\Controllers\VagasController::class)
    ->prefix('vagas')
    ->as('vagas.')
    ->group(function () {
        Route::get('/', 'vagas')->name('listar');
        Route::get('/{id}', 'vagasDetalhes')->name('detalhe');
    });

Route::controller(\App\Http\Controllers\Auth\AuthController::class)
    ->prefix('login')
    ->as('auth.')
    ->group(function () {
        Route::get('/', 'login')->name('login');
        Route::post('/do', 'attempt')->name('do');
        Route::post('/register', 'register')->name('register');
        Route::get('/logout', 'logout')->name('logout');
    });

Route::controller(\App\Http\Controllers\CandidatoController::class)
    ->middleware('auth:sanctum')
    ->prefix('candidato')
    ->as('candidato.')
    ->group(function () {
        Route::get('/dados','meusDados')->name('dados');
        Route::get('/vagas','minhasVagas')->name('minhas-vagas');
        Route::post('/inscrever-vaga','candidatarVaga')->name('inscrever-vaga');
        Route::put('/dados','editarDados')->name('dados-update');
    });

Route::controller(\App\Http\Controllers\CandidadoExperienciaProfissionalController::class)
    ->middleware('auth:sanctum')
    ->prefix('candidato-experiencia')
    ->as('candidato-experiencia.')
    ->group(function () {
        Route::post('/','novaExperiencia')->name('create');
        Route::put('/','editarExperiencia')->name('update');
        Route::delete('/excluir/','deletarExperiencia')->name('delete');
    });

Route::controller(\App\Http\Controllers\CandidatoFormacaoAcademicaController::class)
    ->middleware('auth:sanctum')
    ->prefix('candidato-formacao')
    ->as('candidato-formacao.')
    ->group(function () {
        Route::post('/','novaFormacao')->name('create');
        Route::put('/','editarFormacao')->name('update');
        Route::delete('/excluir/','deletarFormacao')->name('delete');
    });

Route::controller(\App\Http\Controllers\CandidatoFormacaoAcademicaController::class)
    ->prefix('candidato-formacao')
    ->as('candidato-formacao.')
    ->group(function () {
        Route::post('/','novaFormacao')->name('create');
        Route::put('/','editarFormacao')->name('update');
        Route::delete('/excluir/','deletarFormacao')->name('delete');
    });

/**
 * Rotas Administrativas
 */

Route::middleware(['auth:sanctum', 'admin'])
    ->prefix('/administrativo')
    ->as('administrativo.')
    ->group(function (){
        Route::controller(\App\Http\Controllers\Administrativo\AdministrativoHomeController::class)
            ->group(function () {
                Route::get('/', 'home')->name('home');
            });
    });


