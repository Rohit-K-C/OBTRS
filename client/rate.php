<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        #mainForm{
            background-color: rgb(0, 50, 67); 
            padding: 20px;
            width: 500px;
            border-radius: 20px;
            margin-left: 520px;
            color: white;
        }
        #mainForm form input[type='text']{
            margin-left: 10px;
            width: 100px;
            background: transparent;
            padding: 5px;
            color: white;
            border: none;
            outline: none;       
        }
        #BN{
            font-size: 20px;
            margin-left: 150px;
        }
        #rating{
            margin-left: 150px;
            
        }
        .result{
            margin-left: 200px;
            color: #a6a9ad
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Ticket Booking</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
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
        <h2 class="welcome" style="margin-left: 15px;
    width: 25%; font-size:25px; font-weight:bold;">Welcome <?php session_start();  
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
    <div id="mainForm">
    <form action="rated.php" method="POST">
        <?php 
            $busNum = $_GET['busNum'];
        ?>
        <label id="BN">Bus Number:</label><input type="text" name="busNum" value="<?php echo $busNum ?>" readonly><br><br>
        <div class="rateyo" id= "rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
         </div>
         <br><br>
    <span class='result'>Your Rating</span>
    <input type="hidden" name="rating">
 
    <input type="submit" value="Rate">
    
    </form>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script>
 
 
    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('Rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });
 
</script>
</body>
</html>