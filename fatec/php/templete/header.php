<?php
    session_start(); 
    ob_start();

    if(basename($_SERVER['PHP_SELF'],'.php') != 'login' && !isset($_SESSION['login'])) :
        header('location: login');
        die();
    endif;

    if(basename($_SERVER['PHP_SELF'],'.php') == 'login' && isset($_SESSION['login']))  :
        header('location: index');
    endif;

    $_SESSION['msg'] = isset($_SESSION['alert']) ? $_SESSION['alert'] : '';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Desenvolvimento para Servidores I - Prof° Julio Fernado Liera</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.min.css" rel="stylesheet">
    <meta http-equiv="refresh" content="900;url=sair.php">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style>
    body {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
    }

    main {
        flex: 1 0 auto;
    }

    .modal {
        width: 90% !important;
    }

    /** Utilizar em tela de cadastro **/
    #preview {
        width: 130px;
        height: 130px;
        border-radius: 5px;
        object-fit: cover;
    }
    </style>
</head>

<?php if(isset($_SESSION['login'])) :?>

<header>
    <nav style="text-transform: uppercase">
        <div class="nav-wrapper teal lighten-2">
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="index">Produtos</a></li>
                <li><a href="usuarios">Usuários</a></li>
                <!-- Dropdown -->
                <a class='dropdown-trigger btn' href='#' data-target='dropdown1'><?= $_SESSION['nome'] ?></a>
            </ul>
        </div>
        <ul id='dropdown1' class='dropdown-content'>
            <li><a href="meu_perfil">Meu Perfil</a></li>
            <li><a href="sair">Sair</a></li>
        </ul>
    </nav>


    <ul class="sidenav" id="mobile-demo">
        <li><a href="index">Produtos</a></li>
        <li><a href="usuarios">Usuários</a></li>
        <li><a href="usuarios">Sair</a></li>
    </ul>
</header>

<?php endif;?>

<body>

    <main>