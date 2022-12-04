<?php
session_start();
include("conexao_BD.php");
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
$senha2 = mysqli_real_escape_string($conexao, $_POST['confirmarSenha']);
$cpfFun = mysqli_real_escape_string($conexao, $_POST['cpfFun']);

if($senha == $senha2){
    //Inserir dados no Banco
	$sql = "INSERT INTO login(usuario, senha, data_cadastro, cpf_funcionario) VALUES
	('{$usuario}','{$senha}',NOW(),'{$cpfFun}')";
	
	$result = mysqli_query($conexao, $sql);

	if($result == true) {
		
		echo "Usuario Cadastrado";
		echo "<a href='../index.php'>Volta</a>";
	} else {
		echo "Usuario Não Cadastrado";
		echo "<a href='V_Cadastro.php'>Voltar</a>";
	}
    
} else{
    echo "Erro: Senhas diferentes";
    echo "<a href='P_alterar-senha-usuarios.php'><input type='button' value='Voltar'></a>";
}
?>