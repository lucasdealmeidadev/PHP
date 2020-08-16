
<div class="col sm-12" style="margin: 10px">
		<a href="cadastro" class="waves-effect waves-light btn right"><i class="material-icons left">add</i> Cadastrar produto</a>
</div>

<div class="container" style="margin-top: 2em; margin-bottom: 2em">

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
		if (isset($_SESSION['alert'])) :

			echo $_SESSION['alert'];
			unset($_SESSION['alert']);
	    endif;
	?>

	<table class="responsive-table highlight">
	    <thead>
	        <tr>
	            <th>ID</th>
	            <th>Nome</th>
	            <th>Preço</th>
	            <th>Quantidade</th>
	            <th>Criado</th>
				<th>Ações</th>
	        </tr>
	    </thead>

	    <tbody>

	<?php
		$query = productList();

		if(mysqli_num_rows($query) > 0):
			while ($row = mysqli_fetch_assoc($query)):

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
						</td>
						
						<td>	
								<i class='material-icons tooltipped' data-position='top' data-tooltip='Alterar produto'>
									<a href='alterar?id_altera={$row['id']}' style='color: #000'>assignment</a>
								</i>

								<i class='material-icons tooltipped' data-position='top' data-tooltip='Excluir produto'>
									<a href='javascript:deleteProduto({$row['id']});' style='color: #000'>delete_forever</a>
								</i>
						</td>
					 </tr>";

			endwhile;
		else: 

			echo '<tr>
	            	<td colspan="6" class="center">Nenhum produto foi encontrado...</td>
	        	 </tr>';

		endif;
	?>

	    </tbody>
	</table>
</div>