<?php

class Disciplina
{
    public $Aluno;
    public $NotaTrabalho;
    public $NotaProva;
    public static $Media = 8;

    public function __construct($Aluno, $NotaTrabalho, $NotaProva)
    {
        $this->Aluno = $Aluno;
        $this->NotaTrabalho = $NotaTrabalho;
        $this->NotaProva = $NotaProva;

        self::$Media = ($this->NotaProva + $this->NotaTrabalho);
    }

    public function Situacao()
    {
        if (self::$Media >= 7) :

            return "Aluno(a) {$this->Aluno} está <strong>Aprovado</strong> com à média " . self::$Media;
        else :

            return "Aluno(a) {$this->Aluno} está <strong>Reprovado</strong> com à média " . self::$Media;
        endif;
    }

    public function SituacaoAluno()
    {
        if (self::$Media >= 7) :

            return "Média " . self::$Media;
        else :

            return "Média " . self::$Media;
        endif;
    }
}
