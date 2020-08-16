<?php
	if($_SESSION['permissao'] != 'Leitura'){
?>
	<div class="col sm-12" style="margin: 10px">
			<a href="javascript:modalAcoes();" class="waves-effect waves-light btn right modal-trigger"><i class="material-icons left">add</i> Cadastrar produto</a>
	</div>
<?php }?>

<div class="container" style="margin-top: 2em; margin-bottom: 2em">

	<?php
		if($_SESSION['permissao'] != 'Leitura'){
	?>

	<div id="modal_produto" class="modal modal-fixed-footer">
	    <div class="modal-content">
	       <h5 style="text-transform: uppercase; font-weight: 400;"><i class="small material-icons">add_circle</i> Cadastro de produto</h5>
	      
	       	<div id="view"></div>

	        <form method="POST" action="cadastro" class="col s12" id="cad-produto">                  
	            <div class="row">                                                           
	                <div class="input-field col s12">
	                    <input type="text" name="nome" id="nome" class="validate" value="">
	                    <label for="nome">Nome completo do produto : </label>
	                </div>
	            </div>

	            <div class="row">
	                <div class="input-field col s12">
	                    <input type="text" name="prec" id="prec" class="validate" onkeyup="k(this);" value="">
	                    <label for="preco">Informe o preço deste produto :</label>
	                </div>
	            </div>


	            <div class="row">
	                <div class="input-field col s12">
	                    <input type="number" name="qtd" id="qtd" class="validate" value="" min="0">
	                    <label for="qtd">Informe a quantidade deste produto disponível em estoque :</label>
	                </div>
	            </div>

	            <div class="row">
	                <div class="input-field col s12">
	                    <input type="text" name="desc" id="desc" class="validate" value="">
	                    <label for="desc">Faça uma preve descrição deste produto :</label>
	                </div>
	            </div>

		        <div class="row center">
		                <button type="submit" class="btn waves-effect waves-light"><i class="material-icons right">send</i> Cadastrar</button>
		        </div>

	        </form>
	    </div>

	    <div class="modal-footer">
	      <a href="#!" class="modal-close waves-effect waves-green btn-flat">FECHAR</a>
	    </div>
	</div>

	
	<div id="modal_produto_altera" class="modal modal-fixed-footer">
	    <div class="modal-content">
	      
	       <h5 style="text-transform: uppercase; font-weight: 400;"><i class="small material-icons">border_color</i> Alterar produto</h5>
	      
	       	<div id="form"></div>

	    </div>
	    <div class="modal-footer">
	      <a href="#!" class="modal-close waves-effect waves-green btn-flat">FECHAR</a>
	    </div>
	</div>

	<?php }?>
	
	<h5 style="text-transform: uppercase; font-weight: 600;"><i class="small material-icons">add_shopping_cart</i> Lista de produtos</h5>


	<div id="modal-produtos">
		<div id="modal" class="modal">
            <div class="modal-content">
                <h4 id='titulo-produto'></h4>
            </div>
			<div class="modal-footer" id="btn-acoes-modal">

   			</div>
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
	 $dados = productsList($linha_inicial, QTDE_REGISTROS);   
	   
	 /* Conta quantos registos existem na tabela */   
	 $valor = productsCount();   
	   
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

	<table class="responsive-table highlight" id="lista-produtos">
	    <thead>
	        <tr>
	            <th>ID</th>
	            <th>Nome</th>
	            <th>Preço</th>
	            <th>Quantidade</th>
	            <th>Criado</th>

	            <?php if($_SESSION['permissao'] != 'Leitura') :?>

					<th>Ações</th>

				<?php endif;?>

	        </tr>
	    </thead>

	    <tbody>

	<?php
		if(!empty($dados)):

			foreach($dados as $row):

				echo "<tr>
						<td>{$row['id']}</td>
			            <td>{$row['nome']}</td>
			            <td>{$row['preco']}</td>
			            <td>{$row['quantidade']}</td>
			            <td>
			            		" . 
			            			date('d/m/Y', strtotime($row['dataCadastro'])) . ' às ' .  
			            	        date('H:i:s', strtotime($row['dataCadastro']))
			            	       .
			            	    "
						</td><td>"; 

							if($_SESSION['permissao'] != 'Leitura') :

								echo "
									<i class='material-icons tooltipped' data-position='top' data-tooltip='Alterar produto'>
										<a href='javascript:alteraProduto({$row['id']});' style='color: #000'>assignment</a>
									</i>

									<i class='material-icons tooltipped' data-position='top' data-tooltip='Excluir produto'>
										<a href='javascript:deleteProduto({$row['id']});' style='color: #000'>delete_forever</a>
									</i>";

							endif;	

				echo "</td></tr>";

			endforeach;

		else: 

			echo '<tr>
	            	<td colspan="6" class="center">Nenhum produto foi encontrado...</td>
	        	 </tr>';

		endif;
	?>

	    </tbody>
	</table>


	<?php if(!empty($dados)) : ?>

		<div class='box-paginacao'>     
		    
		    <a class='box-navegacao <?=$exibir_botao_inicio?>' href="<?= basename($_SERVER['PHP_SELF'],'.php') ?>?page=<?=$primeira_pagina?>" title="Primeira Página">Primeira</a>    
		    
		    <a class='box-navegacao <?=$exibir_botao_inicio?>' href="<?= basename($_SERVER['PHP_SELF'],'.php') ?>?page=<?=$pagina_anterior?>" title="Página Anterior">Anterior</a>     
		   
		    <?php  
		      /* Loop para montar a páginação central com os números */   
		      for ($i=$range_inicial; $i <= $range_final; $i++) : 
		      		$destaque = ($i == $pagina_atual) ? 'destaque' : '' ;  
		    ?>   
		        <a class='box-numero <?=$destaque?>' href="<?= basename($_SERVER['PHP_SELF'],'.php') ?>?page=<?=$i?>"><?=$i?></a>    
		    <?php endfor; ?>    
		   
		    <a class='box-navegacao <?=$exibir_botao_final?>' href="<?= basename($_SERVER['PHP_SELF'],'.php') ?>?page=<?=$proxima_pagina?>" title="Próxima Página">Próxima</a>    
		    <a class='box-navegacao <?=$exibir_botao_final?>' href="<?= basename($_SERVER['PHP_SELF'],'.php') ?>?page=<?=$ultima_pagina?>" title="Última Página">Último</a>    
	    </div>

	<?php endif;?>
</div>