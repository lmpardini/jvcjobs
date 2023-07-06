@extends('layouts.main')

@section('content')
<main>
    <div class="container pt-5 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-12">
                <div class="pb-2">
                    <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ !session()->has('register') ? 'active' : '' }}" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="false">Iniciar sessão</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ session()->has('register') ? 'active' : '' }}" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">Criar uma conta</button>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="pills-tabContent" style="min-height: 400px;">
                    <div class="tab-pane fade {{ !session()->has('register') ? ' show active' : '' }}" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="text-center p-3"><h4>Login</h4></div>
                        <form action="{{ route('auth.do') }}" method="post" class="needs-validation" novalidate autocomplete="off">
                            @csrf
                            <div class="mb-3">
                                <label for="cpf" class="form-label">CPF</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" required value="{{ session()->getOldInput('cpf') }}">
                                <div class="invalid-feedback">Informe o seu CPF</div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <div class="invalid-feedback">Informe a sua senha</div>
                            </div>
                            <div class="text-center mb-3">
                                <button type="submit" class="btn btn-primary w-100">Entrar</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade {{ session()->has('register') ? ' show active' : '' }}" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="text-center p-3"><h4>Cadastro</h4></div>
                        <form action=" {{ route('auth.register') }}" method="POST" class="needs-validation" novalidate autocomplete="off">
                            @csrf
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" required value="{{ session()->getOldInput('nome') }}">
                                <div class="invalid-feedback">Informe o seu nome</div>
                            </div>
                            <div class="mb-3">
                                <label for="sobrenome" class="form-label">Sobrenome</label>
                                <input type="text" class="form-control" id="sobrenome" name="sobrenome" required value="{{ session()->getOldInput('sobrenome') }}">
                                <div class="invalid-feedback">Informe o seu sobrenome</div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="text" class="form-control" id="email" name="email" required value="{{ session()->getOldInput('email') }}">
                                <div class="invalid-feedback">Informe o seu e-mail</div>
                            </div>
                            <div class="mb-3">
                                <label for="cpf" class="form-label">CPF</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" required value="{{ session()->getOldInput('cpf') }}">
                                <div class="invalid-feedback">Informe o seu CPF</div>
                            </div>
                            <div class="mb-3">
                                <label for="cpf" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <div class="invalid-feedback">Informe sua Senha</div>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirme sua Senha</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                <div class="invalid-feedback">Repita sua Senha</div>
                            </div>

                            <div class="text-center mb-3">
                                <button type="submit" class="btn btn-primary w-100">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
