<?php

require_once('./Usuario.php');

$user = new Usuario();

echo $user->getDadosUser('Lucas', 'lucas@gmail.com');