<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/display.css">
    <title></title>
    <style>
    input[type=text]{
	width: 400px;
	box-sizing: border-box;
	padding: 12px 5px;
	background: white
	border: none;
	color: black;
	border-radius: 50px;
	margin: 5px;
    margin-left: 50px;
	font-weight: bold;
    font-size: 20px;
}

input[type=submit]{
	width: 100px;
	box-sizing: border-box;
	padding: 10px 0;
	margin-top: 30px;
	outline: none;
	border: none;
	background-color: rgb(0,30,100);
	opacity: 0.8;
	border-radius: 20px;
	font-size: 20px;
	color: white;
}
input[type=submit]:hover{
	background-color: black;
    color: white;
	opacity: 0.8;
}

    </style>
</head>
<body>
    <div class="search">
    <form action="search.php" method="POST" target="iframe">
        <input type="text" placeholder="Enter bus number" name="busNum">
        <input type="submit" value="Search">
    </form>
    </div>
    <table>
        <tr>
            <th>Bus Number</th>
            <th>Travelling From</th>
            <th>Travelling To</th>
            <th>Date</th>
            <th>Time</th>
            <th>Ratings</th>
            <th colspan="2">Actions</th>
        </tr>
<?php
	// session_start();
	// $username = $_SESSION['tt'];
    $busNum = $_POST['busNum'];
	include "conn.php";
	$sql = "Select * from bus_routes WHERE busNum = '$busNum'";
	$res = mysqli_query($conn, $sql);
	if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){
            echo "<tr>";
            echo "<td>".$row['busNum']."</td>";
            echo "<td>".$row['travellingFrom']."</td>";
            echo "<td>".$row['travellingTo']."</td>";
            echo "<td>".$row['date']."</td>";
            echo "<td>".$row['time']."</td>";
            echo "<td>".$row['ratings']."</td>";
            echo "<td><a href=\"edit.php?busNum=".$row["busNum"]."\" target='_blank'><p id='edit'></p></a></td>";
            echo "<td><a href=\"delete.php?busNum=".$row["busNum"]."\"><p id='delete'></p></a></td>";
        }
    }
    else{
        echo "<script>alert('Bus not found!');</script>";
    }
?>
    </table>
</body>
</html>