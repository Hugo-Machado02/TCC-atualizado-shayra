<?php
//Tela de Conexao com o Banco de Dados
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'hospital');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar ao Banco de Dados!!');
mysqli_set_charset($conexao, 'utf8');
?>