@extends('layouts.main')

@section('content')
    <main>
        <h1> Minhas Vagas </h1>
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
            <tr>
                <th>Cargo</th>
                <th>Local</th>
                <th>Status da Candidatura</th>
            </tr>
            </thead>
            <tbody>
            @foreach($vagas as $vaga)
                <tr>
                    <td><a href="/vagas/{{$vaga->Vaga->id}}"> {{ $vaga->Vaga->nome }} </a></td>
                    <td><a href="/vagas/{{$vaga->Vaga->id}}"> {{ $vaga->Vaga->LocalVaga->nome }} </a></td>
                    <td><a href="/vagas/{{$vaga->Vaga->id}}"> {{ $vaga->StatusCandidatura->nome }} </a></td>
                </tr>

            @endforeach
            </tbody>
        </table>

    </main>


@endsection
