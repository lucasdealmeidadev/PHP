<?php

require_once('./Nota.php');

$nota = new Nota();

$nota->setNota('Lucas', 'Acessibilidade', 8, 7);

echo $nota->getNota();

/* Clonagem da Classe*/

echo '</br><hr>';

$nota2 = clone $nota;

$nota2->setDisciplina('Matemática');
$nota2->setTrabalho(3);
$nota2->setProva(6);

echo $nota2->getNota();