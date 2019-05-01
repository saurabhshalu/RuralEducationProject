<?php
	if(session_status() == PHP_SESSION_NONE)
		session_start();
	
	try 
	{
		 $handler = new PDO('mysql:host=127.0.0.1;dbname=dataHackathon','root','');
		 $handler -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} 
	catch (PDOException $e) 
	{
		echo $e->getMessage();
		die();
	}
?>
