<?php
    $servername = 'mysql:host=localhost;dbname=barbershop';
	$user = 'root';
	$pass = '';
	$option = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
	);
	try
	{
		$con = new PDO($servername,$user,$pass,$option);
		$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//echo 'Good Very Good !';
	}
	catch(PDOException $e)
	{
		echo "Failed to connect to database ! ".$e->getMessage();
		die();
	}
?>