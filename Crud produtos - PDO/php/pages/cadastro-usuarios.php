
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'):

            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            if (validateForm($dados)) :

                echo json_encode(['type'    => 'error',
                                  'message' => 'Erro : preencha todos os campos corretamente !'
                                 ]);
                return;

            elseif (!empty($dados['login']) && validadeLogin((string)$dados['login'])) :

                echo json_encode(['type'    => 'error',
                                  'message' => "Erro : login {$dados['login']} já existe, tente outro !"
                                 ]);
                return;

            else :

                if (usuarioCreate((string)$dados['login'],
                                  (string)$dados['nome'],
                                  (string)$dados['senha'],
                                  (string)$dados['email'],
                                  (string)$dados['permissao'])
                ) :

                    echo json_encode(['type'    => 'success',
                                      'message' => 'Usuário inserido com sucesso !'
                                     ]);
                    return;

                else :

                    echo json_encode(['type'    => 'error',
                                      'message' => 'Erro : não foi possível cadastrar esse usuário !'
                                     ]);
                    return;

                endif;
            endif;

        endif;
    ?>
