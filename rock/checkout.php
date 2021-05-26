<?php
	session_start();

	require_once("config.php");
	
	if (!isset($_SESSION['logged_in'])) 
	{
		header("Location: login.php");
	}

	if(isset($_POST['Buy']))
	{
		
	}
?>