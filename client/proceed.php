<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');

/* *{
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    background-color: aqua;    
} */

.top-bar{
   display: flex;
   justify-content: right;
   justify-items: right;
   padding: 10px; 
   width: 100%; 
}
#home{
    text-decoration: none;
    font-weight: bold;
    font-size: 20px;
    background-color:aqua;
    margin-right: 10px;
    padding: 10px;
    color: black;
}

#about{
    text-decoration: none;
    font-weight: bold;
    font-size: 20px;
    background-color:aqua;
    margin-right: 10px;
    padding: 10px;
    color: black;    
}

#login{
    text-decoration: none;
    font-weight: bold;
    font-size: 20px;
    background-color:aqua;
    margin-right: 50px;
    padding: 10px;   
    color: black;
}

#home:hover{
    background-color: white ;
    transition: 0.3s ease;
}

#about:hover{
    background-color: white ;
    transition: 0.3s ease;
}

#login:hover{
    background-color: white ;
    transition: 0.3s ease;
}

.heading{
    display: flex;
}

.welcome{
    margin-left: 15px;
    width: 25%;
}

 .title{
    text-align: center; 
    font-family: 'Roboto', sans-serif;
    font-weight: 800;
    font-size: 50px;
    color: black;
    text-decoration: none;
    padding: 0;
    margin: 0;
}

/* about */

.about-us{
    text-align: center;
}

h1{
    font-size: 50px;
   
}

p{
    font-size: 30px;
}

#tick{
    background-color:rgb(0, 50, 67); 
    /* opacity: 0.8; */
    padding: 20px;
    border-radius:20px;
    width: 30%;
    height:300px;
    margin-left:35%;
    padding-bottom:50px;
    
}

#one{
    margin-top:50px;
    width:200px;
    /* background-color:red; */
    margin-right:50px;
    float:right;
}
#two{
    margin-top:50px;
    /* background-color:blue; */
    margin-left:50px;
    float:left;
}
label{
    color:white;
    font-size:20px;
    font-weight:bold;
    float: left;;
    
}
#pay{
    background-color: lightblue;
    position:absolute;
    font-size:20px;
    top:470px;
    left:700px;
    padding:5px;
    border-radius:10px;
}
#pay:hover{
    background-color:aqua;
}
body {
	background-size: 100%;
	font-family: 'Roboto', sans-serif;
    background-color: aqua;
}
</style>
<div class="top-bar">
        <a href="index.php" id="home" >Home</a>
        <a href="about.php" id="about">About</a>
        <a href="../index.php" id="login">Logout</a>
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
    $busNum = $_SESSION['bn'];
    include "../conn.php";
    $email = $_SESSION['tt'];
    $seatNo = $_SESSION['seatNo'];
    $tFrom = $_SESSION['tFrom'];
    $tTo = $_SESSION['tTo'];
    $date = $_SESSION['date'];
    $time = $_SESSION['time'];
    $totalSeats = count($seatNo);
    $totalAmt = 0;
    
    $sql = "SELECT * FROM seats WHERE bus_no = '$busNum' AND email = '$email'";
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){
            $totalAmt = (int) $totalSeats * (int) $row['price'];
        } 
        echo "<div id='tick'>";
        echo "<div id='one'>";
        echo " <label>".$tFrom."</label><br><br>";
        echo " <label>".$tTo."</label><br><br>";
        echo " <label>".$date."</label><br><br>";
        echo " <label>".$time."</label><br><br>";
        echo " <label>".$totalAmt."</label>";
        echo "</div>";

        echo "<div id='two'>";

        echo "<label>Travelling From : </label><br><br>";
        echo "<label>Travelling To : </label><br><br>";
        echo "<label>Date : </label><br><br>";
        echo "<label>Time : </label><br><br>";
        echo "<label>Total Amount : </label>";
        echo "</div>";
        echo "</div>";
        
    }
?>
  <form action="https://uat.esewa.com.np/epay/main" method="POST">
    <input value="<?php echo $totalAmt; ?>" name="tAmt" type="hidden">
    <input value="<?php echo $totalAmt; ?>" name="amt" type="hidden">
    <input value="0" name="txAmt" type="hidden">
    <input value="0" name="psc" type="hidden">
    <input value="0" name="pdc" type="hidden">
    <input value="epay_payment" name="scd" type="hidden">
    <input value="<?php echo $busNum; ?>" name="pid" type="hidden">
    <input value="http://localhost/obtrs/esewa/esewa_payment_success.php?q=su" type="hidden" name="su">
    <input value="http://localhost/obtrs/esewa/esewa_payment_failed.php?q=fu" type="hidden" name="fu">
    <input value="Pay with eSewa" type="submit" id="pay">
 </form>