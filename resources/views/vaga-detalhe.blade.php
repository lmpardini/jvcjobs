@extends('layouts.main')

@section('content')
<main>
    <div class="container mt-3 mb-3" style="max-width: 720px;">
        <div class="row">
            <div class="col-6 pb-5"><button class="btn btn-primary w-50" @disabled($inscrito)  data-bs-toggle="modal" data-bs-target="#confirmModal">@if(!$inscrito)Inscrever @else Já inscrito @endif</button></div>
            <div class="col-6 text-end pb-5">Publicada em {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $vaga->created_at)->locale('pt')->isoFormat('LL') }}.</div>
            <div class="col-12 pb-1"><h2>{{ $vaga->nome }}</h2></div>
            <div class="col-12 pb-3"><h3><strong>{{ $vaga->LocalVaga->nome }}</strong></h3></div>
            <div class="col-12 pb-3 text-end"><strong>Número de vagas:</strong> {{ $vaga->numero_candidatos }}</div>
            <div class="col-12 pb-3">
                <div class="border-bottom border-2 border-dark mb-2"><strong>Descrição</strong></div>
                <p> {{ $vaga->descricao }}</p>
            </div>
            <div class="col-12 pb-3">
                <div class="border-bottom border-2 border-dark mb-2"><strong>Requisitos</strong></div>
                <p> {{ $vaga->requisitos }}</p>
            </div>
        </div>
    </div>

    <x-modal-inscricao-vaga :vaga="$vaga" :local="$vaga->LocalVaga"></x-modal-inscricao-vaga>

</main>
@endsection
