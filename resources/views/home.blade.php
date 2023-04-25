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
    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body>
      <header>
<div class="container-fluid p-0">
            <!-- NAVBAR -->
          <nav class="navbar navbar-expand-lg" id="navbar">
            <div class="container">
              <a class="navbar-brand" href="#">
                <img src="images/logo-mini.jpg" alt="JVCJobs" width="75%" height="75%" />
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
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Vagas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Contato</a>
                  </li>
                  <li class="nav-item">
                    <a class="navbar-item" data-bs-toggle="modal" data-bs-target="#loginModal" href="#">
                      <i class="material-icons" style="font-size: 3em;">account_circle</i>
                    </a>
                  </li>

                </ul>

              </div>
            </div>
          </nav>
</div>
      </header>
<main>
  <div class="container mt-3">
    <div class="row pb-4">
      <div class="col-12 mt-3 mb-2">
        <h2 class="title primary-color">VAGAS EM DESTAQUE</h2>
      </div>
      <div class="col-sm-4 pb-2">
        <div class="card bg-light">
          <div class="card-body">
            <h4 class="card-title">Motorista Urbano</h4>
            <h5 class="card-title">Ilhabela</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <a href="#" class="btn btn-primary">Inscrever</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4 pb-2">
        <div class="card bg-light">
          <div class="card-body">
            <h4 class="card-title">Técnico em Informática</h4>
            <h5 class="card-title">Itatiba</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <a href="#" class="btn btn-primary">Inscrever</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4 pb-2">
        <div class="card bg-light">
          <div class="card-body">
            <h4 class="card-title">Recursos Humanos</h4>
            <h5 class="card-title">Itatiba</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <a href="#" class="btn btn-primary">Inscrever</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container mt-3">
    <div class="row pb-4">
      <div class="col-12 mt-3 mb-2">
        <h2 class="title primary-color">OUTRAS VAGAS</h2>
      </div>
      <div class="col-sm-4 pb-2">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Motorista Rodoviário</h4>
            <h5 class="card-title">Itatiba</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <a href="#" class="btn btn-primary">Inscrever</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4 pb-2">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Funileiro</h4>
            <h5 class="card-title">Águas de Lindóa</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <a href="#" class="btn btn-primary">Inscrever</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4 pb-2">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Almoxarifado</h4>
            <h5 class="card-title">Cubatão</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <a href="#" class="btn btn-primary">Inscrever</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4 pb-2">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Eletricista</h4>
            <h5 class="card-title">Amparo</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <a href="#" class="btn btn-primary">Inscrever</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4 pb-2">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Mecânico Diesel</h4>
            <h5 class="card-title">Itanhém</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <a href="#" class="btn btn-primary">Inscrever</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
      <!-- #Inicio do Modal -->
      <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                  </div>
                  <div class="modal-body">
                      <div class="pb-3">
                          <ul class="nav nav-tabs nav-justified" id="loginTabs" role="tablist">
                              <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="login" aria-selected="true">Iniciar sessão</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab" aria-controls="register" aria-selected="false">Criar uma conta</button>
                              </li>
                          </ul>
                      </div>
                      <div class="tab-content" id="loginTabsContent">
                          <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                              <div class="text-center p-3">Informe os dados de acesso</div>
                              <form>
                                  <div class="mb-3">
                                      <label for="username" class="form-label visually-hidden">CPF</label>
                                      <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" required>
                                  </div>
                                  <div class="mb-3">
                                      <label for="password" class="form-label visually-hidden">Senha</label>
                                      <input type="password" class="form-control" id="password" name="password" placeholder="Senha" required>
                                  </div>
                                  <div class="text-center mb-3">
                                      <button type="submit" class="btn btn-primary w-100">Entrar</button>
                                  </div>
                              </form>
                          </div>
                          <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                              <div class="text-center p-3">Informe os dados para cadastro</div>
                              <form>
                                  <div class="mb-3">
                                      <label for="username" class="form-label visually-hidden">Nome</label>
                                      <input type="text" class="form-control" id="username" name="username" placeholder="Nome" required>
                                  </div>
                                  <div class="mb-3">
                                      <label for="username" class="form-label visually-hidden">Sobrenome</label>
                                      <input type="text" class="form-control" id="username" name="username" placeholder="Sobrenome" required>
                                  </div>
                                  <div class="mb-3">
                                      <label for="username" class="form-label visually-hidden">CPF</label>
                                      <input type="text" class="form-control" id="username" name="username" placeholder="CPF" required>
                                  </div>
                                  <div class="mb-3">
                                      <label for="username" class="form-label visually-hidden">E-mail</label>
                                      <input type="text" class="form-control" id="username" name="username" placeholder="E-mail" required>
                                  </div>
                                  <div class="mb-3">
                                      <label for="password" class="form-label visually-hidden">Senha</label>
                                      <input type="password" class="form-control" id="password" name="password" placeholder="Senha" required>
                                  </div>
                                  <div class="text-center mb-3">
                                      <button type="submit" class="btn btn-primary w-100">Salvar</button>
                                  </div>

                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- ##Fim do Modal -->
<footer class="bg-light text-center border-top">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: Form -->
    <section class="">
      <form action="">
        <!--Grid row-->
        <div class="row d-flex justify-content-center">
          <!--Grid column-->
          <div class="col-auto">
            <p class="pt-2">
              <strong>Receba nossas vagas por e-mail</strong>
            </p>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-5 col-12">
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="form5Example27" placeholder="Digite o seu e-mail" class="form-control" />
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-auto">
            <!-- Submit button -->
            <button type="submit" class="btn btn-dark text-white mb-4">
              Enviar
            </button>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </form>
    </section>
    <!-- Section: Form -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center bg-light pb-3">
    <a class="text-dark" href="https://www.jvcsolutions.com.br">©2023 - JVCJobs</a>
  </div>
  <!-- Copyright -->
</footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
