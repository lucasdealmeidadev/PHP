<?php

 function database()
 {
 	 $host      = 'localhost';
	 $user      = 'root';
	 $password  = '';
	 $database  = 'crudproduto';
	 $connetion =  mysqli_connect($host, $user, $password, $database);

	 if(!$connetion){
	 	return die('Ocorreu um erro ao tentar se conectar no banco de dados!' . mysqli_connect_error());
	 }

 	return $connetion;
 }
