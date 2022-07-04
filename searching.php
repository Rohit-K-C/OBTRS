<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
    table{
    /* background-color: white; */
    color: white;
    width:750px;
    text-align: center;
    border-spacing: 18px;
    padding: 0;
}

table th{
    /* border: 1px solid white; */
    font-size: 19px;
    padding: 0;
    border-spacing:0;
    padding: 6px;
    
}

table td{
    font-weight: bold;
    font-size: 20px;    
}

#bookNow{
    background-color: green;
    padding: 5px;
    border-radius: 20px;
    outline: none;
    text-decoration: none;
    color: white;
}

#bookNow:hover{
    background-color: aqua;
    padding: 5px;
    border-radius: 20px;
    outline: none;
    text-decoration: none;
    color: black;
}
</style>
</head>
<body>
<table cellspacing:none;>
        <tr>
            <th>Travelling From</th>
            <th>Travelling To</th>
            <th>Date</th>
            <th>Time</th>
            <th>Ratings</th>
            <th colspan="2">Book Ticket</th>
        </tr>
<?php
	$tFrom = $_POST['travelling-from'];
	$tTo = $_POST["travelling-to"];
	$date = $_POST["date"];
	// session_start();
	// $username = $_SESSION['tt'];
	include "conn.php";
    $sql = "SELECT * from bus_routes WHERE date = '$date' ORDER BY ratings DESC";
	$res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){
                if($tFrom == $row['travellingFrom'] && $tTo == $row['travellingTo']){
                echo "<tr>";
                echo "<td>".$row['travellingFrom']."</td>";
                echo "<td>".$row['travellingTo']."</td>";
                echo "<td>".$row['date']."</td>";
                echo "<td>".$row['time']."</td>";
                echo "<td>".$row['ratings']."</td>";
                echo "<td><a href=\"booknow.php?busNum=".$row["busNum"]."\" target='_blank' id='bookNow'>Book Now</a></td>";
            }
        }
    }
?>
</table>
</body>
</html>
