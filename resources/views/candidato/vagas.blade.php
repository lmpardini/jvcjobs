@extends('layouts.main')

@section('content')
    <main>
        <h3> Minhas Vagas </h3>

        <div class="accordion accordion-flush " id="accordionExample">
            @foreach($vagas as $vaga)
                <div class="accordion-item" style="margin-top: 15px">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed "  data-bs-toggle="collapse" data-bs-target="{{ "#collapse".$vaga->id }}" aria-expanded="true" aria-controls="collapseOne">
                            <p><strong>{{ $vaga->Vaga->nome }}</strong> ({{ $vaga->Vaga->LocalVaga->nome }})</p>
                        </button>
                    </h2>
                    <div id="{{ "collapse".$vaga->id }}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="d-flex justify-content-center">
                                @switch($vaga->StatusCandidatura->slug)
                                    @case('inscrito')
                                        <span class="badge text-bg-primary">{{ $vaga->StatusCandidatura->nome }}</span>
                                        @break

                                    @case('em_analise')
                                        <span class="badge text-bg-info">{{ $vaga->StatusCandidatura->nome }}</span>
                                        @break

                                    @case('aprovado')
                                        <span class="badge text-bg-success">{{ $vaga->StatusCandidatura->nome }}</span>
                                        @break
                                    @default
                                        <span class="badge text-bg-secondary">{{ $vaga->StatusCandidatura->nome }}</span>

                                @endswitch

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection
