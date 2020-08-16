<?php

 function database()
 {
 	 $host      = 'localhost';
	 $user      = 'root';
	 $password  = '';
	 $database  = 'crudproduto';

	 	try{

		  $pdo = new PDO("mysql:host={$host};dbname={$database}", $user, $password);
		  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  $pdo->exec("SET NAMES UTF8"); 
		  $pdo->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));

		} catch(PDOException $e){
		  	echo "Erro" . $erro->getMessage();		
		}

		return $pdo;
 }
