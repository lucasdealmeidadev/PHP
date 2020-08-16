<?php

require('./Usuario.php');

$user = new Usuario();

$user->setUsuario('Lucas', 'lucas@gmail.com');

$user->setNota(6,4);

echo $user->getNota();