<?php
include ("conexao.php");
include ("medico.php");

$Pessoas1 = new Medico();
$Pessoas1->__getMedico();
$Pessoas1->__listMed();

?>