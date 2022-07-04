<?php 
    if(!$_SESSION['tt']){
        echo '<script>
        alert("Please login to book your ticket!"); 
        window.location.href="login.php";
        </script>';
    }
    else{
        echo "Welcome";
    }
?>