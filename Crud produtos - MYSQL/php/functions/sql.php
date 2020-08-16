<?php

/**
 * CRUD PRODUTOS
 */
function productList()
{
	$sql   = 'SELECT * FROM produto'; 
	return mysqli_query(database(), $sql);
}

function productCreate(string $nome, string $preco, int $quantidade, string $descricao)
{
	$preco = number_format(str_replace(",",".",str_replace(".","",$preco)), 2, '.', '');
	$data  = date('Y-m-d H:i:s');

	$sql   = "INSERT INTO produto (nome, preco, quantidade, descricao, dataCadastro) 
			               VALUES ('$nome', '$preco', '$quantidade', '$descricao', '$data')";
				
	return mysqli_query(database(), $sql);
}

function productAlter(int $id, string $nome, string $preco, int $quantidade, string $descricao)
{
	$preco = number_format(str_replace(",",".",str_replace(".","",$preco)), 2, '.', '');
				   
	$sql   = "UPDATE produto SET nome='$nome' , preco='$preco' , quantidade='$quantidade', descricao='$descricao' WHERE id = '$id'";
				
	return mysqli_query(database(), $sql);
}


function produtRead(int $id){

	$sql = "SELECT id, nome, preco, quantidade, descricao, dataCadastro FROM produto WHERE id = '$id' LIMIT 1";
	
	return mysqli_query(database(), $sql);
}

function productDelete(int $id){

	$sql = "DELETE FROM produto WHERE id = '$id'";
	
	return mysqli_query(database(), $sql);
}

/**
 * CRUD USUÁRIOS
 */
function validadeLogin(string $login)
{
	$sql   = "SELECT login FROM usuarios WHERE login = '$login' LIMIT 1"; 
	return mysqli_query(database(), $sql);
}
function validadeLoginAlter(string $login, string $id)
{
	$sql   = "SELECT login FROM usuarios WHERE login = '$login' AND login <> '$id' LIMIT 1"; 
	return mysqli_query(database(), $sql);
}

function usersList()
{
	$sql   = 'SELECT * FROM usuarios'; 
	return mysqli_query(database(), $sql);
}
function usuarioCreate(string $login, string $nome, string $senha, string $email, string $permissao)
{
	$senha = password_hash($senha, PASSWORD_DEFAULT);

	$sql   = "INSERT INTO usuarios (login, nome, senha, email, permissao) 
			               VALUES ('$login', '$nome', '$senha', '$email', '$permissao')";
				
	return mysqli_query(database(), $sql);
}
function userDelete(string $login){

	$sql = "DELETE FROM usuarios WHERE login = '$login'";
	
	return mysqli_query(database(), $sql);
}
function userRead(string $login){

	$sql = "SELECT login, nome, senha, email, permissao FROM usuarios WHERE login='$login' LIMIT 1";
	
	return mysqli_query(database(), $sql);
}

function userAlter(string $id, string $login, string $nome, string $senha, string $senha_atual, string $email, string $permissao)
{
	if ($senha != '')	{
		$senha = password_hash($senha, PASSWORD_DEFAULT);
	} else {
		$senha = $senha_atual;
	}	  

	$sql = "UPDATE usuarios SET login='$login', nome='$nome', senha='$senha', email='$email', permissao='$permissao' WHERE login='$id'";			
	return mysqli_query(database(), $sql);
}