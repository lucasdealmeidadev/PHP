<?php

class Funcionario
{
    public $Nome;
    public $Salario;

    public function setNome($Nome)
    {
        $this->Nome = $Nome;
    }

    public function setSalario($Salario)
    {
        $this->Salario = $Salario;
    }

    public function VerSalario()
    {
        $this->Salario = $this->ValidarSalario($this->Salario);

        return "O funcionário {$this->Nome} tem o salário de R$ {$this->Salario}";
    }

    public function ValidarSalario($Salario)
    {
        if (is_numeric($Salario) and ($Salario > 0)) :

            return number_format($Salario, '2', ',', '.');
        else :

            die('Salário inválido');
        endif;
    }
}
