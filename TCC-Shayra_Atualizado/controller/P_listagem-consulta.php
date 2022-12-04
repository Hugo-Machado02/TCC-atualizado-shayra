<?php
include "V_verifica-login.php"
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.es.gov.br/fonts/font-awesome/css/font-awesome.min.css">
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

<br>
<br>
<div class="container my-3" style="min-height: 100%;">

    <div class="row mb-2">
        <div class="col-md-12">
            <div class="card">
<?php
include('conexao_BD.php');
$sql = mysqli_query($conexao, "SELECT con.id_consulta, pac.nome, pac.cpf, fun.nome as nomeMed, med.crm, med.especialidade
FROM consulta as con INNER JOIN paciente as pac ON (con.id_paciente = pac.id)
INNER JOIN medico as med ON (con.crm_med = med.crm)
INNER JOIN funcionario as fun ON (med.cpf = fun.cpf)");

  echo "<table class='table table-striped'>";
  echo "<thead  style='background-color: #a3bbd9;'>";
    echo "<tr>";
      echo "<th scope='col'>Nº Consulta</th>";
      echo "<th scope='col'>Paciente</th>";
      echo "<th scope='col'>CPF - Paciente</th>";
      echo "<th scope='col'>Médico</th>";
      echo "<th scope='col'>CRM - Médico</th>";
      echo "<th scope='col'>Especialidade</th>";
    echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
while ($listagem = mysqli_fetch_array($sql))
{
    $idConsulta = $listagem['id_consulta'];
    $nomePaciente = $listagem['nome'];
    $cpfPaciente = $listagem['cpf'];
    $nomeMed = $listagem['nomeMed'];
    $crmMed = $listagem['crm'];
    $especialidadeMed = $listagem['especialidade'];

        echo "<tr>";
            echo "<td id='dados1'>$idConsulta</td>";
            echo "<td id='dados2'>$nomePaciente</td>";
            echo "<td id='dados2'>$cpfPaciente</td>";
            echo "<td id='dados2'>$nomeMed</td>";
            echo "<td id='dados2'>$crmMed</td>";
            echo "<td id='dados2'>$especialidadeMed</td>";
        echo "</tr>";
}
  echo "</tbody>";
echo "</table>";

?>
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