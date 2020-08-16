<?php

class Cliente
{
    public $endereco;
    public $bairro;

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    public function verEndereco()
    {
        return "<p>Endereço : {$this->endereco}</br> Bairro : {$this->bairro}</p>";
    }
}
