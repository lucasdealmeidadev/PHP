<?php

class ChequeComun extends Cheque
{
    public function CalcularJuros()
    {
        $this->Valor = $this->Valor * 1.25;

        $this->Valor = parent::Real($this->Valor);

        return "Valor do cheque {$this->Tipo} : R$ {$this->Valor}";
    }
}
