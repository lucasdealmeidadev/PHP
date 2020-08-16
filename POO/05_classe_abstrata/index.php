<?php

require_once('./Cheque.php');
require_once('./ChequeComun.php');
require_once('./ChequeEspecial.php');


$chequeC = new ChequeComun(150.89, 'Comun');
echo $chequeC->CalcularJuros();

echo '</br></br>';

$chequeF = new ChequeEspecial(120.89, 'Especial');
echo $chequeF->CalcularJuros();