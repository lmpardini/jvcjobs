@extends('layouts.main')

@section('content')
    <main>
        <div class="container mt-3">

            <div class="col-12 mt-3 mb-2">
                <h2 class="title primary-color">MEUS DADOS</h2>
            </div>

            <div class="pb-2">
                <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ session()->has('aba') && session()->get('aba') === 'experiencia' ? '' : 'active' }}" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="false">Dados Pessoais
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link  {{ session()->has('aba') && session()->get('aba') === 'experiencia' ? 'active' : '' }}@if(auth()->user()->primeiro_acesso) disabled @endif" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="true">Experiências Profissionais
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link  @if(auth()->user()->primeiro_acesso) disabled @endif" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile-academy" type="button" role="tab"
                                aria-controls="pills-profile-academy" aria-selected="true">Formação Academica
                        </button>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade {{ session()->has('aba') && session()->get('aba') === 'experiencia' ? '' : 'show active' }}" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <form method="POST" class="needs-validation" novalidate autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="name" name="name" required
                                           value="@if(old('name')){{ old('name') }}@else{{ auth()->user()->name }}@endif">
                                    <div class="invalid-feedback">Informe o seu nome</div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Sobrenome</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" required
                                           value="@if(old('last_name')){{ old('last_name') }}@else{{ auth()->user()->last_name }}@endif">
                                    <div class="invalid-feedback">Informe o seu sobrenome</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="cpf" class="form-label">CPF</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf" required
                                           value="@if(old('cpf')){{ old('cpf') }}@else{{ auth()->user()->cpf }} @endif" disabled>
                                    <div class="invalid-feedback">Informe o seu CPF</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input type="email" class="form-control" id="email" name="email" required
                                           value="@if(old('email')){{ old('email') }}@else{{  auth()->user()->email }} @endif">
                                    <div class="invalid-feedback">Informe o seu e-mail</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nome_social" class="form-label">Nome Social</label>
                                    <input type="text" class="form-control" id="nome_social" name="nome_social"
                                           value="@if(old('nome_social')){{ old('nome_social') }}@else{{ auth()->user()->Candidato->nome_social }}@endif">
                                    <div class="invalid-feedback">Informe o nome social</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento"
                                           required value="@if(old('data_nascimento')){{ old('data_nascimento') }}@else{{auth()->user()->Candidato->data_nascimento}}@endif">
                                    <div class="invalid-feedback">Informe a data de nascimento</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="genero_id" class="form-label">Genero</label>
                                    <select name="genero_id" id="genero_id" class="form-select" required>
                                        <option selected disabled>Selecione o genero</option>
                                        @foreach($genero as $value)
                                            <option value="{{ $value->id }}"
                                                    @if(auth()->user()->Candidato->Genero && auth()->user()->Candidato->Genero->slug === $value->slug) selected @endif>{{ $value->nome }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Informe o genero</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="etnia_id" class="form-label">Etnia</label>
                                    <select name="etnia_id" id="etnia_id" class="form-select"
                                            aria-label="Selecione a etnia">
                                        <option selected disabled>Selecione a Etnia</option>
                                        @foreach($etnias as $value)
                                            <option value="{{ $value->id }}"
                                                    @if(auth()->user()->Candidato->Etnia && auth()->user()->Candidato->Etnia->slug === $value->slug) selected @endif>{{ $value->nome }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Selecione o estado</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="rg" class="form-label">RG</label>
                                    <input type="text" class="form-control" id="rg" name="rg" required
                                           value="@if(old('rg')){{ old('rg') }}@else{{ auth()->user()->Candidato->rg }}@endif">
                                    <div class="invalid-feedback">Informe o RG</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="rg_orgao_emissor" class="form-label">Orgao Emissor</label>
                                    <input type="text" class="form-control" id="rg_orgao_emissor"
                                           name="rg_orgao_emissor" required
                                           value="@if(old('rg_orgao_emissor')){{ old('rg_orgao_emissor') }}@else{{ auth()->user()->Candidato->rg_orgao_emissor }}@endif">
                                    <div class="invalid-feedback">Informe o RG</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="cep" class="form-label">CEP</label>
                                    <input type="number" class="form-control" id="cep" name="cep" required
                                           value="@if(old('cep')){{ old('cep') }}@else{{ auth()->user()->Candidato->cep }}@endif">
                                    <div class="invalid-feedback">Informe o CEP</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <button class="btn btn-primary" style="margin-top: 30px;"
                                            onclick="@CandidatoController"> Buscar CEP
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-10">
                                <div class="mb-3">
                                    <label for="endereco" class="form-label">Endereço</label>
                                    <input type="text" class="form-control" id="endereco" name="endereco" required
                                           value="@if(old('endereco')){{ old('endereco') }}@else{{ auth()->user()->Candidato->endereco }}@endif">
                                    <div class="invalid-feedback">Informe o endereço</div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Número</label>
                                    <input type="text" class="form-control" id="numero" name="numero" required
                                           value="@if(old('numero')){{ old('numero') }}@else{{ auth()->user()->Candidato->numero }}@endif">
                                    <div class="invalid-feedback">Informe o número</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="complemento" class="form-label">Complemento</label>
                                    <input type="text" class="form-control" id="complemento" name="complemento"
                                           value="@if(old('complemento')){{ old('complemento') }}@else{{ auth()->user()->Candidato->complemento }}@endif">
                                </div>

                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="bairro" class="form-label">Bairro</label>
                                    <input type="text" class="form-control" id="bairro" name="bairro" required
                                           value="@if(old('bairro')){{ old('bairro') }}@else{{ auth()->user()->Candidato->bairro }}@endif">
                                    <div class="invalid-feedback">Informe o bairro</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="cidade" class="form-label">Cidade</label>
                                    <input type="text" class="form-control" id="cidade" name="cidade" required
                                           value="@if(old('cidade')){{ old('cidade') }}@else{{ auth()->user()->Candidato->cidade }}@endif">
                                    <div class="invalid-feedback">Informe a cidade</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="estado_id" class="form-label">Estado</label>
                                    <select name="estado_id" id="estado_id" class="form-select" required>
                                        <option selected disabled>Selecione o estado</option>
                                        @foreach($estados as $value)
                                            <option value="{{ $value->id }}"
                                                    @if(auth()->user()->Candidato->Estado && auth()->user()->Candidato->Estado->slug === $value->slug) selected @endif>{{ $value->nome }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Selecione o estado</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="pais_id" class="form-label">País</label>
                                    <select name="pais_id" id="pais_id" class="form-select" required>
                                        <option selected disabled>Selecione o país</option>
                                        @foreach($paises as $value)
                                            <option value="{{ $value->id }}"
                                                    @if(auth()->user()->Candidato->Pais && auth()->user()->Candidato->Pais->slug === $value->slug) selected @endif>{{ $value->nome }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Selecione o país</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="telefone" class="form-label">Telefone</label>
                                    <input type="text" class="form-control" id="telefone" name="telefone" required
                                           value="@if(old('telefone')){{ old('telefone') }}@else{{ auth()->user()->Candidato->telefone }}@endif">
                                    <div class="invalid-feedback">Informe o telefone</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="celular" class="form-label">Celular</label>
                                    <input type="text" class="form-control" id="celular" name="celular" required
                                           value="@if(old('celular')){{ old('celular') }}@else{{ auth()->user()->Candidato->celular }}@endif">
                                    <div class="invalid-feedback">Informe o celular</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nome_pai" class="form-label">Nome do Pai</label>
                                    <input type="text" class="form-control" id="nome_pai" name="nome_pai"
                                           value="@if(old('nome_pai')){{ old('nome_pai') }}@else{{ auth()->user()->Candidato->nome_pai }}@endif">
                                    <div class="invalid-feedback">Informe o nome do pai</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nome_mae" class="form-label">Nome da Mãe</label>
                                    <input type="text" class="form-control" id="nome_mae" name="nome_mae"
                                           value="@if(old('nome_mae')){{ old('nome_mae') }}@else{{ auth()->user()->Candidato->nome_mae }}@endif">
                                    <div class="invalid-feedback">Informe o nome da mãe</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="qtde_dependentes" class="form-label">Quantidade de Dependentes</label>
                                    <input type="number" class="form-control" id="qtde_dependentes"
                                           name="qtde_dependentes"
                                           value="@if(old('qtde_dependentes')){{ old('qtde_dependentes') }}@else{{ auth()->user()->Candidato->qtde_dependentes }}@endif">
                                    <div class="invalid-feedback">Informe a quantidade de dependentes</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="pis" class="form-label">PIS</label>
                                    <input type="number" class="form-control" id="pis" name="pis"
                                           value="@if(old('pis')){{ old('pis') }}@else{{ auth()->user()->Candidato->pis }}@endif">
                                    <div class="invalid-feedback">Informe o PIS</div>
                                </div>

                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="pis_orgao_emissor" class="form-label">Órgão Emissor do PIS</label>
                                    <input type="text" class="form-control" id="pis_orgao_emissor"
                                           name="pis_orgao_emissor"
                                           value="@if(old('pis_orgao_emissor')){{ old('pis_orgao_emissor') }}@else{{ auth()->user()->Candidato->pis_orgao_emissor }}@endif">
                                    <div class="invalid-feedback">Informe o órgão emissor do PIS</div>
                                </div>

                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="pis_estado_id" class="form-label">Estado de Emissão do PIS</label>
                                    <select name="pis_estado_id" id="pis_estado_id" class="form-select">
                                        <option selected disabled>Selecione o estado de emissão do PIS</option>
                                        @foreach($estados as $value)
                                            <option value="{{ $value->id }}"
                                                    @if(auth()->user()->Candidato->EstadoPis && auth()->user()->Candidato->EstadoPis->slug === $value->slug) selected @endif>{{ $value->nome }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Selecione o estado de emissão do PIS</div>
                                </div>

                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="pis_data_emissao" class="form-label">Data de Emissão do PIS</label>
                                    <input type="date" class="form-control" id="pis_data_emissao"
                                           name="pis_data_emissao"
                                           value="@if(old('pis_data_emissao')){{ old('pis_data_emissao') }}@else{{  auth()->user()->Candidato->pis_data_emissao }}@endif">
                                    <div class="invalid-feedback">Informe a data de emissão do PIS</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="pis_complemento" class="form-label">Complemento do PIS</label>
                                    <input type="text" class="form-control" id="pis_complemento" name="pis_complemento"
                                           value="@if(old('pis_complemento')){{ old('pis_complemento') }}@else{{  auth()->user()->Candidato->pis_complemento }}@endif">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="ctps" class="form-label">CTPS</label>
                                    <input type="text" class="form-control" id="ctps" name="ctps"
                                           value="@if(old('ctps')){{ old('ctps') }}@else{{  auth()->user()->Candidato->ctps }}@endif">
                                    <div class="invalid-feedback">Informe a CTPS</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="ctps_numero_serie" class="form-label">Número/Série da CTPS</label>
                                    <input type="text" class="form-control" id="ctps_numero_serie"
                                           name="ctps_numero_serie"
                                           value="@if(old('ctps_numero_serie')){{ old('ctps_numero_serie') }}@else{{  auth()->user()->Candidato->ctps_numero_serie }}@endif">
                                    <div class="invalid-feedback">Informe o número/série da CTPS</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="ctps_estado_id" class="form-label">Estado de Emissão da CTPS</label>
                                    <select name="ctps_estado_id" id="ctps_estado_id" class="form-select">
                                        <option selected disabled>Selecione o estado de emissão da CTPS</option>
                                        @foreach($estados as $value)
                                            <option value="{{ $value->id }}"
                                                    @if(auth()->user()->Candidato->EstadoCTPS && auth()->user()->Candidato->EstadoCTPS->slug === $value->slug) selected @endif>{{ $value->nome }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Selecione o estado de emissão da CTPS</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="ctps_data_emissao" class="form-label">Data de Emissão da CTPS</label>
                                    <input type="date" class="form-control" id="ctps_data_emissao"
                                           name="ctps_data_emissao"
                                           value="@if(old('ctps_data_emissao')){{ old('ctps_data_emissao') }}@else{{ auth()->user()->Candidato->ctps_data_emissao }}@endif">
                                    <div class="invalid-feedback">Informe a data de emissão da CTPS</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="cnh" class="form-label">CNH</label>
                                    <input type="number" class="form-control" id="cnh" name="cnh"
                                           value="@if(old('cnh')){{ old('cnh') }}@else{{  auth()->user()->Candidato->cnh }}@endif">
                                    <div class="invalid-feedback">Informe o numero da CNH</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="cnh_data_emissao" class="form-label">Data de Emissão da CNH</label>
                                    <input type="date" class="form-control" id="cnh_data_emissao"
                                           name="cnh_data_emissao"
                                           value="@if(old('cnh_data_emissao')){{ old('cnh_data_emissao') }}@else{{  auth()->user()->Candidato->cnh_data_emissao }}@endif">
                                    <div class="invalid-feedback">Informe a data de emissão do CNH</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="cnh_estado_id" class="form-label">Estado de Emissão da CNH</label>
                                    <select name="cnh_estado_id" id="cnh_estado_id" class="form-select">
                                        <option selected disabled>Selecione o estado de emissão da CNH</option>
                                        @foreach($estados as $value)
                                            <option value="{{ $value->id }}"
                                                    @if(auth()->user()->Candidato->EstadoCNH && auth()->user()->Candidato->EstadoCNH->slug === $value->slug) selected @endif>{{ $value->nome }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Selecione o estado de emissão da CNH</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="cnh_orgao_emissor" class="form-label">Orgão Emissor CNH</label>
                                    <input type="text" class="form-control" id="cnh_orgao_emissor"
                                           name="cnh_orgao_emissor"
                                           value="@if(old('cnh_orgao_emissor')){{ old('cnh_orgao_emissor') }}@else{{  auth()->user()->Candidato->cnh_orgao_emissor }}@endif">
                                    <div class="invalid-feedback">Informe o Orgão Emissor da CNH</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="cnh_validade" class="form-label">Data de validade da CNH</label>
                                    <input type="date" class="form-control" id="cnh_validade" name="cnh_validade"
                                           value="@if(old('cnh_validade')){{ old('cnh_validade') }}@else{{  auth()->user()->Candidato->cnh_validade }}@endif">
                                    <div class="invalid-feedback">Informe a data de validade do CNH</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="cnh_categoria" class="form-label">Categoria CNH</label>
                                    <select class="form-select" name="cnh_categoria" id="cnh_categoria">
                                        <option selected disabled>Selecione uma categoria</option>
                                        <option value="A" @selected(auth()->user()->Candidato->cnh_categoria === "A")>Categoria A</option>
                                        <option value="B" @selected(auth()->user()->Candidato->cnh_categoria === "B")>Categoria B</option>
                                        <option value="C" @selected(auth()->user()->Candidato->cnh_categoria === "C")>Categoria C</option>
                                        <option value="D" @selected(auth()->user()->Candidato->cnh_categoria === "D")>Categoria D</option>
                                        <option value="E" @selected(auth()->user()->Candidato->cnh_categoria === "E")>Categoria E</option>
                                        <option value="AB" @selected(auth()->user()->Candidato->cnh_categoria === "AB")>Categoria AB</option>
                                        <option value="AC" @selected(auth()->user()->Candidato->cnh_categoria === "AC")>Categoria AC</option>
                                        <option value="AD" @selected(auth()->user()->Candidato->cnh_categoria === "AD")>Categoria AD</option>
                                        <option value="AE" @selected(auth()->user()->Candidato->cnh_categoria === "AE")>Categoria AE</option>
                                    </select>
                                    <div class="invalid-feedback">Informe a categoria da CNH</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="cnh_complemento" class="form-label">Complemento CNH</label>
                                    <input type="text" class="form-control" id="cnh_complemento" name="cnh_complemento"
                                           value="@if(old('cnh_complemento')){{ old('cnh_complemento') }}@else{{  auth()->user()->Candidato->cnh_complemento }}@endif">
                                    <div class="invalid-feedback">Informe o complemento da CNH</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="tit_eleitor" class="form-label">Título de Eleitor</label>
                                    <input type="number" class="form-control" id="tit_eleitor" name="tit_eleitor"
                                           value="@if(old('tit_eleitor')){{ old('tit_eleitor') }}@else{{ auth()->user()->Candidato->tit_eleitor }}@endif">
                                    <div class="invalid-feedback">Informe o título de eleitor</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="tit_eleitor_zona" class="form-label">Zona Eleitoral</label>
                                    <input type="number" class="form-control" id="tit_eleitor_zona"
                                           name="tit_eleitor_zona"
                                           value="@if(old('tit_eleitor_zona')){{ old('tit_eleitor_zona') }}@else{{ auth()->user()->Candidato->tit_eleitor_zona }}@endif">
                                    <div class="invalid-feedback">Informe a zona eleitoral</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="tit_eleitor_sessao" class="form-label">Seção Eleitoral</label>
                                    <input type="number" class="form-control" id="tit_eleitor_sessao"
                                           name="tit_eleitor_sessao"
                                           value="@if(old('tit_eleitor_sessao')){{ old('tit_eleitor_sessao') }}@else{{ auth()->user()->Candidato->tit_eleitor_sessao }}@endif">
                                    <div class="invalid-feedback">Informe a seção eleitoral</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="tit_eleitor_estado_id" class="form-label">Estado de Emissão do
                                        Titulo</label>
                                    <select name="tit_eleitor_estado_id" id="tit_eleitor_estado_id" class="form-select">
                                        <option selected disabled>Selecione o estado de emissão do Titulo</option>
                                        @foreach($estados as $value)
                                            <option value="{{ $value->id }}"
                                                    @if(auth()->user()->Candidato->EstadoTituloEleitor && auth()->user()->Candidato->EstadoTituloEleitor->slug === $value->slug) selected @endif>{{ $value->nome }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Selecione o estado de emissão do Titulo</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="reservista" class="form-label">Reservista</label>
                                    <input type="text" class="form-control" id="reservista" name="reservista"
                                           value="@if(old('reservista')){{ old('reservista') }}@else{{ auth()->user()->Candidato->reservista }}@endif">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="curso_transporte_coletivo" class="form-label">Possui Curso de Transporte
                                        Coletivo?</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="curso_transporte_coletivo"
                                               name="curso_transporte_coletivo"
                                               value="{{ auth()->user()->Candidato->curso_transporte_coletivo }}"
                                               onchange="exibeCamposCheckbox('curso_transporte_coletivo', 'campo_validade_coletivo')">
                                        <label class="form-check-label" for="curso_transporte_coletivo">Sim</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3" id="campo_validade_coletivo" style="display: none">
                                    <label for="validade_curso_transporte_coletivo" class="form-label">Validade do Curso
                                        de Transporte Coletivo</label>
                                    <input type="date" class="form-control" id="validade_curso_transporte_coletivo"
                                           name="validade_curso_transporte_coletivo"
                                           value="@if(old('validade_curso_transporte_coletivo')){{ old('validade_curso_transporte_coletivo') }}@else{{ auth()->user()->Candidato->validade_curso_transporte_coletivo }}@endif">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="curso_transporte_escolar" class="form-label">Possui Curso de Transporte
                                        Escolar?</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="curso_transporte_escolar"
                                               name="curso_transporte_escolar"
                                               value="{{ auth()->user()->Candidato->curso_transporte_escolar }}"
                                               onchange="exibeCamposCheckbox('curso_transporte_escolar', 'campo_validade_transporte_escolar')">
                                        <label class="form-check-label" for="curso_transporte_escolar">Sim</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3" id="campo_validade_transporte_escolar" style="display: none">
                                    <label for="validade_curso_transporte_escolar" class="form-label">Validade do Curso
                                        de Transporte Escolar</label>
                                    <input type="date" class="form-control" id="validade_curso_transporte_escolar"
                                           name="validade_curso_transporte_escolar"
                                           value="@if(old('validade_curso_transporte_escolar')){{ old('validade_curso_transporte_escolar') }}@else{{ auth()->user()->Candidato->validade_curso_transporte_escolar }}@endif">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="trabalhou_empresa" class="form-label">Já Trabalhou na Empresa?</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="trabalhou_empresa"
                                               name="trabalhou_empresa"
                                               value="{{ auth()->user()->Candidato->trabalhou_empresa }}" onchange="exibirTrabalhouEmpresa(
                                                   'trabalhou_empresa',
                                                   'campo_trabalhou_empresa_data_entrada',
                                                   'campo_trabalhou_empresa_data_saida',
                                                   'campo_trabalhou_empresa_setor',
                                                   'campo_trabalhou_empresa_local_trabalhou'
                                               )">
                                        <label class="form-check-label" for="trabalhou_empresa">Sim</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3" id="campo_trabalhou_empresa_data_entrada" style="display: none">
                                    <label for="trabalhou_empresa_data_entrada" class="form-label">Data de
                                        Entrada</label>
                                    <input type="date" class="form-control" id="trabalhou_empresa_data_entrada"
                                           name="trabalhou_empresa_data_entrada"
                                           value="@if(old('trabalhou_empresa_data_entrada')){{ old('trabalhou_empresa_data_entrada') }}@else{{ auth()->user()->Candidato->trabalhou_empresa_data_entrada }}@endif">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3" id="campo_trabalhou_empresa_data_saida" style="display: none">
                                    <label for="trabalhou_empresa_data_saida" class="form-label">Data de Saida</label>
                                    <input type="date" class="form-control" id="trabalhou_empresa_data_saida"
                                           name="trabalhou_empresa_data_saida"
                                           value="@if(old('trabalhou_empresa_data_saida')){{ old('trabalhou_empresa_data_saida') }}@else{{ auth()->user()->Candidato->trabalhou_empresa_data_saida }}@endif">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3" id="campo_trabalhou_empresa_setor" style="display: none">
                                    <label for="trabalhou_empresa_setor" class="form-label">Setor que trabalhou</label>
                                    <input type="text" class="form-control" id="trabalhou_empresa_setor"
                                           name="trabalhou_empresa_setor"
                                           value="@if(old('trabalhou_empresa_setor')){{ old('trabalhou_empresa_setor') }}@else{{ auth()->user()->Candidato->trabalhou_empresa_setor }}@endif">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3" id="campo_trabalhou_empresa_local_trabalhou" style="display: none">
                                    <label for="trabalhou_empresa_data_saida" class="form-label">Local que
                                        trabalhou</label>
                                    <select name="trabalhou_empresa_local_id" id="trabalhou_empresa_local_id"
                                            class="form-select">
                                        <option selected disabled>Selecione o local que trabalhou</option>
                                        @foreach($locais as $value)
                                            <option value="{{ $value->id }}"
                                                    @if(auth()->user()->Candidato->LocalTrabalhou && auth()->user()->Candidato->LocalTrabalhou->slug === $value->slug) selected @endif>{{ $value->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="parente_funcionario" class="form-label">Tem algum parente que trabalha
                                        na empresa?</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="parente_funcionario"
                                               name="parente_funcionario"
                                               value="{{ auth()->user()->Candidato->parente_funcionario }}" onchange="exibirParenteIndicacaoEmpresa(
                                                   'parente_funcionario',
                                                   'campo_nome_parente',
                                                   'campo_setor_parente',
                                                   'campo_parente_local',
                                               )">
                                        <label class="form-check-label" for="parente_funcionario">Sim</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3" id="campo_nome_parente" style="display: none">
                                    <label for="nome_parente" class="form-label">Nome do Parente</label>
                                    <input type="text" class="form-control" id="nome_parente" name="nome_parente"
                                           value="@if(old('nome_parente')){{ old('nome_parente') }}@else{{ auth()->user()->Candidato->nome_parente }}@endif">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3" id="campo_setor_parente" style="display: none">
                                    <label for="setor_parente" class="form-label">Setor</label>
                                    <input type="text" class="form-control" id="setor_parente" name="setor_parente"
                                           value="@if(old('setor_parente')){{ old('setor_parente') }}@else{{ auth()->user()->Candidato->setor_parente }}@endif">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3" id="campo_parente_local" style="display: none">
                                    <label for="parente_funcionario_local_id" class="form-label">Local que
                                        trabalhou</label>
                                    <select name="parente_funcionario_local_id" id="parente_funcionario_local_id"
                                            class="form-select">
                                        <option selected disabled>Selecione o local que trabalhou</option>
                                        @foreach($locais as $value)
                                            <option value="{{ $value->id }}"
                                                    @if(auth()->user()->Candidato->LocalTrabalhoParente && auth()->user()->Candidato->LocalTrabalhoParente->slug === $value->slug) selected @endif>{{ $value->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="indicacao_colaborador">Indicação do Colaborador:</label><br>
                                    <input class="form-check-input" type="checkbox" id="indicacao_colaborador" name="indicacao_colaborador"
                                           value="{{ auth()->user()->Candidato->indicacao_colaborador }}"
                                           onchange="exibirParenteIndicacaoEmpresa(
                                                   'indicacao_colaborador',
                                                   'campo_nome_indicacao',
                                                   'campo_setor_indicacao',
                                                   'campo_indicacao_local',
                                               )">
                                    <label class="form-check-label" for="indicacao_colaborador">Sim</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3" id="campo_nome_indicacao" style="display: none">
                                    <label class="form-label" for="nome_colaborador">Nome do Colaborador:</label><br>
                                    <input class="form-control" type="text" id="nome_colaborador" name="nome_colaborador"
                                           value="@if(old('nome_colaborador')){{ old('nome_colaborador') }}@else{{ auth()->user()->Candidato->nome_colaborador }}@endif">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3" id="campo_setor_indicacao" style="display: none">
                                    <label class="form-label" for="setor_colaborador">Setor do Colaborador:</label><br>
                                    <input class="form-control" type="text" id="setor_colaborador" name="setor_colaborador"
                                           value="@if(old('setor_colaborador')){{ old('setor_colaborador') }}@else{{ auth()->user()->Candidato->setor_colaborador }}@endif">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3" id="campo_indicacao_local" style="display: none">
                                    <label for="parente_funcionario_local_id" class="form-label">Local que o indicado trabalha</label>
                                    <select name="parente_funcionario_local_id" id="parente_funcionario_local_id"
                                            class="form-select">
                                        <option selected disabled>Selecione o local</option>
                                        @foreach($locais as $value)
                                            <option value="{{ $value->id }}"
                                                    @if(auth()->user()->Candidato->LocalTrabalhoIndicacao && auth()->user()->Candidato->LocalTrabalhoIndicacao->slug === $value->slug) selected @endif>{{ $value->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>

                <div class="tab-pane fade {{ session()->has('aba') && session()->get('aba') === 'experiencia' ? 'show active' : '' }}" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                    @foreach($experienciasProfissionais as $experiencia)

                        <form action="{{ route('candidato-experiencia.delete') }}" method="POST" id="formDelete">
                            @csrf
                            @method('DELETE')
                        </form>

                        <div class="card" style="margin-bottom: 10px">
                            <div class="card-body">
                                <form method="POST" action=" {{ route('candidato-experiencia.update') }}" >
                                    @csrf
                                    @method('PUT')

                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-danger {{ 'button'.$experiencia->id }}" type="button"  style="display: none; margin-right: 5px " onclick="habilitaForm({{ $experiencia->id }})">Cancelar</button>

                                        <button class="btn btn-success {{ 'button'.$experiencia->id }}" type="submit"  style="display: none">Salvar</button>

                                        <button  class="btn btn-danger {{ 'button'.$experiencia->id }}" type="button" onclick="submitForm({{ $experiencia->id  }})" style="display: block; margin-right: 5px ">Excluir</button>

                                        <button class="btn btn-primary {{ 'button'.$experiencia->id }}" type="button"  style="display: block" onclick="habilitaForm({{ $experiencia->id }})">Editar</button>
                                    </div>

                                    <div class="mb-3">
                                        <input type="hidden" class="form-control" id="candidato_id" name="candidato_id" value="{{ auth()->user()->Candidato->id }}">
                                        <input type="hidden" class="form-control" id="experiencia_id" name="experiencia_id" value="{{  $experiencia->id }}">
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="nome_empresa" class="form-label">Nome da Empresa</label>
                                                <input type="text" class="form-control {{'form'.$experiencia->id }}" id="nome_empresa" name="nome_empresa" value="{{ $experiencia->nome_empresa }}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="cidade" class="form-label">Cidade</label>
                                                <input type="text" class="form-control {{'form'.$experiencia->id }}" id="cidade" name="cidade" value="{{ $experiencia->cidade }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="estado_id" class="form-label">Estado</label>
                                                <select name="estado_id" id="estado_id" class="form-select {{'form'.$experiencia->id }}" disabled>
                                                    <option selected>Selecione o estado</option>
                                                    @foreach($estados as $value)
                                                        <option value="{{ $value->id }}" @selected($value->id === $experiencia->estado_id)> {{ $value->nome }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="pais_id" class="form-label">País</label>
                                                <select name="pais_id" id="pais_id" class="form-select {{'form'.$experiencia->id }}" disabled>
                                                    <option selected>Selecione o país</option>
                                                    @foreach($paises as $value)
                                                        <option value="{{ $value->id }}" @selected($value->id === $experiencia->pais_id)>{{ $value->nome }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="funcao" class="form-label">Função</label>
                                                <input type="text" class="form-control {{'form'.$experiencia->id }}" id="funcao" name="funcao" value="{{ $experiencia->funcao }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="salario" class="form-label">Salário</label>
                                                <input type="text" class="form-control {{'form'.$experiencia->id }}" id="salario" name="salario" value="{{ $experiencia->salario }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="data_inicio" class="form-label">Data de Início</label>
                                                <input type="date" class="form-control {{'form'.$experiencia->id }}" id="data_inicio" name="data_inicio" value="{{ $experiencia->data_inicio }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="data_fim" class="form-label">Data de Fim</label>
                                                <input type="date" class="form-control {{'form'.$experiencia->id }}" id="data_fim" name="data_fim" value="{{ $experiencia->data_fim }}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="observacao" class="form-label">Observação</label>
                                                <textarea class="form-control {{'form'.$experiencia->id }}" id="observacao" name="observacao" maxlength="300" rows="3" disabled>{{ $experiencia->observacao }}</textarea>
                                            </div>
                                        </div>

                                    </div>

                                    {{--                            <button type="button" class="btn btn-danger" onclick="ocultarAddExperiencia('botao_add_experiencia','adicionar_experiencia')">Cancelar</button>--}}
                                    {{--                            <button type="submit" class="btn btn-primary">Enviar</button>--}}

                                </form>
                            </div>
                        </div>
                    @endforeach

                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" style="display: block" id="botao_add_experiencia" onclick="exibirAddExperiencia('botao_add_experiencia','adicionar_experiencia')">Nova Experiencia Profissional </button>
                    </div>

                    <div id="adicionar_experiencia" style="display: none">
                        <form method="POST" action=" {{ route('candidato-experiencia.create') }}">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="candidato_id" name="candidato_id" value="{{ auth()->user()->Candidato->id }}">
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="nome_empresa" class="form-label">Nome da Empresa</label>
                                        <input type="text" class="form-control" id="nome_empresa" name="nome_empresa">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="cidade" class="form-label">Cidade</label>
                                        <input type="text" class="form-control" id="cidade" name="cidade">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="estado_id" class="form-label">Estado</label>
                                        <select name="estado_id" id="estado_id" class="form-select" required>
                                            <option selected disabled>Selecione o estado</option>
                                            @foreach($estados as $value)
                                                <option value="{{ $value->id }}"> {{ $value->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="pais_id" class="form-label">País</label>
                                        <select name="pais_id" id="pais_id" class="form-select" required>
                                            <option selected disabled>Selecione o país</option>
                                            @foreach($paises as $value)
                                                <option value="{{ $value->id }}">{{ $value->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="funcao" class="form-label">Função</label>
                                        <input type="text" class="form-control" id="funcao" name="funcao">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="salario" class="form-label">Salário</label>
                                        <input type="text" class="form-control" id="salario" name="salario">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="data_inicio" class="form-label">Data de Início</label>
                                        <input type="date" class="form-control" id="data_inicio" name="data_inicio">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="data_fim" class="form-label">Data de Fim</label>
                                        <input type="date" class="form-control" id="data_fim" name="data_fim">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="observacao" class="form-label">Observação</label>
                                        <textarea class="form-control" id="observacao" name="observacao" maxlength="300" rows="3"></textarea>
                                        <div id="observacao-counter">300 caracteres restantes</div>
                                    </div>
                                </div>

                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-danger" onclick="ocultarAddExperiencia('botao_add_experiencia','adicionar_experiencia')" style="margin-right: 5px">Cancelar</button>
                                <button type="submit" class="btn btn-success">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-profile-academy" role="tabpanel" aria-labelledby="pills-profile-academy-tab">
                    <h2>Formação Academica...</h2>

                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            exibeCamposCheckbox('curso_transporte_coletivo', 'campo_validade_coletivo');
            exibeCamposCheckbox('curso_transporte_escolar', 'campo_validade_transporte_escolar');
            exibirParenteIndicacaoEmpresa(
                'parente_funcionario',
                'campo_nome_parente',
                'campo_setor_parente',
                'campo_parente_local',
            );
        });

    </script>
@endsection
