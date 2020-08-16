<?php

function validateForm(array $dados){

    $dados = array_map('strip_tags', $dados);
    $dados = array_map('trim', $dados);
    
    if(in_array('', $dados)){
        return true;
    }

    return false;
}