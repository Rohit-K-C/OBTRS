<?php 
	$server = "localhost";
	$user = "root";
	$pwd = "";
	$db = "obtrs";
	$conn = mysqli_connect($server, $user, $pwd, $db);
	if(!$conn){
		die("Failed to connect".mysqli_connect_error());
	}
?>