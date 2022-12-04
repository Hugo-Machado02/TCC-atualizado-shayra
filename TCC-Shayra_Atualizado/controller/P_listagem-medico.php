<?php
include "V_verifica-login.php"
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
                <a href="P_indexadm.php" class="nav-link text-light">Inicio</a>
              </li>
              <li class="nav-item">
                <a href="P_internações-uti_leitosadm.php" class="nav-link text-light">UTI/Leitos</a>
              </li>
              <li class="nav-item">
                <a href="P_cadastro_Medico.php" class="nav-link text-light">Cadastro Medico</a>
              </li>
              <li class="nav-item">
                <a href="P_listagem-medico.php" class="nav-link text-light">Medicos</a>
              </li>
              <li class="nav-item">
              <a href="P_perfil-usuarioadm.php" class="nav-link text-light">Meu perfil</a>
              </li>
              <li class="nav-item">
                <a href="V_logout.php" class="btn btn-outline-light ml-4">Sair</a>
              </li>
          </div>
       
        </div>
      </nav>
    </header><!--/fim Cabecalho -->
    <div class="container my-3" style="min-height: 100%;">

<div class="row mb-2">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-blue text-white font-weight-bold">
                Listagem - Medico
            </div>
            <div class="card-body" id="card-user">

                <div class="text-center" id="titulo_listagem">
                    <h2>Hospital Goiás</h2>
                    <h2>Setor Administrativo</h2>
                    <h2 style="font-family: Georgia">LISTAGEM DE MEDICO</h2>
                    <hr>
                </div>

                <div id="listagem">
                    <h5 class="text-center my-4"></h5>
                    <?php
                      include('conexao_BD.php');
                      $sql = "SELECT fun.nome, med.crm FROM medico as med INNER JOIN funcionario as fun ON (med.cpf = fun.cpf)";

                      $result = mysqli_query($conexao, $sql);

                      echo "<ol>";
                      while ($listagem = mysqli_fetch_array($result))
                      {
                          $nomeMedicos = $listagem['nome'];
                          $crmMedicos = $listagem['crm'];

                            echo "<li>Médico: ".$nomeMedicos."<br>CRM: ".$crmMedicos."</li><br>";
                      }
                      echo "</ol>";

                      ?>
                </div>
            </div>
          </div>
    </div>
</div>
</div>
</section> 

    
     
<script>
    
        $(document).ready(function(){

          $('.sub-btn').click(function(){
            $(this).next('.sub-menu').slideToggle();
            $(this).find('.dropdown').toggleClass('rotate');
          });

          $('.menu-btn').click(function(){
            $('.side-bar').addClass('active');
            $('.menu-btn').css("visibility", "hidden");
          });

          $('.close-btn').click(function(){
            $('.side-bar').removeClass('active');
            $('.menu-btn').css("visibility", "visible");
          });

          $('#header-user').click(function(event) {
    $('#header-user').toggleClass('visible');
    event.stopPropagation();
    if ($('#header-notif').hasClass('visible')) {
      $('#header-notif').removeClass('visible');
    }
  });
  $(document).click(function(){
    $("#header-user").removeClass('visible');
    $('#header-notif').removeClass('visible');
  });

        });
    </script>
  
</body>
</html>