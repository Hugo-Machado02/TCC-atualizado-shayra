<?php
include "V_verifica-login.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha3844-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <title>Hospital Goiás</title>
    <link rel="shortcut icon" href="../imagens/logo_tittle.png">
    
  <link rel="stylesheet" type="text/css" href="../CSS_Hiago/cssHiago2.css"> 
</head>
<body>

<header><!-- inicio Cabecalho -->
      <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #a3bbd9;">
        <div class="container">
           
          <a href="#" class="navbar-brand">
            <img src="../imagens/hospital_logo__2_-removebg-preview (1).png" height="85px">
          </a>

          <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="nav-principal">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a href="P_indexrec.php" class="nav-link text-light">Inicio</a>
              </li>
              <li class="nav-item">
                <a href="P_internações-uti_leitosrec.php" class="nav-link text-light">UTI/Leitos</a>
              </li>
              <li class="nav-item">
                <a href="P_escalarec.php" class="nav-link text-light">Escalas</a>
              </li>
              <li class="nav-item">
                <a href="P_consulta.php" class="nav-link text-light">Consultas</a>
              </li>
              <li class="nav-item">
                <a href="P_cadastro_Paciente.php" class="nav-link text-light">Cadastro de pacientes</a>
              </li>
              <li class="nav-item">
                <a href="P_perfil-usuariorec.php" class="nav-link text-light">Meu perfil</a>
              </li>
              <li class="nav-item">
                <a href="V_logout.php" class="btn btn-outline-light ml-4">Sair</a>
              </li>
          </div>
       
        </div>
      </nav>
    </header><!--/fim Cabecalho -->
  
    <section class="meio">
  <div class="container">
   
      
     <br>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header dark-blue text-center text-black">
                    Cadastro de Consultas
                    </div>
                      <span><a href="P_agendamento-consulta.php"><button>Cadastre a consulta aqui</button></a></span>
                    </div>
                </div>
            </div>

            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header dark-blue text-center text-black">
                    Consultas
                    </div>
                    <div class="tester">
                    <span><a href="P_listagem-consulta.php"><button>Calendário de Consultas</button></a></span>
                    </div>
                </div>
            </div>

</body>
</html>