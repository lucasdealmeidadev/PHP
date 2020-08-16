<?php
$id = (string) $_GET['id_altera'];

if (isset($id) && is_string($id) && mysqli_num_rows(userRead($id)) > 0) :

?>


<div class="col sm-12" style="margin: 10px">
    <a href="usuarios" class="waves-effect waves-light btn right"><i class="material-icons left">reply_all</i>
        Voltar</a>
</div>

<div class="container responsive-table" style="margin-top: 2em">

    <h5 style="text-transform: uppercase; font-weight: 600;"><i class="small material-icons">border_color</i> Alterar
        usuário</h5>

    <div class="row">

        <?php
            if (isset($_POST['sendCad'])) :

                $dados = [
                    'login'     => $_POST['login'], 
                    'nome'      => $_POST['nome'],
                    'email'     => $_POST['email'],
                    'permissao' => $_POST['permissao']
                ];

                if (validateForm($dados)) :

                    message('Erro preencha todos os campos corretamente, seu formulário foi preenchido automaticamente de acordo com o usuário selecionado!', 'error');
                
                
                elseif(!empty($dados['login']) && mysqli_num_rows(validadeLoginAlter((string) $dados['login'], $id)) > 0) :
                    
                    $exibe = ['login'     => $dados['login'], 
                              'senha'     => $_POST['senha'],
                              'nome'      => $dados['nome'],
                              'email'     => $dados['email'],
                              'permissao' => $dados['permissao']
                            ];
    
                    message("Erro login <strong>{$dados['login']}</strong> já existe, tente outro !", 'error');
                    
                else :

                    if (userAlter(
                        (string)$_POST['id'], 
                        (string)$dados['login'], 
                        (string)$dados['nome'], 
                        (string)$_POST['senha'], 
                        (string)$_POST['senha_atual'], 
                        (string)$dados['email'],
                        (string)$dados['permissao']
                    )) :

                        message('Usuário alterado com sucesso !', 'success');
                        $id = $dados['login'];             
                    else :

                        message('Ocorreu um erro ao alterar o usuário!', 'error');
                    endif;
                endif;

            endif;

            if (isset($_SESSION['alert'])) :

                echo $_SESSION['alert'];
                unset($_SESSION['alert']);
            endif;
            ?>


        <?php
            $query = userRead($id);
            
            while ($row = mysqli_fetch_assoc($query)) :
        ?>

        <form method="POST" action="alterar-usuario?id_altera=<?= $id ?>" class="col s12">

            <input type="hidden" name="id" id="id" value="<?= $row['login'] ?>">
            <input type="hidden" name="senha_atual" id="senha_atual" value="<?= $row['senha'] ?>">

            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="login" id="login" class="validate" value="<?= $row['login']?>">
                    <label for="login">login : </label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="senha">
                    <label for="senha">Senha :</label>
                    <span class="helper-text" data-error="wrong" data-success="right">Preencha o campo só em caso de
                        atualização</span>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="nome" id="nome" class="validate" value="<?= $row['nome']?>">
                    <label for="nome">Nome completo :</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input type="email" name="email" id="email" class="validate" value="<?= $row['email']?>">
                    <label for="email">E-mail :</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <select name="permissao" id="permissao" class="validate">
                        <option value="<?= $row['permissao']?>" selected>Permissão - <?= $row['permissao']?></option>
                        <option value="Admin">Admin</option>
                        <option value="Normal">Normal </option>
                        <option value="Leitura">Leitura </option>
                    </select>
                    <label>Permissão</label>
                </div>
            </div>

            <div class="row center">
                <button type="submit" name="sendCad" value="Cadastrar" class="btn waves-effect waves-light"><i
                        class="material-icons right">send</i> Alterar</button>
            </div>

        </form>

        <?php endwhile; ?>

    </div>
</div>

<?php
else :

    echo '<h5 class="center" style="margin-top: 4em"><i class="material-icons">warning</i> Nenhum usuário foi encontrado !<h5>';
endif;
?>