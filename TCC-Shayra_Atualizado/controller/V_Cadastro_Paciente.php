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
    <title>Validar - Cadastro Paciente</title>
</head>
<body>

    <?php

    if(empty($_POST['cpfRecepcionista'] == $_SESSION['cpf'])){
        header('Location: P_cadastro_Paciente.php');
        exit();
    }

    $nomePaciente = mysqli_real_escape_string($conexao, $_POST['nomePaciente']);
    $cpfPaciente = mysqli_real_escape_string($conexao, $_POST['cpfPaciente']);
    $TelPaciente = mysqli_real_escape_string($conexao, $_POST['telefonePaciente']);
    $nascPaciente = mysqli_real_escape_string($conexao, $_POST['dtNascimento']);
    $situacao = mysqli_real_escape_string($conexao, $_POST['situacaoPaciente']);
    $planoSaude = mysqli_real_escape_string($conexao, $_POST['planoSaude']);
    $parente = mysqli_real_escape_string($conexao, $_POST['parentePaciente']);
        $resultNasc =explode('/', $nascPaciente);
        $dia = $resultNasc[0];
        $mes = $resultNasc[1];
        $ano = $resultNasc[2];
    //Data Pronta para o Banco de dados
    $nascPaciente = $ano."-".$mes."-".$dia;


    //Inserção ao Banco de Dados
    $sql1 = "INSERT INTO paciente (cpf, nome, telefone, dt_nasc, situacao, plano_saude, parente) VALUES ('{$cpfPaciente}', '{$nomePaciente}', '{$TelPaciente}', '{$nascPaciente}', '{$situacao}', '{$planoSaude}', '{$parente}')";
    
    $result = mysqli_query($conexao, $sql1);

    if($result == true){

        $sql2 = mysqli_query($conexao, "SELECT id FROM paciente WHERE cpf = '{$cpfPaciente}'");
        $validar = mysqli_fetch_assoc($sql2);
        $_SESSION['id_pesquisa'] = $validar['id'];

        $sql3 = "INSERT INTO cad_paciente (id_recepcao, id_paciente, dt_cad) VALUES ('{$_SESSION['id_recepcao']}', '{$_SESSION['id_pesquisa']}', NOW())";
        $result2 = mysqli_query($conexao, $sql3);

        if($result2 = true){
        ?>
        <div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Paciente cadastrado com Sucesso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> <?php echo $nomePaciente?></p>
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
                <h5 class="modal-title">Cadastro não realizado mais o usuario sim</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>...</p>
            </div>
            <div class="modal-footer">
                <a href="P_cadastro_Paciente.php"><button type="button" class="btn btn-primary">Voltar</button></a>
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
                <h5 class="modal-title">Cadastro não realizado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>...</p>
            </div>
            <div class="modal-footer">
                <a href="P_cadastro_Paciente.php"><button type="button" class="btn btn-primary">Voltar</button></a>
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