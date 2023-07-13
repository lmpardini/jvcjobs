<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PrimeiroAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (auth()->check() && !auth()->user()->cadastro_verificado && $request->route()->getName() !== "auth.verifica-cadastro" && $request->route()->getName() !== "auth.logout"
            && $request->route()->getName() !== "auth.valida-cadastro" && $request->route()->getName() !== "auth.reenviar-codigo-acesso"){

            return redirect()->route('auth.verifica-cadastro')
                ->withErrors(["Primeiro acesso" => "Você deve validar seu cadastro para continuar"]);
        }

        if (auth()->check() && auth()->user()->cadastro_verificado) {
            if (auth()->check() && auth()->user()->primeiro_acesso && $request->route()->getName() !== "candidato.dados" && $request->route()->getName() !== "auth.logout"
                && $request->route()->getName() !== "candidato.dados-update"){

                return redirect()->route('candidato.dados')
                    ->withErrors(["Primeiro acesso" => "Você deve finalizar seu cadastro para continuar"]);
            }
        }

        return $next($request);
    }
}
