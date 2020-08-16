<?php

class Usuario 
{
    public $nome, $email;

    public function getDadosUser($nome, $email)
    {   
        return "O usuário {$nome} tem o e-mail {$email}";
    }
}