@extends('layouts.main')

@section('content')
<main>
    @if(count($vagasDestaque) > 0)
        <div class="container mt-3">
            <div class="row pb-4">
                <div class="col-12 mt-3 mb-2">
                    <h2 class="title-destaque primary-color">VAGAS EM DESTAQUE</h2>
                </div>

                @each('components\card-vagas-home', $vagasDestaque, 'item')

            </div>
        </div>
    @endif

    @if(count($outrasVagas) > 0)
        <div class="container mt-3">
            <div class="row pb-4">
                <div class="col-12 mt-3 mb-2">
                <h2 class="title primary-color">OUTRAS VAGAS</h2>
                </div>

                @each('components\card-vagas-home', $outrasVagas, 'item')

            </div>
        </div>
    @endif
</main>
@endsection
