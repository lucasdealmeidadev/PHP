<?php

        require('php/functions/upload.php');

        if($_SERVER['REQUEST_METHOD'] == 'POST'):

            if ($_FILES['perfil']['name'] != '') {
                if (file_exists('imgs/' . $_POST['img_atual'])) {
                    unlink('imgs/' . $_POST['img_atual']);
                }
                $upload = upload($_FILES['perfil']);

                if ($upload == true) {
                    $perfil = $_FILES['perfil']['name'];
                } else {
                    echo json_encode(['type'    => 'error', 'message' => $upload]);
                }

            } else {
                $perfil = $_POST['img_atual'];
            }

            if ($_POST['senha'] != '') {
                $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            } else {
                $senha = $_POST['senha_atual'];
            }

            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            if (alterPerfil(
                (string) $dados['login'],
                (string) $dados['nome'],
                (string) $senha,
                (string) $perfil
            )) :

                echo json_encode(['type' => 'success', 'message' => 'Usuário alterado com sucesso !']);
                    return;
            else:

                echo json_encode(['type' => 'error',
                                    'message' => 'Erro : não foi possível alterar esse usuário !'
                                ]);
                        return;
            endif;

        endif;


    ?>