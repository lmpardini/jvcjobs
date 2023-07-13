@extends('layouts.main')

@section('content')
    <main>
        <div class="container pt-5 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-12">
                    <div class="pb-2">
                        <div>
                            <div class="text-center p-3"><h4>Confirme seu cadastro</h4></div>

                            <p>Para finalizar seu cadastro é necessario informar um código de segurança que foi encaminhado para seu email. Lembre-se que este tem a validade de 5 minutos. </p>
                            <p>Insira o código abaixo para validar seu cadastro:</p>
                            <form action=" {{ route('auth.valida-cadastro') }}" method="POST" class="needs-validation" novalidate autocomplete="off">
                                @csrf
                                <div class="mb-3">
                                    <div class="verification-code">
                                        <input type="text" name="um" id="um" class="form-control" onkeyup="moveToNextInput('um','dois')" maxlength="1" required>
                                        <input type="text" name="dois" id="dois" class="form-control" onkeyup="moveToNextInput('dois','tres')" maxlength="1" required>
                                        <input type="text" name="tres" id="tres" class="form-control" onkeyup="moveToNextInput('tres','quatro')" maxlength="1" required>
                                        <div class="form-control" style="border: none"> - </div>
                                        <input type="text" name="quatro" id="quatro" class="form-control" onkeyup="moveToNextInput('quatro','cinco')" maxlength="1" required>
                                        <input type="text" name="cinco" id="cinco" class="form-control" onkeyup="moveToNextInput('cinco','seis')" maxlength="1" required>
                                        <input type="text" name="seis" id="seis" class="form-control" maxlength="1" required>
                                    </div>
                                </div>
                                <div class="text-center mb-3">
                                    <button type="submit" class="btn btn-primary w-100">Validar Cadastro</button>
                                </div>
                            </form>

                            <form action=" {{ route('auth.reenviar-codigo-acesso') }}" method="GET" >
                                @csrf
                                <div class="text-center p-3">
                                    <button class="btn" type="submit">Reenviar Código</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
