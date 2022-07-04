<?php
    $busNum = $_GET["busNum"];
    include "conn.php";
    $sqlSeatDel = "DELETE from seats where bus_no = '$busNum'";
    $res = mysqli_query($conn, $sqlSeatDel);
    $sql = "DELETE from bus_routes where busNum = '$busNum'";
    $res = mysqli_query($conn, $sql);
    if(!$res){
        die("Failed to delete".mysqli_error($conn));
    }
    else{
        echo "<script> alert('Bus is deleted'); </script>";
        header("location: display-bus.php");
    }
    
?>