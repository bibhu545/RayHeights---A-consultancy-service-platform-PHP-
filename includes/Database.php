<?php

	$hostname = "localhost";
	$username = "root";
	$password = "";
	$db_name = "rayheights";
	$db = mysqli_connect($hostname,$username,$password,$db_name);
	if(!$db)
		die("Database Error");

?>