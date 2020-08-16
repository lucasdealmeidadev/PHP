<div class="col sm-12" style="margin: 10px">
		<a href="index" class="waves-effect waves-light btn right"><i class="material-icons left">reply_all</i> Voltar</a>
</div>

<div class="container responsive-table" style="margin-top: 2em">

	<h5 style="text-transform: uppercase; font-weight: 600;"><i class="small material-icons">add_shopping_cart</i> Cadastro de produtos</h5>

	<div class="row">

		<?php
			if(isset($_POST['sendCad'])):

                $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                if (validateForm($dados)) :

                    message('Erro preencha todos os campos corretamente !', 'error');

                    $exibe = ['nome'       => $dados['nome'], 
                              'preco'      => $dados['prec'],
                              'quantidade' => $dados['qtd'],
                              'descricao'  => $dados['desc'],
                             ];
                
				else :

                        if(productCreate((string)$dados['nome'], 
                                         (string)$dados['prec'], 
                                         (int)   $dados['qtd'], 
                                         (string)$dados['desc']
                                        )):

							message('Produto inserido com sucesso !', 'success');
	            		else:

	            			message('Ocorreu um erro ao inserir o produto!', 'error');
						endif;
				endif;
					
			endif;

			if (isset($_SESSION['alert'])) :

				echo $_SESSION['alert'];
				unset($_SESSION['alert']);
            endif;
		?> 

        <form method="POST" action="cadastro" class="col s12">                  

            <div class="row">                                                                   
                <div class="input-field col s12">
                    <input type="text" name="nome" id="nome" class="validate" value="<?= !empty($exibe['nome']) ? $exibe['nome'] : NULL?>">
                    <label for="nome">Nome completo do produto : </label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="prec" id="prec" class="validate" onkeyup="k(this);" value="<?= !empty($exibe['preco']) ? $exibe['preco'] : NULL?>">
                    <label for="preco">Informe o preço deste produto :</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s12">
                    <input type="number" name="qtd" id="qtd" class="validate" value="<?= !empty($exibe['quantidade']) ? $exibe['quantidade'] : NULL?>">
                    <label for="qtd">Informe a quantidade deste produto disponível em estoque :</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="desc" id="desc" class="validate" value="<?= !empty($exibe['descricao']) ? $exibe['descricao'] : NULL?>">
                    <label for="desc">Faça uma preve descrição deste produto :</label>
                </div>
            </div>

            <div class="row center">
                <button type="submit" name="sendCad" value="Cadastrar" class="btn waves-effect waves-light"><i class="material-icons right">send</i> Cadastrar</button>
            </div>

        </form>
    </div>
</div>