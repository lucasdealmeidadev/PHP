<?php

class ClientePessoaFisica extends Cliente
{
    public $nome;
    public $cpf;

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function verEndereco()
    {
        return "<p>Endereço da Pessoa Fisica: {$this->endereco}</br> Bairro : {$this->bairro}</br> Nome : {$this->nome} </br> CPF : {$this->cpf}</p>";
    }
}
