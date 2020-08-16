<?php

    $id = (string) $_GET['id_delete'];

    if(isset($id) && is_string($id)) :
        
        if(userDelete($id)) :

            message('Usuário excluído com sucesso !', 'success');
            header('location:usuarios');
        else :

            message('Ocorreu um erro ao excluir o usuário!', 'error');
            header('location:usuarios');
        endif;    
    endif;
