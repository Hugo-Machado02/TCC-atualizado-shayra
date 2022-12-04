<?php
//Tela de Validação das informações do usuario
use LDAP\Result;

session_start();
include('conexao_BD.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha3844-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../CSS_Hiago/cssHiago2.css"> 
    <title>Validar - Leitos</title>
</head>
<body>

    <?php

    if(empty($_POST['nome_paciente']) || empty($_POST['cpf_paciente']) || empty($_POST['leito'])){
        header('Location: P_ocupacao.php');
        exit();
    }

    $nome_paciente = mysqli_real_escape_string($conexao, $_POST['nome_paciente']);
    $cpf_paciente = mysqli_real_escape_string($conexao, $_POST['cpf_paciente']);
    $leito = mysqli_real_escape_string($conexao, $_POST['leito']);
    $_SESSION['idLeito'] = $leito;

    //verificação do CPF
    $verificarPaciente = "SELECT id, nome, cpf FROM paciente Where cpf = '$cpf_paciente'";
    $result = mysqli_query($conexao, $verificarPaciente);

	$resultValidacao = mysqli_fetch_assoc($result);
	$_SESSION['verificacao_ID'] = $resultValidacao['id'];
	$_SESSION['verificacao_nome'] = $resultValidacao['nome'];
	$_SESSION['cpfValidado'] = $resultValidacao['cpf'];

    if($cpf_paciente == $_SESSION['cpfValidado']){

        $sql = "UPDATE leitos SET id_paciente = '{$_SESSION['verificacao_ID']}' WHERE id_leitos='{$leito}';";
        $result2 = mysqli_query($conexao, $sql);

        if($result2 = true){
        ?>
        <div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">leito Atualizado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><?php echo $_SESSION['verificacao_nome']; ?> Adicionado a <?php echo $_SESSION['idLeito']; ?></p>
                </div>
                <div class="modal-footer">
                    <a href="P_indexrec.php"><button type="button" class="btn btn-primary">Fechar</button></a>
                </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('.modal').modal('show');
            });
        </script>

    <?php
    }
    else{
    ?>

    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Paciente Não adicionado ao leito</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>...</p>
            </div>
            <div class="modal-footer">
                <a href="P_ocupacao.php"><button type="button" class="btn btn-primary">Voltar</button></a>
            </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.modal').modal('show');
        });
    </script>

    <?php
        }
    } else{
    ?>
    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Paciente não encontrado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>...</p>
            </div>
            <div class="modal-footer">
                <a href="P_ocupacao.php"><button type="button" class="btn btn-primary">Voltar</button></a>
            </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.modal').modal('show');
        });
    </script>
    <?php
    }

    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>