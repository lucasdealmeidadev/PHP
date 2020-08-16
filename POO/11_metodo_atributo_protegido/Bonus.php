<?php

class Bonus extends Funcionario
{
    public function VerSalario()
    {
        parent::Bonus(2500);
        return parent::VerSalario();
    }
}
