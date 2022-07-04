<?php 
    session_start();
    $busNum = $_SESSION['bn'];
    include "../conn.php";
    $email = $_SESSION['tt'];   
    $tFrom = $_POST['tFrom'];
    $tTo = $_POST['tTo'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $rating = $_POST['rating'];
    $price = $_POST['price'];
    $seats = $_POST['seatNo'];
    $_SESSION['seatNo'] = $seats;
    $seatNo = $_SESSION['seatNo'];
    
    $sql = "INSERT INTO tickets(busNum, travellingFrom, travellingTo, date, time, price) values('$busNum', '$tFrom', '$tTo', '$date', '$time', '$price')";
    $res = mysqli_query($conn, $sql);
    if($res){
        echo "<script>alert('Booking successfull');
        window.location.href='../client/my-tickets.php'</script>";
    }	
    foreach($seats as $seat){
        $sqlSeats = "INSERT INTO seats(bus_no, seat_booked, email, price) values('$busNum', '$seat', '$email', '$price')";
        $resSeats = mysqli_query($conn, $sqlSeats);
        if($resSeats){
            echo "<script>alert('Booking successfull');
            window.location.href='../client/my-tickets.php'</script>";
        }
    }
?>