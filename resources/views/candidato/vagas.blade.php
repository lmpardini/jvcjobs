@extends('layouts.main')

@section('content')
    <main>
        <h3> Minhas Vagas </h3>

        <div class="accordion accordion-flush " id="accordionExample">
            @foreach($vagas as $vaga)
                <div class="accordion-item" style="margin-top: 15px">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed"  data-bs-toggle="collapse" data-bs-target="{{ "#collapse".$vaga->id }}" aria-expanded="true" aria-controls="collapseOne">
                            <p><strong>{{ $vaga->Vaga->nome }}</strong> ({{ $vaga->Vaga->LocalVaga->nome }})</p>
                        </button>
                    </h2>
                    <div id="{{ "collapse".$vaga->id }}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">

                            <div class="container-fluid py-5">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="horizontal-timeline">
                                            <ul class="list-inline items">
                                                <li class="list-inline-item items-list">
                                                    <div class="px-4">
                                                        <div class="event-date badge bg-primary">Inscrito</div>
                                                        <p class="text-muted">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $vaga->created_at)->format('d/m/Y')}}</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection
