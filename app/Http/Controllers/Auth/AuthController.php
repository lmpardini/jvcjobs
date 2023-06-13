<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function login()
    {
        /**
         * TODO Implementar verificação para ver se está logado antes de abrir home
         */
        return view('login');
    }

    public function attempt(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'cpf'      => 'required|numeric|cpf',
            'password' => 'required|min:8'
        ]);

        if ($validator->fails()) {
            return back()->withInput(['cpf' => $request->cpf])->withErrors($validator->errors());
        }


        $credenciais = [
            'cpf' => $request->cpf,
            'password' => $request->password
        ];

        if (Auth::attempt($credenciais)) {

            Session::regenerateToken();

            return redirect()->route('vagas.listar');
        }

        return back()->withInput(['cpf' => $request->cpf])->withErrors(['Dados não conferem']);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome'                  => 'required|string|min:3|max:45',
            'sobrenome'             => 'required|string|min:1|max:45',
            'email'                 => 'required|email|unique:users,email',
            'cpf'                   => 'required|numeric|cpf|unique:users,cpf',
            'password_confirmation' => ['required', 'string', Password::min(8)->letters()->numbers()->symbols()],
        ]);

        if ($validator->fails()) {
            return back()->withInput(['cpf' => $request->cpf])->withErrors($validator->errors());
        }

        $credenciais = [
            'cpf' => $request->cpf,
            'password' => $request->password
        ];

        if (Auth::attempt($credenciais)) {
            return back()->withInput(['cpf' => $request->cpf])->withErrors(["Usuário já possui cadastro"]);
        }

        $usuario = new User();
        $usuario->name = $request->nome;
        $usuario->last_name = $request->sobrenome;
        $usuario->cpf = $request->cpf;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password_confirmation);
        $usuario->save();

        return back()->withInput(['cpf' => $request->cpf])->with('success', 'Cadastro efetuado com sucesso');

    }

    public function logout(Request $request)
    {
        if (Auth::user()) {
            Auth::logout();
            Session::regenerateToken();

            return redirect()->route('home')->with('success', 'Deslogado...');
        }

        return back();
    }


}
