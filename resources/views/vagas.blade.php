@extends('layouts.main')

@section('content')
<main>
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-sm-3 pb-3">
                <form class="row g-3">
                    <div class="col-12">
                        <label for="cidade" class="form-label">Cidade</label>
                        <select id="cidade" class="form-select">
                            <option selected>Todas</option>
                            <option>Amparo</option>
                            <option>Caraguatatuba</option>
                            <option>Cubatão</option>
                            <option>Ilhabela</option>
                            <option>Itatiba</option>
                        </select>
                    </div>
                    <div class="col-12>
                        <label for="cidade" class="form-label">Cargo</label>
                        <select id="cidade" class="form-select">
                            <option selected>Todos</option>
                            <option>Funileiro</option>
                            <option>Mecânico</option>
                            <option>Técnico em Informática</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Qualquer campo</label>
                        <input type="email" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-9 pt-2">
                <div class="row">
                    <div class="col-sm-12 pb-2">
                        <div class="card rounded-0">
                            <div class="card-body">
                                <h5 class="card-title">Motorista Urbano</h5>
                                <h6 class="card-title">Ilhabela</h6>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 pb-2">
                        <div class="card rounded-0 bg-secondary-color">
                            <div class="card-body">
                                <h5 class="card-title">Técnico em Informática</h5>
                                <h6 class="card-title">Ilhabela</h6>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 pb-2">
                        <div class="card rounded-0">
                            <div class="card-body">
                                <h5 class="card-title">Motorista Rodoviário</h5>
                                <h6 class="card-title">Itatiba</h6>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 pb-2">
                        <div class="card rounded-0 bg-secondary-color">
                            <div class="card-body">
                                <h5 class="card-title">Serviços Gerais</h5>
                                <h6 class="card-title">Cubatão</h6>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
