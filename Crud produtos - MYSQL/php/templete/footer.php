    </main>

    <footer class="page-footer teal lighten-2">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Crud de produtos</h5>
                    <p class="grey-text text-lighten-4">Desenvolvimento para Servidores I - Prof° Julio Fernado Liera
                    </p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Links</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="index">Produtos</a></li>
                        <li><a class="grey-text text-lighten-3" href="usuarios">Usuários</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                &copy <?= date('Y')?> Desenvolvimento para Servidores I - Prof° Julio Fernado Liera (:
            </div>
        </div>
    </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/materialize.min.js"></script>

    <script>
    $(document).ready(function() {
        $('.sidenav').sidenav();
        $('.tooltipped').tooltip();
        $('.modal').modal();
    });

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

    $(document).ready(function() {
        $('select').formSelect();
    });
    </script>
    </body>

    </html>

    <?php ob_flush();?>