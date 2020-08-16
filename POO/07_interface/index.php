<?php

require_once('./Curso.php');
require_once('./CursoGraduacao.php');
require_once('./CursoPosGraduacao.php');

$CursoGraduacao = new CursoGraduacao();
$CursoPosGraduacao = new CursoPosGraduacao();

echo $CursoGraduacao->Disciplina('Acessibilidade');

echo '</br>';

echo $CursoGraduacao->Professor('Moares');

echo '</br></br>';

echo $CursoPosGraduacao->Disciplina('Matemática Discreta');

echo '</br>';

echo $CursoPosGraduacao->Professor('Adriana Lima');