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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha3844-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <title>Validação - Cadastro Médico</title>
</head>
<body>
    <?php
    if(empty($_POST['cpfGestao']) || empty($_POST['cpf']) || empty($_POST['crm'])){
        header('Location: P_cadastro_Medico.php');
        exit();
    }

    $nomeMed = mysqli_real_escape_string($conexao, $_POST['NomeMedico']);
    $crmMed = mysqli_real_escape_string($conexao, $_POST['crm']);
    $cpfMed = mysqli_real_escape_string($conexao, $_POST['cpf']);
    $especialidade = mysqli_real_escape_string($conexao, $_POST['Especialidade']);
    $salarioMed = mysqli_real_escape_string($conexao, $_POST['salario']);
    $cpfGestao = mysqli_real_escape_string($conexao, $_POST['cpfGestao']);
    $nascimentoMed = mysqli_real_escape_string($conexao, $_POST['Nascimento']);
        $resultNasc =explode('/', $nascimentoMed);
        $dia = $resultNasc[0];
        $mes = $resultNasc[1];
        $ano = $resultNasc[2];
    //Data Pronta para o Banco de dados
    $nascimentoMed = $ano."-".$mes."-".$dia;


    //Inserção ao Banco de Dados
    $sql1 = "INSERT INTO funcionario (cpf, nome, nome_funcao, dt_nasc, salario, id_hospital) VALUES ('{$cpfMed}', '{$nomeMed}', 'Médico', '{$nascimentoMed}', '{$salarioMed}', 1)";

    $sql2 = "INSERT INTO medico (crm, cpf, especialidade) VALUES ('{$crmMed}', '{$cpfMed}', '{$especialidade}')";

    $sql3 = "INSERT INTO administricao_med (cpf_adm, crm_med) VALUES ('{$cpfGestao}', '{$crmMed}')";

    $result1 = mysqli_query($conexao, $sql1);
    $result2 = mysqli_query($conexao, $sql2);
    $result3 = mysqli_query($conexao, $sql3);

    if($result1 == true || $result2 == true || $result3 == true) {
    ?>
    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastro Realizado com Sucesso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> <?php echo $nomeMed?></p>
            </div>
            <div class="modal-footer">
                <a href="P_indexadm.php"><button type="button" class="btn btn-primary">Voltar</button></a>
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
    } else {
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
                <a href="P_cadastro_Medico.php"><button type="button" class="btn btn-primary">Voltar</button></a>
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