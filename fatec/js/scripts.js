$(document).ready(function () {
    $('select').formSelect();
    $('.sidenav').sidenav();
    $('.tooltipped').tooltip();
    $('.modal').modal();
    $('.dropdown-trigger').dropdown();

    $(document).on("submit", "#login-valida", function (t) {

        t.preventDefault();
        M.Toast.dismissAll();
        let action = $(this).attr("action");
        let data = $(this).serialize();

        $.ajax({
            url: action,
            method: "post",
            dataType: 'json',
            data: data,
            success: function (t) {
                if (t.type == 'error') {

                    M.toast({ html: t.message });
                    return;
                }
                else {

                    window.location.href = 'index';
                    return;
                }
            },
            error: function (error) {
                alert('Ocorreu um erro : ' + error);
            }
        });
    });

    $(document).on("submit", "#cad-produto", function (t) {

        t.preventDefault();
        M.Toast.dismissAll();
        let action = $(this).attr("action");
        let data = $(this).serialize();


        $.ajax({
            url: action,
            method: "post",
            dataType: 'json',
            data: data,
            success: function (t) {
                if (t.type == 'error') {

                    M.toast({ html: t.message });
                    return;
                }
                else {

                    $('#cad-produto').trigger("reset");
                    $('#modal_produto').modal('close');
                    $("#lista-produtos").load(location.href + " #lista-produtos>*", "");
                    M.toast({ html: t.message });
                    return;
                }
            },
            error: function (error) {
                alert('Ocorreu um erro : ' + error);
            }
        });
    });

    $(document).on("submit", "#cad-usuarios", function (t) {

        t.preventDefault();
        M.Toast.dismissAll();
        let action = $(this).attr("action");
        var data = new FormData($(this)[0]);

        $.ajax({
            url: action,
            method: "post",
            dataType: 'json',
            processData: false,
            contentType: false,
            data: data,
            success: function (t) {
                if (t.type == 'error') {

                    M.toast({ html: t.message });
                    return;
                }
                else {

                    $('#cad-usuarios').trigger("reset");
                    $('#modal_user').modal('close');
                    $("#lista-usuarios").load(location.href + " #lista-usuarios>*", "");
                    M.toast({ html: t.message });
                    return;
                }
            },
            error: function (error) {
                alert('Ocorreu um erro : ' + error);
            }
        });
    });

    $(document).on("submit", "#alterar_produto", function (t) {

        t.preventDefault();
        M.Toast.dismissAll();
        let action = $(this).attr("action");
        let data = $(this).serialize();

        $.ajax({
            url: action,
            method: "post",
            dataType: 'json',
            data: data,
            success: function (t) {
                if (t.type == 'error') {

                    M.toast({ html: t.message });
                    return;
                }
                else {

                    $('#modal_produto_altera').modal('close');
                    $("#lista-produtos").load(location.href + " #lista-produtos>*", "");
                    M.toast({ html: t.message });
                    return;
                }
            },
            error: function (error) {
                alert('Ocorreu um erro : ' + error);
            }
        });
    });

    $(document).on("submit", "#alterar_usuario", function (t) {

        t.preventDefault();
        M.Toast.dismissAll();
        let action = $(this).attr("action");
        let data = $(this).serialize();

        $.ajax({
            url: action,
            method: "post",
            dataType: 'json',
            data: data,
            success: function (t) {
                if (t.type == 'error') {

                    M.toast({ html: t.message });
                    return;
                }
                else {

                    $('#modal_usuario_altera').modal('close');
                    $("#lista-usuarios").load(location.href + " #lista-usuarios>*", "");
                    M.toast({ html: t.message });
                    return;
                }
            },
            error: function (error) {
                alert('Ocorreu um erro : ' + error);
            }
        });
    });

    $(document).on("submit", "#edit-usuarios", function (t) {

        t.preventDefault();
        M.Toast.dismissAll();
        let action = $(this).attr("action");
        var data = new FormData($(this)[0]);

        $.ajax({
            url: action,
            method: "post",
            dataType: 'json',
            processData: false,
            contentType: false,
            data: data,
            success: function (t) {
                if (t.type == 'error') {

                    M.toast({ html: t.message });
                    return;
                }
                else {

                    M.toast({ html: t.message });
                    document.location.reload(true);
                    return;
                }
            },
            error: function (error) {
                alert('Ocorreu um erro : ' + error);
            }
        });
    });
});

