    <?php
        if(isset($_GET['id_altera']) && userRead((string)$_GET['id_altera'])):

            $usuario = userRead((string)$_GET['id_altera']);

            if(!empty($usuario)) :

                echo json_encode(['dados' => $usuario]);
                return;
            else:   

                echo json_encode(['type'    => 'error',
                                  'message' => 'Erro : nenhum usuario foi encontrado !'
                                ]);
                return;
            endif;
        endif;


        if(isset($_GET['alterar_usuario']) == 'sim'):

            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            

            if (empty($dados['nova_s'])) :

                unset($dados['nova_s']);

            endif;

            if (validateForm($dados)) :

                echo json_encode(['type'    => 'error',
                                  'message' => 'Erro : preencha todos os campos corretamente !'
                                 ]);
                return;

            elseif(!empty($dados['login']) && validadeLoginAlter((string) $dados['login'], (string)$dados['id'])) :

                echo json_encode(['type'    => 'error',
                                  'message' => "Erro : login {$dados['login']} já existe, tente outro !"
                                 ]);
                return;

            else :

                    if (userAlter(
                        (string) $dados['id'],
                        (string) $dados['login'],
                        (string) $dados['nome'],
                        (!empty( $dados['nova_s'])) ? $dados['nova_s'] : '',
                        (string) $dados['senha_atual'],
                        (string) $dados['email'],
                        (string) $dados['permissao']
                    )) :

                        echo json_encode(['type'    => 'success',
                                          'message' => 'Usuário alterado com sucesso !'
                                        ]);
                        return;
                    else:

                        echo json_encode(['type'    => 'error',
                                          'message' => 'Erro : não foi possível alterar esse usuário !'
                                         ]);
                        return;
                    endif;
            endif;

        endif;


    ?>