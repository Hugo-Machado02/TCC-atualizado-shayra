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

  <style>
    
  </style>

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
<br>
<br>
<div class="container my-3" style="min-height: 100%;">

    <div class="row mb-2">
        <div class="col-md-12">
            <div class="card">
<?php
include('conexao_BD.php');
$sql = mysqli_query($conexao, "SELECT esc.id, fun.nome, med.crm, esc.hr_inicio, esc.hr_fim, esc.dia_semana
FROM funcionario as fun INNER JOIN medico as med ON (fun.cpf = med.cpf) INNER JOIN escala_med as em ON (med.crm = em.crm_med)
INNER JOIN escala as esc ON (em.id_escala = esc.id) order by esc.id");

        echo "<table class='table table-striped'>";
        echo "<thead style='background-color: #a3bbd9;'>";
          echo "<tr>";
            echo "<th scope='col'>#</th>";
            echo "<th scope='col'>Médico</th>";
            echo "<th scope='col'>CRM - Médico</th>";
            echo "<th scope='col'>Dia da Semana</th>";
            echo "<th scope='col'>Horário - Entrada</th>";
            echo "<th scope='col'>Horário - Saída</th>";
          echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
while ($listagem = mysqli_fetch_array($sql))
{
    $id = $listagem['id'];
    $nome = $listagem['nome'];
    $crm = $listagem['crm'];
    $hr_inicio = $listagem['hr_inicio'];
    $hr_fim = $listagem['hr_fim'];
    $dia = $listagem['dia_semana'];

        echo "<tr>";
          echo "<td scope='row'>$id</td>";
          echo "<td>$nome</td>";
          echo "<td>$crm</td>";
          echo "<td>$dia</td>";
          echo "<td>$hr_inicio</td>";
          echo "<td>$hr_fim</td>";
        echo "</tr>";
}
  echo "</tbody>";
echo "</table>";

?>


</section>
<br>
<br>
<br>
  
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