<?php 
    $busNum = $_POST["busNum"];
    $tFrom = $_POST["travelling-from"];
    $tTo = $_POST["travelling-to"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $price = $_POST["price"];
    include "conn.php";
    $sqlSeatDel = "DELETE from seats where bus_no = '$busNum'";
    $res = mysqli_query($conn, $sqlSeatDel);
    $sqlTicketDel = "DELETE from tickets where busNum = '$busNum'";
    $resTicketDel = mysqli_query($conn, $sqlTicketDel);
    $sql = "UPDATE bus_routes set travellingFrom = '$tFrom', travellingTo = '$tTo', date = '$date', time = '$time', price = '$price' WHERE busNUm = '$busNum'";
    $res = mysqli_query($conn, $sql);
    if(!$res){
        die("Failed to update".mysqli_error($conn));
    }
    else{
        header("location: admin-homepage.php");
    }
?>