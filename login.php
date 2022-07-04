<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Ticket Booking</title>
    <link rel="stylesheet" href="styles/index.css">
</head>
<body>
    <div class="top-bar">
        <a href="index.php" id="home" >Home</a>
        <a href="about.php" id="about">About</a>
        <a href="login.php" id="login">Login</a>
    </div>
    <h1 class="title">Online Bus Ticket Booking System</h1>
    <br><hr>
    <!-- <div class="SMS">
    </div> -->
	<div class="user">
		<h3>User Login</h3>
		<form action="signin.php" method="post" >
			<label>Email:</label>
            <br>
			<input type="text" name="email">
			<br><br>
			<label>Password:</label>
            <br>
			<input type="password" name="password">
			<br>
			<input type="submit" name="submit" value="Login">
            <br><br>
			<div class="not"></div>
			<label>Not a user?</label>
			<a href="signup.php" style="text-decoration: none;">Sign up</a>
		</form>
	</div> 
</body>
</html>