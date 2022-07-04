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
    /* border: 1px  ; */
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
	include "conn.php";
    $sqlRating = "SELECT * from bus_routes WHERE date >= CURDATE() ORDER BY ratings DESC";
    $resRating = mysqli_query($conn, $sqlRating);
    if(mysqli_num_rows($resRating)>0){
        for($i=0; $i<6; $i++){
            while($row=mysqli_fetch_assoc($resRating)){
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
