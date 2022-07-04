<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Ticket Booking</title>
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="stylesheet" href="../styles/mytickets.css">
    
</head>
<body>
    
    <div class="top-bar">
        <a href="client-homepage.php" id="home" >Home</a>
        <a href="about-client.php" id="about">About</a>
        <a href="../logout.php" id="login">Logout</a>
    </div>
    <div class="heading">
        <h2 class="welcome">Welcome <?php session_start();  
                            include "../conn.php";
                            $email = $_SESSION['tt'];
                            $sql = "SELECT uname FROM user_login WHERE email = '$email'";
                            $res = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($res)>0){
                                while($row=mysqli_fetch_assoc($res)){
                                    echo $row['uname'];
                                }
                            }                       
                            ?></h2>
        <h1 class="title">Online Bus Ticket Booking System</h1>
    </div>
    <br><hr>
    <table>
    <tr>
        <th>Bus Number</th>
        <th>Travelling From</th>
        <th>Travelling To</th>
        <th>Date</th>
        <th>Time</th>
        <th></th>
    </tr>
<?php
include "../conn.php";
$sql = "SELECT * FROM tickets WHERE email = '$email'";
$res = mysqli_query($conn, $sql);
if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_assoc($res)){
        echo "<tr>";
        echo "<td>".$row['busNum']."</td>";
        echo "<td>".$row['travellingFrom']."</td>";
        echo "<td>".$row['travellingTo']."</td>";
        echo "<td>".$row['date']."</td>";
        echo "<td>".$row['time']."</td>";
        $currdate = date('Y/m/d');
        $getdate = $row['date'];
        $rateDate = date('Y/m/d', strtotime($getdate.'+ 1 days'));
        if($currdate >= $rateDate){
            echo "<td><a href = \"rate.php?busNum=".$row['busNum']."\"target='_blank'>Rating</a></td>";
        }
        else{
            echo "<td><a href = '#'>Rating</a></td>";
        }
    }
}
?>
</table>
    
</body>

</html>