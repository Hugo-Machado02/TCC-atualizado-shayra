<?php
include "V_verifica-login.php"
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>   <link rel="stylesheet" type="text/css" href="../CSS_Hiago/cssHiago2.css"> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha3844-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>Hospital Goiás</title>
    <link rel="shortcut icon" href="../imagens/logo_tittle.png">
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
                <a href="P_indexmed.php" class="nav-link text-light">Inicio</a>
              </li>
              <li class="nav-item">
                <a href="P_internações-uti_leitosmed.php" class="nav-link text-light">UTI/Leitos</a>
              </li>
              <li class="nav-item">
                <a href="P_escalamed.php" class="nav-link text-light">Escalas</a>
              </li>
              <li class="nav-item">
                <a href="P_listagem-paciente.php" class="nav-link text-light">Pacientes</a>
              </li>
              <li class="nav-item">
                <a href="P_perfil-usuariomed.php" class="nav-link text-light">Meu perfil</a>
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
                    <div class="card-header dark-blue text-center text-light">
                      UTI
                    </div>
                    <div class="tester">
                       Apenas <span class="teste">para</span>
                        teste teste teste teste teste teste teste teste
                        <br>
                      <br>
                      <br>
                      <br>
                    </div>
                </div>
            </div>

            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header dark-blue text-center text-light">
                    Paciente
                    </div>
                    <div class="tester">
                      Apenas <span class="teste">para</span>
                      teste teste teste teste teste teste teste teste
                      <br>
                      <br>
                      <br>
                      <br>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header dark-blue text-center text-light">
                      Medico
                    </div>
                    <div class="tester">
                     Apenas <span class="teste">para</span>
                    teste teste teste teste teste teste teste teste
                    <br>
                      <br>
                      <br>
                      <br>
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