<?php

require_once('./Funcionario.php');
require_once('./Bonus.php');

$Funcionario = new Bonus();
$Funcionario->setNome('Cesar');
$Funcionario->setSalario(5200);

echo $Funcionario->VerSalario();