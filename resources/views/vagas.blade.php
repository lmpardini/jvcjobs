@extends('layouts.main')

@section('content')
<main>
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-sm-3 pb-3">
                <form action=" {{ route('vagas.listar') }}" class="row g-3">
                    <div class="col-12">
                        <label for="cidade" class="form-label">Cidade</label>
                        <select id="cidade" class="form-select" name="cidade">
                            <option value="todos" selected>Todas</option>
                            @foreach($cidades as $cidade)
                                <option value="{{ $cidade }}" @selected($input_cidade === $cidade)>{{$cidade}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="cidade" class="form-label">Cargo</label>
                        <select id="cidade" class="form-select" name="cargo">
                            <option value="todos" selected>Todos</option>
                            @foreach($cargos as $cargo)
                                <option value="{{ $cargo }}" @selected($input_cargo === $cargo)>{{ $cargo }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-9 pt-2">
                <div class="row">
                    @if(count($vagas) > 0)
                        @foreach($vagas as $vaga)
                            @component('components/card-vagas', ['item' => $vaga, 'loop' => $loop])
                            @endcomponent
                        @endforeach
                    @else
                        <div class="d-flex justify-content-center">
                            <p>Nenhum registro encontrado</p>
                        </div>
                    @endif
                </div>
                <div class="d-flex justify-content-center" style="margin-top: 10px">
                    {{ $vagas->links() }}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