function alteraProduto(id) {

    $('#form').empty();

    $.ajax({
        url: 'alterar?id_altera=' + id,
        method: "get",
        dataType: 'json',
        crossDomain: true,
        success: function (t) {

            const tam = t.dados.length;

            if (tam > 0) {

                $('#modal_produto_altera').modal('open');
                $('#form').append(
                    `
                        <form method="POST" action="alterar?alterar_produto=sim" class="col s12" id="alterar_produto">

                            <input type="hidden" name="id-prod" id="id-prod" value='${t.dados[0].id}'>

                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" name="nome" id="nome" class="validate" value="${t.dados[0].nome}">
                                    <label class="active" for="nome">Nome completo do produto : </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" name="prec" id="prec" class="validate" onkeyup="k(this);" value="${t.dados[0].preco}">
                                    <label class="active" for="preco">Informe o preço deste produto :</label>
                                </div>
                            </div>


                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="number" name="qtd" id="qtd" class="validate" value="${t.dados[0].quantidade}">
                                    <label class="active" for="qtd">Informe a quantidade deste produto disponível em estoque :</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" name="desc" id="desc" class="validate" value="${t.dados[0].descricao}">
                                    <label class="active" for="desc">Faça uma preve descrição deste produto :</label>
                                </div>
                            </div>

                            <div class="row center">
                                <button type="submit" name="sendCad" value="Cadastrar" class="btn waves-effect waves-light"><i class="material-icons right">send</i> Alterar</button>
                            </div>

                        </form>
                    `
                );
                var instance = M.FormSelect.getInstance('select');
                instance.getSelectedValues();
            }
            else {
                $('#modal_produto_altera').modal('close');
                M.toast({ html: t.message });
            }

        },
    });
}

/*ESTOU MEXENDO AQUI*/
function alteraUsuario(id) {

    $('#form').empty();
    $('select').formSelect();

    $.ajax({
        url: 'alterar-usuario?id_altera=' + id,
        method: "get",
        dataType: 'json',
        crossDomain: true,
        success: function (t) {

            const tam = t.dados.length;

            if (tam > 0) {

                $('#modal_usuario_altera').modal('open');
                $('#form').append(
                    `
                        <script>
                            $(document).ready(function(){
                                $('select').formSelect();
                            });
                        </script>

                        <form method="POST" action="alterar-usuario?alterar_usuario=sim" class="col s12" id="alterar_usuario">

                            <input type="hidden" name="id" id="id" value="${t.dados[0].login}">
                            <input type="hidden" name="senha_atual" id="senha_atual" value="${t.dados[0].senha}">

                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" name="login" id="login" class="validate" value="${t.dados[0].login}">
                                    <label for="login" class="active">login : </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" name="nova_s" id="nova_s" value="">
                                    <label for="senha">Senha :</label>
                                    <span class="helper-text" data-error="wrong" data-success="right">Preencha o campo só em caso de
                                        atualização</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" name="nome" id="nome" class="validate" value="${t.dados[0].nome}">
                                    <label for="nome" class="active">Nome completo :</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="email" name="email" id="email" class="validate" value="${t.dados[0].email}">
                                    <label for="email" class="active">E-mail :</label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="input-field col s12">
                                    <select name="permissao" id="permissao" class="validate">
                                        <option value="${t.dados[0].permissao}" selected>Permissão - ${t.dados[0].permissao}</option>
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
                    `
                );

            }
            else {
                $('#modal_usuario_altera').modal('close');
                M.toast({ html: t.message });
            }

        },
    });
}
/*ESTOU MEXENDO AQUI FIM*/


function modalAcoes() {
    $('#cad-produto').trigger("reset");
    $('#modal_produto').modal('open');
}

function modalAcoesUser() {
    $('#cad-usuarios').trigger("reset");
    $('#modal_user').modal('open');
}

function deleteProduto(id) {

    $('#titulo-produto').empty();
    $('#btn-acoes-modal').empty();

    $('#titulo-produto').append('Deseja excluir este produto ?');
    $('#btn-acoes-modal').append(
        `
        <a href="delete?id_delete=${id}" class="modal-close waves-effect waves-green btn-flat waves-light red white-text">Sim exclua</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat waves-light black white-text">Cancelar</a>
    `);

    $('#modal').modal('open');
}
function deleteUsuario(login) {

    $('#titulo-produto').empty();
    $('#btn-acoes-modal').empty();

    $('#titulo-produto').append('Deseja excluir este usuário ?');
    $('#btn-acoes-modal').append(
        `
        <a href="delete-usuario?id_delete=${login}" class="modal-close waves-effect waves-green btn-flat waves-light red white-text">Sim exclua</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat waves-light black white-text">Cancelar</a>
    `);

    $('#modal').modal('open');
}

function k(i) {
    var v = i.value.replace(/\D/g, '');
    v = (v / 100).toFixed(2) + '';
    v = v.replace(".", ",");
    v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
    v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");
    i.value = v;
}