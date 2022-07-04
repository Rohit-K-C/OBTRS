<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Ticket Booking</title>
    <link rel="stylesheet" href="../styles/index.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
</head>
<body>
<a href="my-tickets.php" id="mt">My tickets</a>
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
    <div class="main-div">
        <div class="search-box">
            <label class="search-bus"><img src="../images/search.png" alt="search-icon" id="search-icon">Search Buses</label>
            <br><br>
            <form action="searching.php" method="post" onsubmit="return validate()" target="iframeRoutes">
                <input type="text" placeholder="Travelling from" name="travelling-from" id="travelling-from">
                <br>
                <input type="text" placeholder="Travelling to" name="travelling-to" id="travelling-to">
                <br>
                <input type="date" name="date" id="date_picker">
                <script language="javascript">
                    var today = new Date();
                    var yyyy = today.getFullYear();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var mm = String(today.getMonth() + 1).padStart(2, '0');

                    today = yyyy + '-' + mm + '-' + dd;
                    $('#date_picker').attr('min',today);
                </script>
                <br>
                <input type="submit" value="Search" id="search">
             </form>
        </div>
        <div id="routes">
            <label id="route">Routes</label>
            <IFrame name="iframeRoutes" id="iframeRoutes" src="popularRoutes.php">
        </div> 
    </div>
   
</body>
<script type="text/javascript">
    function validate(){

        var tFrom = document.getElementById("travelling-from").value;
        var tTo = document.getElementById("travelling-to").value;
        var date = document.getElementById("date_picker").value;

        if(tFrom == "" || tTo == "" || date == ""){
            alert("All fields are required!");
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
            var url = "searching.php";
            document.getElementById("iframeRoutes").src = url;
            return true;
        }
    }
</script>
</html>