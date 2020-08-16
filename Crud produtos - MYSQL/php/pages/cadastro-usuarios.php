<div class="col sm-12" style="margin: 10px">
    <a href="usuarios" class="waves-effect waves-light btn right"><i class="material-icons left">reply_all</i>
        Voltar</a>
</div>

<div class="container responsive-table" style="margin-top: 2em">

    <h5 style="text-transform: uppercase; font-weight: 600;"><i class="small material-icons">add_circle</i> Cadastro de
        usuarios</h5>

    <div class="row">

        <?php
			if(isset($_POST['sendCad'])):

                $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                if (validateForm($dados)) :

                    message('Erro preencha todos os campos corretamente !', 'error');

                    $exibe = ['login'     => $dados['login'], 
                              'senha'     => $dados['senha'],
                              'nome'      => $dados['nome'],
                              'email'     => $dados['email'],
                              'permissao' => $dados['permissao']
                             ];
                
                elseif(!empty($dados['login']) && mysqli_num_rows(validadeLogin((string) $dados['login'])) > 0) :
                    
                    $exibe = ['login'     => $dados['login'], 
                              'senha'     => $dados['senha'],
                              'nome'      => $dados['nome'],
                              'email'     => $dados['email'],
                              'permissao' => $dados['permissao']
                             ];
                             
                            message("Erro login <strong>{$dados['login']}</strong> já existe, tente outro !", 'error');
                
				else :

                        if(usuarioCreate((string)$dados['login'], 
                                         (string)$dados['nome'], 
                                         (string)$dados['senha'], 
                                         (string)$dados['email'],
                                         (string)$dados['permissao']
                                        )):

							message('Usuário inserido com sucesso !', 'success');
	            		else:

	            			message('Ocorreu um erro ao inserir o usuário!', 'error');
						endif;
				endif;
					
			endif;

			if (isset($_SESSION['alert'])) :

				echo $_SESSION['alert'];
				unset($_SESSION['alert']);
            endif;
		?>

        <form method="POST" action="cadastro_usuarios" class="col s12">

            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="login" id="login" class="validate"
                        value="<?= !empty($exibe['login']) ? $exibe['login'] : NULL?>">
                    <label for="login">login : </label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input type="password" name="senha" id="senha" class="validate"
                        value="<?= !empty($exibe['senha']) ? $exibe['senha'] : NULL?>">
                    <label for="senha">Senha :</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="nome" id="nome" class="validate"
                        value="<?= !empty($exibe['nome']) ? $exibe['nome'] : NULL?>">
                    <label for="nome">Nome completo :</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input type="email" name="email" id="email" class="validate"
                        value="<?= !empty($exibe['email']) ? $exibe['email'] : NULL?>">
                    <label for="email">E-mail :</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <select name="permissao" id="permissao" class="validate">
                        <option value="<?= !empty($exibe['permissao']) ? $exibe['permissao'] : NULL?>" selected>Permissão</option>
                        <option value="Admin">Admin</option>
                        <option value="Normal">Normal </option>
                        <option value="Leitura">Leitura </option>
                    </select>
                    <label>Permissão</label>
                </div>
            </div>

            <div class="row center">
                <button type="submit" name="sendCad" value="Cadastrar" class="btn waves-effect waves-light"><i
                        class="material-icons right">send</i> Cadastrar</button>
            </div>

        </form>
    </div>
</div>