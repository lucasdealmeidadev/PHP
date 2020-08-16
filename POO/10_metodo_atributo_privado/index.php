<?php

require_once('./Funcionario.php');

$Funcionario = new Funcionario();
$Funcionario->setNome('Lucas');
$Funcionario->setSalario(5200);

echo $Funcionario->VerSalario();