<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Ticket Booking</title>
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="stylesheet" href="../styles/edit.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
</head>
<body>
    <div class="top-bar">
        <a href="admin-homepage.php" id="home" >Home</a>
        <a href="about-admin.php" id="about">About</a>
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
    <?php 
        $busNum = $_GET["busNum"];
        include "conn.php";
        $bookedSeats = array();
        $sqlSeats = "SELECT seat_booked FROM seats WHERE bus_no='$busNum'";
        $resSeats = mysqli_query($conn, $sqlSeats);
        if(mysqli_num_rows($resSeats)>=0){
            while($rowSeats=mysqli_fetch_assoc($resSeats)){
                $bookedSeats[] = $rowSeats['seat_booked']; 
            }       
            if(count($bookedSeats) < 0){
                $availSeats =   25;
            }  
            else{
                $availSeats = (int) 25 - count($bookedSeats);
            }
        }
        $sql1 = "SELECT * from bus_routes where busNum = '$busNum'";
        $res1 = mysqli_query($conn, $sql1);
        if(mysqli_num_rows($res1)>0){
            while($row=mysqli_fetch_assoc($res1)){
    ?>
    
    <div class="main-div">
        <form method="post" action="update.php?busNum=<?php echo $busNum; ?>" onsubmit="return validate()">
            <label>Bus Number:</label>
            <br>
            <input type="text" name="busNum" id="busNum" value="<?php echo $row['busNum']; ?>" readonly>
            <br>
            <label>Travelling from:</label>
            <br>
            <input type="text" name="travelling-from" id="travelling-from" value="<?php echo $row['travellingFrom']; ?>">
            <br>
            <label>Travelling to:</label>
            <br>
            <input type="text" name="travelling-to" id="travelling-to" value="<?php echo $row['travellingTo']; ?>">
            <br>
            <label>Date:</label>
            <br>
            <input type="date" name="date" id="date_picker" value="<?php echo $row['date']; ?>">
            <script language="javascript">
                var today = new Date();
                var yyyy = today.getFullYear();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0');

                today = yyyy + '-' + mm + '-' + dd;
                $('#date_picker').attr('min',today);
            </script>
            <br>
            <label>Time:</label>
            <br>
            <input type="time" name="time" id="time" value="<?php echo $row['time']; ?>">
            <br>
            <label>Price per seat:</label>
            <br>
            <input type="text" name="price" id="price">
            <br>
            <label>Rating:</label>
            <br>
            <input type="float" name="rating" id="rating" value="<?php echo $row['ratings']; ?>" readonly>
            <div class="dis">
            <label type="text" id="lblAvailSeats">Available Seats: <?php echo $availSeats?></label>
            <label type="text" id="lblBookedSeats">Booked Seats: <?php echo count($bookedSeats)?></label>
            </div>
            <input type="submit" value="Update">
        </form>

    <?php } } ?>
</body>
<script type="text/javascript">
    function validate(){

        var busNum = document.getElementById("busNum").value;
        var tFrom = document.getElementById("travelling-from").value;
        var tTo = document.getElementById("travelling-to").value;
        var date = document.getElementById("date_picker").value;
        var price = document.getElementById("price").value;

        if(busNum == "" || tFrom == "" || tTo == "" || date == "" || time == "" || price == ""){
            alert("All fields are required!");
            return false;
        }

        else if(busNum.length != 4){
            alert("Bus number is invalid");
            return false;
        }

        else if(!tFrom.match(/^[A-Za-z]+$/)){
			alert("Invalid Location");
            return false;
        }

        else if(!tTo.match(/^[A-Za-z]+$/)){
			alert("Invalid Location");
            return false;
        }

        else{
            alert("Updated successfully");
            return true;
        }
    }
</script>
</html>
