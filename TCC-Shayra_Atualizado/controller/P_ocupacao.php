<?php
include "V_verifica-login.php";
include('conexao_BD.php');

use LDAP\Result;

//Inserção ao Banco de Dados
$sql = "SELECT id_leitos FROM leitos WHERE id_paciente is null ORDER BY id_leitos";

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
                <a href="P_agendamento-consulta.php" class="nav-link text-light">Consultas</a>
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
                                <option data-target="#form-cadastro-paciente">01 - Formulário de Ocupação

                                </option>
                                
                            </select>

                            <p>2. Preencha o formulário</p>
                            <p>3. Envie (:</p>
                        </div>

                    </div>

                </div>
                <div class="col-lg-8 col-md-12">

<div id="form-ocupacao" class="selected">

<div class="card mb-3 shadow-sm card-general">

    <div class="card-body">
        <div class="card-title">
        Formulário de Ocupação
        </div>
        <hr>

        <form action="V_leitosPaciente" method="post" class="form-general">
            <input type="hidden" name="_token" value="gm73b4Z9e5M4WyYZRyRjBs170EGBRUjyjKgCnj9Y">                                    <input type="hidden" name="acao" value="3">
            <div class="form-group row">
                <div class="col-md-6">
                    <label>CPF do Paciente</label>
                    <input type="text" name="cpf_paciente" class="form-control" maxlength="50" placeholder="Ex: hiagocarlos" required="">
                </div>

                <div class="col-md-6 spacing">
                    <label>Nome do Paciente</label>
                    <input type="text" name="nome_paciente" class="form-control" maxlength="50" placeholder="Ex: Cesar" required="">
                </div>
         

            <div class="col-md-6 spacing">
                <label>Leito</label>
                <select class='form-control' v-model='nome...' name='leito' required=''>";
                    <option value="">Selecione um leito</option> 
                  <?php
                    $result = mysqli_query($conexao, $sql);
                    
                    while ($listagem = mysqli_fetch_array($result))
                      {
                        $id_leitos = $listagem['id_leitos'];
                        echo "<option value='$id_leitos'>$id_leitos</option>";
                      }
                  ?>
                  </select>
            </div>
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
</div> <!-- Fim da div#form-agendamento -->
</div> <!-- Fim da row -->
</div>  <!-- Fim div#requerimentos -->


</div>
</section>  
</body>
</html>