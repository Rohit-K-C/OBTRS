<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles/signup.css">
</head>
<body>
    <div class="top-bar">
        <a href="index.php" id="home" >Home</a>
        <a href="about.php" id="about">About</a>
        <a href="login.php" id="login">Login</a>
    </div>
    <h1 class="title">Online Bus Ticket Booking System</h1>
    <br><hr>
	<div class="SU">
	<h3>Sign Up</h3>
    <div class="form">
	<form method="post" action="signup-insert.php" onsubmit="return validateForm()">
		<label>Email:</label>
        <br>
        <input type="email" name="email" id="email">
		<br><br>
		<label>Username:</label>
        <br>
        <input type="text" name="username" id="uname">
		<br><br>
		<label>Password:</label>
        <br>
        <input type="password" name="password" id="pwd">
		<br><br>
        <label>Mobile Number:</label>
        <br>
        <input type="text" name="num" id="num">
		<br>
		<input type="submit" value="Sign Up" id="signup">
	</form>
    </div>
	</div>
</body>
<script type="text/javascript">
    function validateForm(){
        
        var email = document.getElementById("email").value;
        var atpos = email.indexOf("@");
        var dotpos = email.lastIndexOf(".");
        var uname = document.getElementById("uname").value;
        var pwd = document.getElementById("pwd").value;
        var num = document.getElementById("num").value; 

        if(email == "" || uname == "" || pwd == "" || num == ""){
            alert("All fields are required!");
            return false;
        }

        else if(email == "admin@admin.com"){
            alert("Invalid email address!");
            return false;
        }

        else if(atpos<1&&dtpos<2){
			alert("Please enter a valid email address");
            return false;
		}

        else if(pwd.length < 8){
            alert("Password must be long than 8 characters");
            return false;
        }

        else if(pwd.length > 20){
            alert("Password must be small than 20 characters");
            return false;
        }

        else if(!num.match(/^[0-9]+$/)){
            alert("Invalid number");
            return false;
		}

        else if(num.length < 10 || num.length > 10){
            alert("Invalid number");
            return false;
		}
        
        else{
			alert("Your account is created");
            return true;
		}           
    }
</script>
</html>