@extends('layouts.main')

@section('content')
    <main>
        <div class="d-flex align-items-center justify-content-center" style="height: 500px;">
            <div class="text-center">
                <h5 class="display-1 fw-bold text-danger">Ops!</h5>
                <p class="fs-3">Acesso não autorizado.</p>
                <p class="lead">
                   Você não tem acesso a pagina que está tentando acessar. Entre em contato com o administrador do sistema para maiores informações.
                </p>
            </div>
        </div>
    </main>
@endsection
