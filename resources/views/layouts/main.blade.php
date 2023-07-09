<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <!-- Google fonts Lato -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet"
    />
    <title>JVCJobs</title>
    <!--Importador do Google Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <!-- CSS do projeto -->
    <link rel="stylesheet" href="/css/styles.css" />
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<header>
    <div class="container-fluid p-0">
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="/images/logo-mini.jpg" alt="JVCJobs" width="75%" height="75%" />
                </a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbar-items"
                    aria-controls="navbar-items"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <i class="bi bi-list"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbar-items">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? ' active' : '' }}" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('vagas') ? ' active' : '' }}" href="{{ route('vagas.listar') }}">Vagas</a>
                        </li>

                        @auth
                            <li class="nav-item dropdown">
                                <button class="btn btn-secondary dropdown-toggle w-100 text-start" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                    Olá, {{ auth()->user()->name }}
                                </button>

                                @if(auth()->user()->PerfilUsuario->slug === 'colaborador')
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <li><a href="{{ route('administrativo.home') }}" class="dropdown-item {{ Request::is('administrativo') ? ' active' : '' }}" type="button">Painel Administrativo</a></li>
                                        <li><button class="dropdown-item" type="button">Alterar Senha</button></li>
                                        <li><a href=" {{ route('auth.logout') }}" class="dropdown-item" type="button" >Sair</a></li>
                                    </ul>

                                @endif
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <li><a href="{{ route('candidato.dados') }}" class="dropdown-item {{ Request::is('candidato/dados') ? ' active' : '' }}" type="button">Meus Dados</a></li>
                                    <li><a href="{{ route('candidato.minhas-vagas') }}" class="dropdown-item {{ Request::is('candidato/vagas') ? ' active' : '' }}" type="button">Minhas Vagas</a></li>
                                    <li><button class="dropdown-item" type="button">Alterar Senha</button></li>
                                    <li><a href=" {{ route('auth.logout') }}" class="dropdown-item" type="button" >Sair</a></li>
                                </ul>
                            </li>
                        @endauth

                        @guest
                            <li class="nav-item">
                                <a class="navbar-item" href={{ route('auth.login') }}>
                                    <i class="material-icons" style="font-size: 3em;">account_circle</i>
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<body>
<div class="container" style="min-height: 400px;">
    @yield('content')
</div>
</body>
    <footer class="mt-auto border-top" id="rodape">
        <!-- Copyright -->
        <div class="text-center p-3">
            <p>© {{ \Carbon\Carbon::now()->format('Y') }} JVCJobs  - Todos os direitos reservados.</p>

            <p>Desenvolvido por <a class="text-dark" href="https://www.jvcsolutions.com.br">JVCSolutions</a></p>
        </div>
        <!-- Copyright -->
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="/js/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/scripts.js"></script>


    @if($errors)
        @foreach($errors->messages() as $errorMessage)
            <script>
                toastr.error(" {{ $errorMessage[0] }}")
            </script>
        @endforeach
    @endif

    @if(session()->has('success'))
        <script>
            toastr.success(" {{ session()->get('success') }}")
        </script>

    @endif
    <script>

    </script>
</html>
