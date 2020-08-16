<?php
    $id = (int) $_GET['id_altera'];

    if(isset($id) && is_int($id) && mysqli_num_rows(produtRead($id)) > 0) :

?>


    <div class="col sm-12" style="margin: 10px">
        <a href="index" class="waves-effect waves-light btn right"><i class="material-icons left">reply_all</i> Voltar</a>
    </div>

    <div class="container responsive-table" style="margin-top: 2em">

        <h5 style="text-transform: uppercase; font-weight: 600;"><i class="small material-icons">border_color</i> Alterar produto</h5>

        <div class="row">

            <?php
            if (isset($_POST['sendCad'])) :

                $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                if (validateForm($dados)) :

                    message('Erro preencha todos os campos corretamente, seu formulário foi preenchido automaticamente de acordo com o produto selecionado!', 'error');

                else :

                    if (productAlter(
                        (int)    $dados['id-prod'],
                        (string) $dados['nome'],
                        (string) $dados['prec'],
                        (int)    $dados['qtd'],
                        (string) $dados['desc']
                    )) :

                        message('Produto alterado com sucesso !', 'success');
                    else :

                        message('Ocorreu um erro ao alterar o produto!', 'error');
                    endif;
                endif;

            endif;

            if (isset($_SESSION['alert'])) :

                echo $_SESSION['alert'];
                unset($_SESSION['alert']);
            endif;
            ?>


            <?php 
            
            $query = produtRead($id);
                while($row = mysqli_fetch_assoc($query)) : 
            
            ?>

                    <form method="POST" action="alterar?id_altera=<?= $row['id'] ?>" class="col s12">

                        <input type="hidden" name="id-prod" id="id-prod" value="<?= $row['id'] ?>">

                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" name="nome" id="nome" class="validate" value="<?= $row['nome'] ?>">
                                <label for="nome">Nome completo do produto : </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" name="prec" id="prec" class="validate" onkeyup="k(this);" value="<?= $row['preco'] ?>">
                                <label for="preco">Informe o preço deste produto :</label>
                            </div>
                        </div>


                        <div class="row">
                            <div class="input-field col s12">
                                <input type="number" name="qtd" id="qtd" class="validate" value="<?= $row['quantidade'] ?>">
                                <label for="qtd">Informe a quantidade deste produto disponível em estoque :</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" name="desc" id="desc" class="validate" value="<?= $row['descricao'] ?>">
                                <label for="desc">Faça uma preve descrição deste produto :</label>
                            </div>
                        </div>

                        <div class="row center">
                            <button type="submit" name="sendCad" value="Cadastrar" class="btn waves-effect waves-light"><i class="material-icons right">send</i> Alterar</button>
                        </div>

                    </form>
            
            <?php endwhile;?>

        </div>
    </div>

<?php
    else :

        echo '<h5 class="center" style="margin-top: 4em"><i class="material-icons">warning</i> Nenhum produto foi encontrado !<h5>';
    endif;
?>