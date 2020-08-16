<?php

class ClientePessoaJuridica extends Cliente
{
    public $Cnpj;
    public $NomeFantasia;

    public function setCnpj($Cnpj)
    {
        $this->Cnpj = $Cnpj;
    }
    
    public function setNomeFantasia($NomeFantasia)
    {
        $this->NomeFantasia = $NomeFantasia;
    }

    public function verEndereco()
    {
        return "<p>Endereço da Pessoa Juridica: {$this->endereco}</br> Bairro : {$this->bairro}</br> Nome Fantasia: {$this->NomeFantasia} </br> CNPJ : {$this->Cnpj}</p>";
    }
}
