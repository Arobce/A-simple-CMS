<?php 
session_start();
session_destroy();
function redirect($url, $status_code=303)
{
	header('Location: '.$url,true,$status_code);
	die();
}
	redirect("http://localhost:8080/Roshan_CMS/index.php");

?>