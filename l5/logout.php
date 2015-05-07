<?php
	session_start();
	
	unset($_SESSION["auth"]);
	unset($_SESSION["nick"]);
	unset($_SESSION["visits"]);
    session_destroy();
	header("Location: index.php");
	exit;

?>