<?php

require_once('./Cliente.php');
require_once('./ClientePessoaFisica.php');
require_once('./ClientePessoaJuridica.php');

$cliente = new Cliente();

$cliente->setEndereco('Jacinto Ganzaroli');
$cliente->setBairro('Teissuke Kumassaka');

echo $cliente->verEndereco();

echo '</br>';

$clientePF = new ClientePessoaFisica();

$clientePF->setCpf(33644563453);
$clientePF->setNome('Cesar');
$clientePF->setEndereco('João da Costa Pimenta');
$clientePF->setBairro('Teissuke Kumassaka');

echo $clientePF->verEndereco();

echo '</br>';


$clientePJ = new ClientePessoaJuridica();

$clientePJ->setCnpj('43254562');
$clientePJ->setNomeFantasia('celke');
$clientePJ->setEndereco('Tudo Posso');
$clientePJ->setBairro('São João');

echo $clientePJ->verEndereco();