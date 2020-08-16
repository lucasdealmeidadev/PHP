
<div class="col sm-12" style="margin: 10px">
		<a href="cadastro_usuarios" class="waves-effect waves-light btn right"><i class="material-icons left">add</i> Cadastrar usuarios</a>
</div>

<div class="container" style="margin-top: 2em; margin-bottom: 2em">

	<h5 style="text-transform: uppercase; font-weight: 600;"><i class="small material-icons">account_circle</i> Lista de usuários</h5>

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
	            <th>Login</th>
	            <th>Nome</th>
	            <th>E-mail</th>
	            <th>Permissão</th>
				<th>Ações</th>
	        </tr>
	    </thead>

	    <tbody>

	<?php
		$query = usersList();

		if(mysqli_num_rows($query) > 0):
			while ($row = mysqli_fetch_assoc($query)):

				echo "<tr>
						<td>{$row['login']}</td>
			            <td>{$row['nome']}</td>
			            <td>{$row['email']}</td>
			            <td>{$row['permissao']}</td>
						<td>	
								<i class='material-icons tooltipped' data-position='top' data-tooltip='Alterar usuário'>
									<a href='alterar-usuario?id_altera={$row['login']}' style='color: #000'>assignment</a>
								</i>

								<i class='material-icons tooltipped' data-position='top' data-tooltip='Excluir usuário'>
									<a href='javascript:deleteUsuario(" . json_encode($row['login']) .")' style='color: #000'>delete_forever</a>
								</i>
						</td>
					 </tr>";

			endwhile;
		else: 

			echo '<tr>
	            	<td colspan="6" class="center">Nenhum usuário foi encontrado...</td>
	        	 </tr>';

		endif;
	?>

	    </tbody>
	</table>
</div>