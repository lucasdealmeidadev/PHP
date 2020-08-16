<?php

/** CRUD PRODUTOS **/
function productCreate(string $nome, string $preco, int $quantidade, string $descricao)
{
	$preco= number_format(str_replace(",",".",str_replace(".","",$preco)), 2, '.', '');
	$data = date('Y-m-d H:i:s');

	$sql  = "INSERT INTO produto (nome, preco, quantidade, descricao, dataCadastro) 
                  VALUES (:nome, :preco, :quantidade, :descricao, :dataCadastro)";

    $sql  = database()->prepare($sql);
    $sql->bindParam(':nome',         $nome);
    $sql->bindParam(':preco',        $preco);
    $sql->bindParam(':quantidade',   $quantidade);
    $sql->bindParam(':descricao',    $descricao);
    $sql->bindParam(':dataCadastro', $data);
    $sql->execute();

    if($sql->rowCount()){
    	return true;
    }
	return false;
}

function productAlter(int $id, string $nome, string $preco, int $quantidade, string $descricao)
{
	$preco = number_format(str_replace(",",".",str_replace(".","",$preco)), 2, '.', '');

	$sql   = "UPDATE produto SET nome=:nome , preco=:preco , quantidade=:quantidade, descricao=:descricao WHERE id = :id";
    $sql   = database()->prepare($sql);
    $sql->bindParam(':nome',       $nome);
    $sql->bindParam(':preco',      $preco);
    $sql->bindParam(':quantidade', $quantidade);
    $sql->bindParam(':descricao',  $descricao);
    $sql->bindParam(':id',         $id);
    return $sql->execute();
}


function produtRead(int $id){

	$sql = 'SELECT * FROM produto WHERE id = :id LIMIT 1';
	$sql = database()->prepare($sql);
	$sql->bindParam(':id', $id);
	$sql->execute();
	return $sql->fetchAll(PDO::FETCH_ASSOC);
}

function productDelete(int $id){

    $sql = "DELETE FROM produto WHERE id = :id";
	$sql = database()->prepare($sql);
	$sql->bindParam(':id', $id);
	return $sql->execute();
}

/**CRUD USUÁRIOS**/
function validadeLogin(string $login)
{

	$sql = 'SELECT login FROM usuarios WHERE login = :login LIMIT 1';
	$sql = database()->prepare($sql);
	$sql->bindParam(':login', $login);
	$sql->execute();
	
	if($sql->rowCount()){
    	return true;
    }
	return false;	
}
function validadeLoginAlter(string $login, string $id)
{
	$sql = 'SELECT login FROM usuarios WHERE login = :login AND login <> :id LIMIT 1';
	$sql = database()->prepare($sql);
	$sql->bindParam(':login', $login);
	$sql->bindParam(':id',    $id);
	$sql->execute();
	
	if($sql->rowCount()){
    	return true;
    }
	return false;
}

function usuarioCreate(string $login, string $nome, string $senha, string $email, string $permissao, string $img_perfil)
{
	$senha = password_hash($senha, PASSWORD_DEFAULT);
	$sql   = "INSERT INTO usuarios (login, nome, senha, email, permissao, img_perfil) 
                  VALUES (:login, :nome, :senha, :email, :permissao, :img_perfil)";

    $sql  = database()->prepare($sql);
    $sql->bindParam(':login',     $login);
    $sql->bindParam(':nome',      $nome);
    $sql->bindParam(':senha',     $senha);
    $sql->bindParam(':email',     $email);
    $sql->bindParam(':permissao', $permissao);
    $sql->bindParam(':img_perfil', $img_perfil);
    $sql->execute();

    if($sql->rowCount()){
    	return true;
    }
	return false;
}
function userDelete(string $login){

	$sql = "DELETE FROM usuarios WHERE login = :login"; 
	$sql = database()->prepare($sql);
	$sql->bindParam(':login', $login);
	return $sql->execute();
}
function userRead(string $login){

	$sql = 'SELECT * FROM usuarios WHERE login = :login LIMIT 1';
	$sql = database()->prepare($sql);
	$sql->bindParam(':login', $login);
	$sql->execute();
	return $sql->fetchAll(PDO::FETCH_ASSOC);
}

function userAlter(string $id, string $login, string $nome, string $senha, string $senha_atual, string $email, string $permissao)
{

	$senha = (!empty($senha)) ? password_hash($senha, PASSWORD_DEFAULT) : $senha_atual;
	
	$sql   = "UPDATE usuarios SET login=:login, nome=:nome, senha=:senha, email=:email, permissao=:permissao WHERE login=:id";
    $sql   = database()->prepare($sql);
    $sql->bindParam(':login',     $login);
    $sql->bindParam(':nome',      $nome);
    $sql->bindParam(':senha',     $senha);
    $sql->bindParam(':email',     $email);
    $sql->bindParam(':permissao', $permissao);
    $sql->bindParam(':id',        $id);
    return $sql->execute();
}

function alterPerfil(string $login, string $nome, string $senha, string $img_perfil)
{

	
	$sql   = "UPDATE usuarios SET nome=:nome, senha=:senha, img_perfil=:img_perfil WHERE login=:login";
    $sql   = database()->prepare($sql);
    $sql->bindParam(':nome',      $nome);
    $sql->bindParam(':senha',     $senha);
    $sql->bindParam(':img_perfil', $img_perfil);
    $sql->bindParam(':login',     $login);
    return $sql->execute();
}
/*LOGIN*/
function login(string $login, string $senha)
{

	$sql = 'SELECT login, nome, senha, email, permissao FROM usuarios WHERE login = :login LIMIT 1';
	$sql = database()->prepare($sql);
	$sql->bindParam(':login', $login);
	$sql->execute();
	$row = $sql->fetchAll(PDO::FETCH_ASSOC);
	
	if(!empty($row[0]['senha']) && validarSenha($senha, $row[0]['senha']) != false){

		session_start();
		$_SESSION['login']     = $row[0]['login'];
		$_SESSION['nome']      = $row[0]['nome'];
		$_SESSION['email']     = $row[0]['email'];
		$_SESSION['permissao'] = $row[0]['permissao'];
		return true;
	}

	return false;
}

function validarSenha($senha, $senhaBanco)
{
    return password_verify($senha, $senhaBanco) ? true : false;
}

/*PAGINAÇÃO USUÁRIOS*/
function usersList($linha_inicial, $qtd)
{

	$sql = "SELECT * FROM usuarios LIMIT {$linha_inicial}, " . $qtd;  
	$sql = database()->prepare($sql);   
	$sql->execute();   
	return $sql->fetchAll(PDO::FETCH_ASSOC);   
}

function usersCount()
{
	$sql = "SELECT COUNT(*) AS total_registros FROM usuarios";   
	$sql = database()->prepare($sql);   
	$sql->execute();
	return $sql->fetch(PDO::FETCH_ASSOC);   
}

/*PAGINAÇÃO PRODUTOS*/
function productsList($linha_inicial, $qtd)
{

	$sql = "SELECT * FROM produto LIMIT {$linha_inicial}, " . $qtd;  
	$sql = database()->prepare($sql);   
	$sql->execute();   
	return $sql->fetchAll(PDO::FETCH_ASSOC);   
}

function productsCount()
{
	$sql = "SELECT COUNT(*) AS total_registros FROM produto";   
	$sql = database()->prepare($sql);   
	$sql->execute();
	return $sql->fetch(PDO::FETCH_ASSOC);   
}