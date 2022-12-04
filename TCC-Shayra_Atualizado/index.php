<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <link rel="stylesheet" type="text/css" href="CSS_Hiago/cssHiago2.css"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha3844-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <title>Hospital Goiás</title>
    <link rel="shortcut icon" href="imagens/logo_tittle.png">
  </head>
  <body>
    
    <header><!-- inicio Cabecalho -->
      <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #a3bbd9;">
        <div class="container">
           
          <a href="#" class="navbar-brand">
            <img src="imagens/hospital_logo__2_-removebg-preview (1).png" height="85px">
          </a>

          <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="nav-principal">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a href="index.php" class="nav-link text-light">Home</a>
              </li>
              <li class="nav-item">
                <a href="view/quem_somos.php" class="nav-link text-light">O Hospital</a>
              </li>
              <li class="nav-item">
                <a href="view/servicos.php" class="nav-link text-light">Nossos serviços</a>
              </li>
              <li class="nav-item">
                <a href="view/convenios.php" class="nav-link text-light">Convenios</a>
              </li>
              <li class="nav-item">
                <a href="view/politica_de_privacidade.php" class="nav-link text-light">Politica de privacidade</a>
              </li>
              <li class="nav-item">
                <a href="view/contato.php" class="nav-link text-light">Contato</a>
              </li>
              <li class="nav-item">
                <a href="#" data-toggle="modal" data-target="#myModal"><!-- Link que abre a janela modal -->
 
                <span class="btn btn-outline-light ml-4" aria-hidden="true"> Entrar </span></a>
              </li>
            </ul>
          </div>
       
        </div>
      </nav>
    </header><!--/fim Cabecalho -->

    <div id="myModal" class="modal fade" tabindex="-1" role="dialog"><!-- Início do código da janela modal -->
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header"><!-- Header do modal -->
                  <h4 class="modal-title">Login</h4><!-- Título -->
              </div>
              <div class="modal-body"><!-- Corpo do modal -->
              <form method="post" action="controller/V_login.php">
                <div class="principal">
                <label>Usuario</label>
                  <input class="form-control" type="text" name="usuario" required="" autocomplete="off">
               
                </div>
                <div class="principal">
                <label>Senha</label>
                  <input class="form-control" type="password" name="senha" required="" autocomplete="off">
             <br>
                </div>

                <?php
                if(isset($_SESSION["nao_autenticado"])):
                ?>
                
                <div class="noti">
                  <p> ERRO: Usuário ou senha inválido. </p>
                </div>

                <?php
                endif;
                ?>
                <div>
                  <button type="submit" class="btn btn-primary ms-auto">Entrar</button>
                </div>
              </form>
              </div>
              
              <div class="card-footer py-3 border-0">
							<div class="text-center">
							<button type="button" class="btn btn-default" data-dismiss="modal">
                      Fechar <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                  </button>          
							</div>
						</div>
          </div>
      </div>
  </div>
    <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script><!-- Chama a biblioteca JQuery -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script><!-- Chama o arquivo Bootstrap JavaScript -->

    <section id="home"><!-- Início seção home -->
      <div class="container">
        <div class="row">
          <div class="col-md-6 d-flex"><!-- Textos da seção -->
            <div class="align-self-center">
              <h1 class="display-4">Sua saúde e bem estar em primeiro lugar</h1>
              <p>
                Hospital Goiás sendo referencia no estado a mais de 80 anos.
              </p>

              <form class="mt-4 mb-4">
                <div class="input-group input-group-lg">
                  <select class="form-control">
                    <option>Procurando uma especialidade?</option>
                    <option>Ortopedista</option>
                    <option>Dermatologista</option>
                    <option>Clinico Geral</option>
                    <option>Anestesita</option>
                    <option>Pediatra</option>
                  </select>
                  <div class="input-group-append">
                    <button type="button" class="btn btn-primary">Pesquisar</button>
                  </div>
                </div>
              </form>
            </div>
          </div><!--/fim textos da seção -->
          <div class="col-md-6 d-none d-md-block">
            <br>
            <img src="imagens/Foto-Enfermeira.png" width="432px">

          </div>
        </div>
      </div>
    </section><!--/fim seção home -->

    

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>