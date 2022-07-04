<?php 
    session_start();
    include "../conn.php";
    $email = $_SESSION['tt'];
    $sql = "SELECT uname FROM user_login WHERE email = '$email'";
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){
            $uname = $row['uname'];
        }
    }             
    $count = 0;          
    $busNum = $_POST['busNum'];
    $rating = $_POST['rating'];
    $sql1 = "SELECT uname FROM ratings WHERE busNum = '$busNum'";
    $res1 = mysqli_query($conn, $sql1);
        foreach($res1 as $value){
            if(implode(" ", $value)==$uname){
                $count++;
            }
        }
        if($count != 0){
               $sql3 = "UPDATE ratings set ratings = $rating WHERE busNum = '$busNum' AND uname = '$uname'"; 
               $res3 = mysqli_query($conn, $sql3);
               if($res3){
                   echo "<script>
                        alert('Rated successfully');
                        window.location.href='my-tickets.php';
                        </script>";
               }
            }

    else{
        $sql2 = "INSERT INTO ratings(busNum, ratings, uname) values('$busNum', '$rating', '$uname')";
                $res2 = mysqli_query($conn, $sql2);
                if($res2){
                    echo "<script>
                         alert('Rated successfully');
                        window.location.href='my-tickets.php';
                         </script>";
                }
    }
    $sqlAvg = "SELECT AVG(ratings) AS avgRating FROM ratings WHERE busNum='$busNum'";
    $resAvg = mysqli_query($conn, $sqlAvg);
    if(mysqli_num_rows($resAvg)>0){
        while($row=mysqli_fetch_assoc($resAvg)){
            $rating = $row['avgRating'];
            $sqlUpdate = "UPDATE bus_routes set ratings = $rating WHERE busNum = '$busNum'";
            $resUpdate = mysqli_query($conn, $sqlUpdate);
        }
    }
?>