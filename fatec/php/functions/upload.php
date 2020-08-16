<?php

    function validateUpload(array $file): string
    {
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $extension = strtolower($extension);                                                                                                                                                           
 
        if(!empty($file) && $file['error'] != 0){
            return 'Erro : Não foi possível realizar o upload!';
        }

        if($file['size'] == 0){
            return 'Erro : Tamanho do arquivo é igual a zero!';
        }

        if($file['size'] > 100000){
            return 'Erro : Tamanho maior que o permitido (100 kbytes)';
        }

        if(!strstr( '.jpg;.jpeg;.pjpeg;.gif;.png;.bmp', $extension)){
           return 'Erro : Formato do arquivo é inválido!';
        }
        return true;
    }

    function upload(array $file): string
    {

        if (validateUpload($file) == 1) {
            $dir  = 'imgs/' . $file['name'];

            if(move_uploaded_file($file['tmp_name'], $dir)){
                return true;
            }
            else{
                return 'Erro : Não foi possível enviar o arquivo para o destino!';
            }

        } else {
            return validateUpload($file);
        }  

        
    }