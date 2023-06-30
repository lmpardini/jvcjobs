<div class="col-sm-12 pb-2">
    <a href="vagas/{{$item->id}}">
        <div @class(['card', 'rounded-0', 'bg-vagas' =>  $loop->even])>
            <div class="card-body">
                <h4 class="card-title"><strong>{{ $item->nome }}</strong></h4>
                <h6 class="card-title"><strong>{{ $item->LocalVaga->nome }}</strong></h6>
                <p class="card-text">{{ $item->descricao }}</p>
            </div>
        </div>
    </a>
</div>
