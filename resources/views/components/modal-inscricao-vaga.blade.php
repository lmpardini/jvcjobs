<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Atenção!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <p> {{ $vaga->nome }} - {{ $local->nome }}</p>
                @auth
                    <p>Deseja se inscrever nesta vaga?</p>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <form method="POST" action="{{ route('candidato.inscrever-vaga') }}">
                            @csrf
                            <input name="vaga_id" type="hidden" value="{{ $vaga->id }}">
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        </form>

                    </div>

                @endauth
                @guest
                    <p>Deseja se inscrever nesta vaga? Para se inscrever é necessario estar logado!</p>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        @csrf

                        <form method="GET" action="{{ route('auth.login') }}">
                            <button type="submit" class="btn btn-primary">Ir para Login</button>
                        </form>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</div>
