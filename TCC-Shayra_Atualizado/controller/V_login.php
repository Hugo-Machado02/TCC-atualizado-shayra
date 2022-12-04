<?php
//Tela de Validação das informações do usuario

use LDAP\Result;

session_start();
include('conexao_BD.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: ../index.php');
	exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

//pesquisa no Banco de Dados
$validar = mysqli_query($conexao, "SELECT fun.cpf, fun.nome_funcao FROM funcionario as fun INNER JOIN login as log ON (fun.cpf = log.cpf_funcionario)
WHERE log.usuario = '{$usuario}' AND log.senha = '{$senha}'");

$funcao = mysqli_fetch_assoc($validar);
$_SESSION['func_funcao'] = $funcao['nome_funcao'];
$_SESSION['func_cpf'] = $funcao['cpf'];


$row = mysqli_num_rows($validar);

if($row == 1) {
	if($_SESSION['func_funcao'] == 'Médico'){
		$sql = "SELECT fun.nome, med.crm, fun.cpf, fun.nome_funcao, fun.dt_nasc, med.especialidade FROM funcionario as fun  INNER JOIN medico as med ON (fun.cpf = med.cpf)
		WHERE fun.cpf = '{$_SESSION['func_cpf']}'";
	}
	if($_SESSION['func_funcao'] == 'Gestor'){
		$sql = "SELECT fun.nome, fun.cpf, fun.nome_funcao, fun.dt_nasc FROM funcionario as fun
		WHERE fun.cpf = '{$_SESSION['func_cpf']}'";
	}
	if($_SESSION['func_funcao'] == 'Recepção'){
		$sql = "SELECT rec.id, fun.nome, fun.cpf, fun.nome_funcao, fun.dt_nasc, rec.horaFuncionamento FROM funcionario as fun  INNER JOIN recepcao as rec ON (fun.cpf = rec.cpf)
		WHERE fun.cpf = '{$_SESSION['func_cpf']}'";
	}
	$result = mysqli_query($conexao, $sql);
	
	$usuario_bd = mysqli_fetch_assoc($result);
	$_SESSION['nome'] = $usuario_bd['nome'];

	$_SESSION['cpf'] = $usuario_bd['cpf'];
	$_SESSION['nome_funcao'] = $usuario_bd['nome_funcao'];
	$Nascimento_bd = $usuario_bd['dt_nasc'];
	
	$Nascimento_bd = explode('-', $Nascimento_bd);
    $ano = $Nascimento_bd[0];
    $mes = $Nascimento_bd[1];
    $dia = $Nascimento_bd[2];
	//Data Pronta para o Banco de dados
	$_SESSION['Nascimento'] = $dia."/".$mes."/".$ano;


	//Ir para a página do Recepcionista
	if($_SESSION['nome_funcao'] == 'Recepção'){
		echo $_SESSION['id_recepcao'] = $usuario_bd['id'];
		$_SESSION['funcionamento'] = $usuario_bd['horaFuncionamento'];
		header('Location: P_indexrec.php');
	}

	//ir para a página de Gestor
	if($_SESSION['nome_funcao']  == 'Gestor'){
		header('Location: P_indexadm.php');
	}

	//ir para a página de Médico
	if($_SESSION['nome_funcao'] == 'Médico'){
		$_SESSION['crmMedico'] = $usuario_bd['crm'];
		$_SESSION['Especialidade_Med'] = $usuario_bd['especialidade'];

		//Ir para a página do Médico
		header('Location: P_indexmed.php');
	}
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: ../index.php');
	exit();
}

?>