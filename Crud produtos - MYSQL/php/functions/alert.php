<?php

function message(string $message, string $type)
{
	if($type == 'error'){

		return $_SESSION['alert'] = "<div class='row'>
			            				<div class='card red white-text' style='padding:5px'>
			                				<p>{$message}</p>
			            				</div>
			        			     </div>";
	}

	if($type == 'success'){

		return $_SESSION['alert'] = "<div class='row'>
				            			<div class='card green white-text' style='padding:5px'>
				                			<p>{$message}</p>
				            			</div>
			        				</div>";
    }
}