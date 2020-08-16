
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'):

            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            if (validateForm($dados)) :

                echo json_encode(['type' => 'error',
                                  'message' => 'Erro : preencha todos os campos corretamente !'
                                 ]);
                return;

            else :

                    if(productCreate((string)$dados['nome'], 
                                     (string)$dados['prec'], 
                                     (int)   $dados['qtd'], 
                                     (string)$dados['desc'])
                    ):

                        echo json_encode(['type'    => 'success',
                                          'message' => 'Produto inserido com sucesso !'
                                        ]);
                        return;
                    else:

                        echo json_encode(['type'    => 'error',
                                          'message' => 'Erro : não foi possível cadastrar esse produto !'
                                         ]);
                        return;
                    endif;
            endif;
                    
        endif;
    ?> 