<div class="container">

    <h5 style="text-transform: uppercase; font-weight: 400;">
        <i class="small material-icons">account_circle</i>
        Meu Perfil
    </h5>

    <?php $user = userRead($_SESSION['login']); ?>

    <form method="POST" name="formUser" action="alterar_meus_dados" class="col s12" id="edit-usuarios"
        enctype="multipart/form-data">

        <input type="hidden" name="img_atual" value="<?= $user[0]['img_perfil'] ?>">
        <input type="hidden" name="senha_atual" value="<?= $user[0]['senha'] ?>">
        <input type="hidden" name="login" value="<?= $user[0]['login'] ?>">

        <div class="row">
            <div class="input-field col s12">
                <img src="/fatec/imgs/<?= $user[0]['img_perfil'] ?>" id="preview">
                <input type="file" name="perfil" id="perfil">
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <input type="text" name="login" id="login" class="validate" value="<?= $user[0]['login'] ?>" disabled>
                <label for="login">login : </label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <input type="password" name="senha" id="senha" class="validate" value="">
                <label for="senha">Senha :</label>
                <p class="grey-text">*Preencher o campo somente se for atualizar a senha.</p>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" class="validate" value="<?= $user[0]['nome'] ?>">
                <label for="nome">Nome completo :</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <input type="email" name="email" id="email" class="validate" value="<?= $user[0]['email'] ?>" disabled>
                <label for="email">E-mail :</label>
            </div>
        </div>

        <div class="row center">
            <button type="submit" name="sendCad" value="Editar" class="btn waves-effect waves-light"><i
                    class="material-icons right">send</i> Editar</button>
        </div>

    </form>
</div>