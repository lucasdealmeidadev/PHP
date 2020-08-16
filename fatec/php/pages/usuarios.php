<div class="col sm-12" style="margin: 10px">
    <a href="javascript:modalAcoesUser();" class="waves-effect waves-light btn right modal-trigger"><i
            class="material-icons left">add</i> Cadastrar usuarios</a>

</div>

<div class="container" style="margin-top: 2em; margin-bottom: 2em">

    <div id="modal_user" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h5 style="text-transform: uppercase; font-weight: 400;"><i class="small material-icons">add_circle</i>
                Cadastro de usuário</h5>

            <form method="POST" name="formUser" action="cadastro_usuarios" class="col s12" id="cad-usuarios"
                enctype="multipart/form-data">

                <div class="row">
                    <div class="input-field col s12">
                        <input type="file" name="perfil" id="perfil">
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" name="login" id="login" class="validate" value="">
                        <label for="login">login : </label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input type="password" name="senha" id="senha" class="validate" value="">
                        <label for="senha">Senha :</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" name="nome" id="nome" class="validate" value="">
                        <label for="nome">Nome completo :</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input type="email" name="email" id="email" class="validate" value="">
                        <label for="email">E-mail :</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <select name="permissao" id="permissao" class="validate">
                            <option value="" selected>Permissão</option>
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

        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">FECHAR</a>
        </div>
    </div>

    <h5 style="text-transform: uppercase; font-weight: 600;"><i class="small material-icons">account_circle</i> Lista de
        usuários</h5>

    <div id="modal-produtos">
        <div id="modal" class="modal">
            <div class="modal-content">
                <h4 id='titulo-produto'></h4>
            </div>
            <div class="modal-footer" id="btn-acoes-modal">

            </div>
        </div>
    </div>

    <div id="modal_usuario_altera" class="modal modal-fixed-footer">
        <div class="modal-content">

            <h5 style="text-transform: uppercase; font-weight: 400;"><i class="small material-icons">border_color</i>
                Alterar usuário</h5>

            <div id="form"></div>

        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">FECHAR</a>
        </div>
    </div>

    <?php
	 /* Constantes de configuração */  
	 define('QTDE_REGISTROS', 2);   
	 define('RANGE_PAGINAS', 1);  
	   
	 /* Recebe o número da página via parâmetro na URL */  
	 $pagina_atual = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;   
	   
	 /* Calcula a linha inicial da consulta */  
	 $linha_inicial = ($pagina_atual -1) * QTDE_REGISTROS;  
	   
	 /* Instrução de consulta para paginação com MySQL */  
	 $dados = usersList($linha_inicial, QTDE_REGISTROS);   
	   
	 /* Conta quantos registos existem na tabela */   
	 $valor = usersCount();   
	   
	 /* Idêntifica a primeira página */  
	 $primeira_pagina = 1;   
	   
	 /* Cálcula qual será a última página */  
	 $ultima_pagina  = ceil($valor['total_registros'] / QTDE_REGISTROS);   
	   
	 /* Cálcula qual será a página anterior em relação a página atual em exibição */   
	 $pagina_anterior = ($pagina_atual > 1) ?  $pagina_atual-1 :  1;   
	   
	 /* Cálcula qual será a pŕoxima página em relação a página atual em exibição */   
	 $proxima_pagina = ($pagina_atual < $ultima_pagina) ? $pagina_atual +1 :  $pagina_atual;  
	   
	 /* Cálcula qual será a página inicial do nosso range */    
	 $range_inicial  = (($pagina_atual - RANGE_PAGINAS) >= 1) ? $pagina_atual - RANGE_PAGINAS : 1 ;   
	   
	 /* Cálcula qual será a página final do nosso range */    
	 $range_final   = (($pagina_atual + RANGE_PAGINAS) <= $ultima_pagina ) ? $pagina_atual + RANGE_PAGINAS : $ultima_pagina ;   
	   
	 /* Verifica se vai exibir o botão "Primeiro" e "Pŕoximo" */   
	 $exibir_botao_inicio = ($range_inicial < $pagina_atual) ? 'mostrar' : 'esconder'; 
	   
	 /* Verifica se vai exibir o botão "Anterior" e "Último" */   
	 $exibir_botao_final = ($range_final > $pagina_atual)    ? 'mostrar' : 'esconder';  
 	?>
    <table class="responsive-table highlight" id="lista-usuarios">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Login</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Permissão</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

            <?php
        if(!empty($dados)):
            
			foreach($dados as $row):

                echo "<tr>";
                if (!file_exists('imgs/' . $row['img_perfil']) || $row['img_perfil'] == '') {
                    echo '<td><img src="img/user.png"></td>';
                } else {
                    echo '<td><img src="imgs/' . $row['img_perfil'] . '" width="32"></td>';
                }
                echo    "<td>{$row['login']}</td>
			            <td>{$row['nome']}</td>
			            <td>{$row['email']}</td>
			            <td>{$row['permissao']}</td>
						<td>	
								<i class='material-icons tooltipped' data-position='top' data-tooltip='Alterar usuário'>
									<a href='javascript:alteraUsuario(" . json_encode($row['login']) .");' style='color: #000'>assignment</a>
								</i>

								<i class='material-icons tooltipped' data-position='top' data-tooltip='Excluir usuário'>
									<a href='javascript:deleteUsuario(" . json_encode($row['login']) .")' style='color: #000'>delete_forever</a>
								</i>
						</td>
					 </tr>";

			endforeach;

		else: 

			echo '<tr>
	            	<td colspan="6" class="center">Nenhum usuário foi encontrado...</td>
	        	 </tr>';

		endif;
	?>

        </tbody>
    </table>


    <?php if(!empty($dados)) : ?>

    <div class='box-paginacao'>

        <a class='box-navegacao <?=$exibir_botao_inicio?>'
            href="<?= basename($_SERVER['PHP_SELF'],'.php') ?>?page=<?=$primeira_pagina?>"
            title="Primeira Página">Primeira</a>

        <a class='box-navegacao <?=$exibir_botao_inicio?>'
            href="<?= basename($_SERVER['PHP_SELF'],'.php') ?>?page=<?=$pagina_anterior?>"
            title="Página Anterior">Anterior</a>

        <?php  
		      /* Loop para montar a páginação central com os números */   
		      for ($i=$range_inicial; $i <= $range_final; $i++) : 
		      		$destaque = ($i == $pagina_atual) ? 'destaque' : '' ;  
		    ?>
        <a class='box-numero <?=$destaque?>'
            href="<?= basename($_SERVER['PHP_SELF'],'.php') ?>?page=<?=$i?>"><?=$i?></a>
        <?php endfor; ?>

        <a class='box-navegacao <?=$exibir_botao_final?>'
            href="<?= basename($_SERVER['PHP_SELF'],'.php') ?>?page=<?=$proxima_pagina?>"
            title="Próxima Página">Próxima</a>
        <a class='box-navegacao <?=$exibir_botao_final?>'
            href="<?= basename($_SERVER['PHP_SELF'],'.php') ?>?page=<?=$ultima_pagina?>"
            title="Última Página">Último</a>
    </div>

    <?php endif;?>


</div>