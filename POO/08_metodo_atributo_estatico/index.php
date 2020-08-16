<?php

require_once('./Disciplina.php');

$Disciplina = new Disciplina("Lucas de Almeida", 2, 7);

echo $Disciplina->Situacao();

echo '</br></br>';

echo Disciplina::SituacaoAluno();
