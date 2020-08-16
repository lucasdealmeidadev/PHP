<?php

class Usuario
{
    public $nome, $email, $prova, $trabalho;

    public function setUsuario($nome, $email)
    {
        $this->nome = $nome;
        $this->email = $email;
    }

    public function getUsuario()
    {
        return "Nome : {$this->nome} E-mail : {$this->email}";
    }

    public function setNota($nota, $trabalho)
    {
        $this->nota = $nota;
        $this->trabalho = $trabalho;
    }

    public function getNota()
    {
        return "Nota do trabalho = ".($this->nota + $this->trabalho);
    }
}