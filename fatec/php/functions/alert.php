<?php

function message(string $message, string $type)
{
	if($type == 'error'){

		return $_SESSION['alert'] = $message;
	}

	if($type == 'success'){

		return $_SESSION['alert'] = $message;
    }
}