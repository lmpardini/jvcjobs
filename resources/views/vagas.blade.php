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
                    <div class="col-12">
                        <label for="cidade" class="form-label">Cargo</label>
                        <select id="cidade" class="form-select">
                            <option selected>Todos</option>
                            <option>Funileiro</option>
                            <option>Mecânico</option>
                            <option>Técnico em Informática</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-9 pt-2">
                <div class="row">
                    @foreach($vagas as $vaga)
                        @component('components/card-vagas', ['item' => $vaga, 'loop' => $loop])
                        @endcomponent
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
