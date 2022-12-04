<?php
session_start();
include('conexao_BD.php');

if(empty($_POST['alterarSenha'])) {
	header('Location: V_alterar-senha-usuarios.php');
	exit();
}

$alterarSenha = mysqli_real_escape_string($conexao, $_POST['alterarSenha']);
$confirmarSenha = mysqli_real_escape_string($conexao, $_POST['confirmarSenha']);



if($alterarSenha == $confirmarSenha){
    //pesquisa no Banco de Dados
    if($alterarSenha == $_SESSION['validar_senha']){
        $_SESSION['V_senhas'] = 1;
        header('Location: janelaModal_senhas.php');
    }else{
        $alterar = "UPDATE login SET senha = '{$alterarSenha}' WHERE id = {$_SESSION['id_usuario']};";

        $result = mysqli_query($conexao, $alterar);
        if($result == true){
            $_SESSION['V_senhas'] = 2;
            header('Location: janelaModal_senhas.php');
	        exit();
        }
    }
}else{
    $_SESSION['V_senhas'] = 3;
	header('Location: janelaModal_senhas.php');
	exit();
}
?>