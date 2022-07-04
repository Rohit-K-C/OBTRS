<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="signup.css">
	<title></title>
</head>
<body>
<div class="design">
<?php
	$email = $_POST['email'];
	$uname = $_POST['username'];
	$password = $_POST["password"];
	$number = $_POST["num"];
	session_start();
	$username = $_SESSION['tt'];
	include "conn.php";
	$sql = "Insert into user_login(uname, password, email, mobileNum) values('$uname', '$password', '$email', '$number')";
	$res = mysqli_query($conn, $sql);
	if(!$res){
		die("Signup Failed".mysqli_error($conn));
	} 
	else{
		header("Location: login.php");
	}
?>
</div>
</body>
</html>