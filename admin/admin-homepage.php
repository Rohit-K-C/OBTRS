<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Ticket Booking</title>
    <link rel="stylesheet" href="../styles/index.css">
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
    <a href="display-bus.php" id="display-bus" target="iframe">Display Buses</a>
    <a href="add-bus.php" id="add-bus" target="iframe">Add Buses</a>
    <IFrame name="iframe" class="iframe" src="">
    </IFrame>
    
</body>
</html>