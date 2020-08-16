
   <?php
		if(isset($_GET['id_altera']) && produtRead((int)$_GET['id_altera'])):

			$produto = produtRead((int)$_GET['id_altera']);

			if(!empty($produto)) :

				echo json_encode(['dados' => $produto]);
				return;
			else:	

				echo json_encode(['type'    => 'error',
                              	  'message' => 'Erro : nenhum produto foi encontrado !'
                                ]);
				return;
			endif;
		endif;


		if(isset($_GET['alterar_produto']) == 'sim'):

			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            if (validateForm($dados)) :

                echo json_encode(['type'    => 'error',
                                  'message' => 'Erro : preencha todos os campos corretamente !'
                                 ]);
                return;

            else :

                    if (productAlter(
                        (int)    $dados['id-prod'],
                        (string) $dados['nome'],
                        (string) $dados['prec'],
                        (int)    $dados['qtd'],
                        (string) $dados['desc']
                    )) :

                        echo json_encode(['type'    => 'success',
                                          'message' => 'Produto alterado com sucesso !'
                                        ]);
                        return;
                    else:

                        echo json_encode(['type'    => 'error',
                                          'message' => 'Erro : não foi possível alterar esse produto !'
                                         ]);
                        return;
                    endif;
            endif;

		endif;	


	?>