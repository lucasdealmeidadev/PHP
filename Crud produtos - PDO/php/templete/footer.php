    </main>

    <?php if(isset($_SESSION['login'])) :?>
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
                            <li><a class="grey-text text-lighten-3" href="sair">Sair</a></li>
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
    <?php endif;?>

    <script src="js/jquery.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/scripts.js"></script>

    <?php 

        if(!empty($_SESSION['msg'])) :
                
            echo "<script>M.toast({html: '". $_SESSION['msg'] ."'})</script>";
            unset($_SESSION['alert']);
        endif;
    ?>

    </body>

    </html>

    <?php ob_flush();?>