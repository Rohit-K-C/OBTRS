<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<?php
	$busNum = $_POST['busNum'];
	$tFrom = $_POST['travelling-from'];
	$tTo = $_POST["travelling-to"];
	$date = $_POST["date"];
	$time = $_POST["time"];
	$price = $_POST["price"];
	// session_start();
	// $username = $_SESSION['tt'];
	include "conn.php";
	$sql = "Insert into bus_routes(busNum, travellingFrom, travellingTo, date, time, price) values('$busNum', '$tFrom', '$tTo', '$date', '$time', '$price')";
	$res = mysqli_query($conn, $sql);
	if(!$res){
		die("Failed to add bus".mysqli_error($conn));
	} 
	else{
		header("Location: add-bus.php");
	}
?>
</body>
</html>