<?php

abstract class Cheque
{
        public $Valor;
        public $Tipo;

        public function __construct($Valor, $Tipo)
        {
            $this->Valor = $Valor;
            $this->Tipo = $Tipo;
        }

        abstract function CalcularJuros();
        
        final public function Real($valor)
        {
           return number_format($valor, '2', ',', '.');
        }
}
