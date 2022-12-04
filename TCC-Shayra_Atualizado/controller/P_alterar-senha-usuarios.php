<?php
session_start();
include('conexao_BD.php');

$sql = mysqli_query($conexao, "SELECT log.id, log.usuario, log.senha FROM login as log INNER JOIN funcionario as fun ON (log.cpf_funcionario = fun.cpf)
WHERE fun.cpf = '{$_SESSION['cpf']}'");

$result = mysqli_fetch_assoc($sql);

$_SESSION['id_usuario'] = $result['id'];
$_SESSION['valor_usuario'] = $result['usuario'];
$_SESSION['validar_senha'] = $result['senha'];


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
<style>
  .meio {
    padding: 70px 430px;
  }
.formulario {
    width: 400px;
    padding: 30px;
    border:1px solid #ccc;
    background-color: white;
    border-radius: 25px;
     float: left;
   }


     
   input[type=password]{
    width: 100%;
    padding-left: 10px;
    height: 30px;
    line-height: 30px;
    border-radius: 15px;
    border: 1px solid #ccc;
    outline: none;
   }
   

   
    </style>
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

    <form id="alterar_senha" action="V_alterar-senha-usuarios.php" method="POST" class="formulario">
        <table>
            <tr>
                <td> <h1>Alterar Senha</h1> </td>
                <br>
</td>
</table>

            <h1>Usuario: <?php echo $_SESSION['valor_usuario']; ?></h1>
            <br>
        </div>
        <div>
            <strong><label>Digite sua nova Senha:</label></strong>
            <input class="input-group" type="password" name="alterarSenha" required placeholder="Insira a Nova Senha!!">
            <br>
        </div>
        <div>
            <strong><label>Confirme sua nova Senha:</label></strong>
            <input class="input-group"type="password" name="confirmarSenha" required placeholder="Confirmar a Senha!!">
            <br>
        </div>
        <div>
            <button class="btn btn-primary">Salve</button>
        </div>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>