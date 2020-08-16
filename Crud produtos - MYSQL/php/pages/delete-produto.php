<?php

    $id = (int) $_GET['id_delete'];

    if(isset($id) && is_int($id)) :
        
        if(productDelete($id)) :

            message('Produto excluído com sucesso !', 'success');
            header('location:index');
        else :

            message('Ocorreu um erro ao excluir o produto!', 'error');
            header('location:index');
        endif;    
    endif;
