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

  <link rel="stylesheet" type="text/css" href="../CSS_Hiago/cssHiago2.css"> 
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
  <title>Tela Inicial</title>
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
                <a href="P_indexrec.php" class="nav-link text-light">Inicio</a>
              </li>
              <li class="nav-item">
                <a href="P_internações-uti_leitosrec.php" class="nav-link text-light">UTI/Leitos</a>
              </li>
              <li class="nav-item">
                <a href="P_escalarec.php" class="nav-link text-light">Escalas</a>
              </li>
              <li class="nav-item">
                <a href="P_agendamento-consulta.php" class="nav-link text-light">Consultas</a>
              </li>
              <li class="nav-item">
                <a href="P_cadastro_Paciente.php" class="nav-link text-light">Cadastro de Pacientes</a>
              </li>
              <li class="nav-item">
                <a href="P_perfil-usuariorec.php" class="nav-link text-light">Meu perfil</a>
              </li>
              <li class="nav-item">
                <a href="V_logout.php" class="btn btn-outline-light">Sair</a>
              </li>
          </div>
       
        </div>
      </nav>
    </header><!--/fim Cabecalho -->
  
    
<section class="meio">
<div class="AppVUE">
<div class="container my-3" style="min-height: 100%;">
        <div id="requerimentos">

            <div class="row">

                <div class="col-lg-4 col-md-12">

                    <div class="card card-general shadow-sm">

                        <div class="card-title">
                            <span>Instruções</span>
                        </div>

                        <div class="card-body">
                            <p>1. Selecione o formulário</p>

                            <select name="" id="select-form" class="custom-select my-3">
                                <option data-target="#form-cadastro-paciente">01 - Formulário de Cadastro de Paciente</option>
                                
                            </select>

                            <p>2. Preencha o formulário</p>
                            <p>3. Envie (:</p>
                        </div>

                    </div>

                </div>
                <div class="col-lg-8 col-md-12">

<div id="form-cadastro-paciente" class="selectd">

    <div class="card mb-3 shadow-sm card-general">

        <div class="card-body">
        <div class="card-title">
            <span>Formulário de Cadastro de Paciente</span>
        </div>
            <hr>

            <form action="V_Cadastro_Paciente.php" method="post" class="form-general">
                <input type="hidden" name="_token" value="">
                <input type="hidden" name="acao" value="3">
                <div class="form-group row">
                    <div class="col-md-6 spacing">
                        <label>Nome completo do Paciente</label>
                        <input type="text" v-model="nomePaciente" name="nomePaciente" class="form-control" maxlength="50" placeholder="Ex: Cesar" required="">
                    </div>

                    <div class="col-md-6 spacing">
                        <label>CPF</label>
                        <input type="text" v-model="cpfPaciente" id="cpfPaciente" name="cpfPaciente" class="form-control" maxlength="14" OnKeyPress="formatacao('###.###.###-##', this)" placeholder="Ex: 000.000.000-00" required="">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 spacing">
                        <label>Telefone</label>
                        <input type="text" v-model="telefonePaciente" OnKeyPress="formatacao('## #####-####', this)" name="telefonePaciente" class="form-control" maxlength="13" placeholder="Ex: (64) 99999-9999" required="">
                    </div>

                    <div class="col-md-6 spacing">
                        <label>DATA DE NASCIMENTO</label>
                        <input type="text" v-model="dtNascimento" OnKeyPress="formatacao('##/##/####', this)" name="dtNascimento" class="form-control" maxlength="10" placeholder="Ex: 01/01/2000" required="">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 spacing">
                        <label>Situação:</label>
                        <input type="text" v-model="situacaoPaciente" name="situacaoPaciente" class="form-control" maxlength="50" placeholder="Ex: Coma Induzido" required="">
                    </div>

                    <div class="col-md-6 spacing">
                        <label>Plano de Saúde</label>
                        <input type="text" v-model="planoSaude" name="planoSaude" class="form-control" maxlength="50" placeholder="Ex: IPASGO" required="">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 spacing">
                        <label>Parente:</label>
                        <input type="text" v-model="parentePaciente" name="parentePaciente" class="form-control" maxlength="50" placeholder="Ex: Junior - Pai" required="">
                    </div>

                    <div class="col-md-6">
                        <label>CPF Recepcionista:</label>
                        <input type="text" v-model="cpfRecepcionista" OnKeyPress="formatacao('###.###.###-##', this)" name="cpfRecepcionista" class="form-control" maxlength="14" placeholder="Ex: 000.000.000-00" required="">
                    </div>
                </div>
                
                <div class="form-group row">                         
                    <div class="col-md-6 spacing">
                        <label>Normas</label>
                        <p><span class="badge bg-principal text-white">INFO</span> Ao preencher este
                            requerimento, atesto que li e estou em total acordo com as normas de
                            Cadastro.</p>
                    </div>
                </div>

                <button class="btn btn-send">Enviar</button>

            </form>
        </div>
    </div>

</div> <!-- Fim da div#form-cadastro-paciente-->
</div> <!-- Fim col-md-8 -->
</div> <!-- Fim da row -->
</div> <!-- Fim da div#requerimentos -->


<div class="card mb-4 shadow-sm" id="472029" style="border-color: #ccc">


    <div class="card-body">

        <div class="row">


            <div class="col-md-9">
                <p><strong><?php echo $_SESSION['nome']; ?>:</strong> <?php echo $_SESSION['nome_funcao']; ?></p>
                <br>
					      <p><strong>Nome: </strong> {{nomePaciente}} </p>
                <p><strong>CFP: </strong> {{cpfPaciente}} </p>
                <p><strong>Telefone: </strong> {{telefonePaciente}} </p>
                <p><strong>Data de Nascimento: </strong> {{dtNascimento}} </p>
                <p><strong>Situação: </strong> {{situacaoPaciente}} </p>
                <p><strong>plano de Saúde: </strong> {{planoSaude}} </p>
                <p><strong>Parente: </strong> {{parentePaciente}} </p>
                <p><strong>CPF Recepcionista: </strong> {{cpfRecepcionista}} </p>

					      <p class="mt-2 font-weight-bold">[x] Li e concordo com as normas de postagem de agendamento.</p>
            </div>
            
        </div>

    </div>

</div>
</div>
</div>
</section>
<script src="mascara.js"></script>
<script src="Cad_Paciente.js"></script>
<script>
    $(document).ready(function () {
        $('#select-form').on('change', function (e) {
            var optionSelected = $(this).find(':selected');
            var targetID = optionSelected[0].dataset.target;

            // Aplicar classe d-none para div com classe selected
            $('.selected').addClass('d-none');

            // Remover classe selected da div com classe selected
            $('.selected').removeClass('selected');

            // Remover classe d-none para div com id target
            $(targetID).removeClass('d-none');

            // Aplicar classe selected para div com id target
            $(targetID).addClass('selected');
        });
    });

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