@extends('layouts.main')

@section('content')
<main>
    <div class="container mt-3">
        <div class="row pb-4">
            <div class="col-12 mt-3 mb-2">
            <h2 class="title-destaque primary-color">VAGAS EM DESTAQUE</h2>
            </div>
            @foreach($vagasDestaque as $vagaDestaque)
                <div class="col-sm-4 pb-2">
                    <div class="card bg-light">
                        <div class="card-body overflow-hidden">
                            <h4 class="card-title">{{ $vagaDestaque['vaga'] }}</h4>
                            <h5 class="card-title">{{ $vagaDestaque['garagem'] }}</h5>
                            <p class="card-text text-truncate">{{ $vagaDestaque['descricao_vaga'] }}</p>
                            <a href="vaga-detalhe" class="btn btn-primary">Detalhes</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container mt-3">
        <div class="row pb-4">
            <div class="col-12 mt-3 mb-2">
            <h2 class="title primary-color">OUTRAS VAGAS</h2>
            </div>
            @foreach($outrasVagas as $outraVaga)
            <div class="col-sm-4 pb-2 vagas">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $outraVaga['vaga'] }}</h4>
                        <h5 class="card-title">{{ $outraVaga['garagem'] }}</h5>
                        <p class="card-text">{{ $outraVaga['descricao_vaga'] }}</p>
                        <a href="vaga-detalhe" class="btn btn-primary">Detalhes</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection
