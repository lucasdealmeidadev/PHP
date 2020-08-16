<?php

class CursoGraduacao implements Curso
{
    public $Disciplina;
    public $Professor;

    public function Disciplina($Disciplina)
    {
        $this->Disciplina = $Disciplina;

        return "Disciplina : {$this->Disciplina}";
    }

    public function Professor($Professor)
    {
        $this->Professor = $Professor;

        return "Nome professor : {$this->Professor}";
    }
}
