<div class="col-sm-4 pb-2">
    <div @class(['card', 'card bg-light' => $item->destaque])>
        <div class="card-body overflow-hidden">
            <h4 class="card-title">{{ $item->nome }}</h4>
            <h5 class="card-title">{{ $item->local }}</h5>
            <p class="card-text text-truncate">{{ $item->descricao  }}</p>
            <a href="vagas/{{$item->id}}" class="btn btn-primary">Detalhes</a>
        </div>
    </div>
</div>
