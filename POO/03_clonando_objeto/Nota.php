<?php

class Nota
{
    public $aluno;
    public $prova;
    public $trabalho;
    public $disciplina;

    public function setProva($prova)
    {
        $this->prova = $prova;
    }

    public function setTrabalho($trabalho)
    {
        $this->trabalho = $trabalho;
    }

    public function setDisciplina($disciplina)
    {
        $this->disciplina = $disciplina;
    }

    public function getProva()
    {
        return $this->prova;
    }

    public function getTrabalho()
    {
        return $this->trabalho;
    }

    public function getDisciplina()
    {
        return $this->disciplina;
    }


    public function setNota($aluno, $disciplina, $prova, $trabalho)
    {
        $this->aluno = $aluno;
        $this->disciplina = $disciplina;
        $this->prova = $prova;
        $this->trabalho = $trabalho;
    }

    public function getNota()
    {
        return "Nome do aluno : {$this->aluno}<br> 
                Disciplina : {$this->disciplina}<br> 
                Nota : " . ($this->prova + $this->trabalho) / 2;
    }
}
