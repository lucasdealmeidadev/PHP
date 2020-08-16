<?php

function validate($validate = null){

	if($validate == 'validate'){
		require('php/functions/validate.php');
	}
}

function messageView($message = null)
{
	if($message == 'message'){
		require('php/functions/alert.php');
	}
}

function databaseView($database = null){
	if($database == 'database'){
		require('php/functions/database.php');
		require('php/functions/sql.php');
	}
}

function loadView(string $page, $database = null, $message = null, $validate = null)
{	

	if(file_exists('php/pages/' . $page .'.php')){

		if(databaseView($database)){
			databaseView($database);
		}
		if(messageView($message)){
			messageView($message);
		}

		if(validate($validate)){
			validate($validate);
		}

		require('php/pages/' . $page .'.php');

		if($database == 'database'){	
			mysqli_close(database());
		}

	}else{

		echo "View <strong>{$page}</strong> não encontrada!";
	}
}

function view(string $page, $database = null, $message = null, $validate = null)
{	
	require('php/templete/header.php');
	loadView($page, $database, $message, $validate);
    require('php/templete/footer.php');
}