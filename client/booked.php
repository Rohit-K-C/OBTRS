<?php 
    session_start();
    $busNum = $_SESSION['bn'];
    include "../conn.php";
    $email = $_SESSION['tt'];   
    $tFrom = $_POST['tFrom'];
    $_SESSION['tFrom'] = $tFrom;
    $tTo = $_POST['tTo'];
    $_SESSION['tTo'] = $tTo;
    $date = $_POST['date'];
    $_SESSION['date'] = $date;
    $time = $_POST['time'];
    $_SESSION['time'] = $time;
    $rating = $_POST['rating'];
    $price = $_POST['price'];
    $seats = $_POST['seatNo'];
    $_SESSION['seatNo'] = $seats;
    $seatNo = $_SESSION['seatNo'];
    
    $sql = "INSERT INTO tickets(busNum, travellingFrom, travellingTo, date, time, price, email) values('$busNum', '$tFrom', '$tTo', '$date', '$time', '$price', '$email')";
    $res = mysqli_query($conn, $sql);
    if($res){
        echo "<script>window.location.href='proceed.php'</script>";
    }	
    foreach($seats as $seat){
        $sqlSeats = "INSERT INTO seats(bus_no, seat_booked, email, price) values('$busNum', '$seat', '$email', '$price')";
        $resSeats = mysqli_query($conn, $sqlSeats);
        if($resSeats){
            echo "<script>window.location.href='proceed.php'</script>";
        }
    }
?>
