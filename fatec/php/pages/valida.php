
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'):

            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            if (validateForm($dados)) :

                echo json_encode(['type'    => 'error',
                                  'message' => 'Erro : preencha todos os campos corretamente !'
                                 ]);
                return;

            else :

                    if(login((string) $dados['login'], 
                             (string) $dados['senha'])
                    ):

                        echo json_encode(['type'    => 'success',
                                          'message' => ''
                                        ]);
                        return;
                    else:

                        echo json_encode(['type'    => 'error',
                                          'message' => 'Erro : usuário e senha estão incorretos!'
                                         ]);
                        return;
                    endif;
            endif;
                    
        endif;
    ?> 