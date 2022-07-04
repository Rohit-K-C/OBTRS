<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <link rel="stylesheet" href="../styles/add-bus.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
</head>
<body>
    <div class="main-div">
        <h3>Add Bus</h3>
        <form action="add.php" method="post" onsubmit="return validate()">
            <label>Bus Number:</label>
            <br>
            <input type="text" name="busNum" id="busNum">
            <br>
            <label>Travelling from:</label>
            <br>
            <input type="text" name="travelling-from" id="travelling-from">
            <br>
            <label>Travelling to:</label>
            <br>
            <input type="text" name="travelling-to" id="travelling-to">
            <br>
            <label>Date:</label>
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
            <label>Time:</label>
            <br>
            <input type="time" name="time" id="time">
            <br>
            <label>Price per seat:</label>
            <br>
            <input type="text" name="price" id="price">
            <br>
            <input type="submit" value="Add">
        </form>
    </div>
</body>
<script type="text/javascript">
    function validate(){

        var busNum = document.getElementById("busNum").value;
        var tFrom = document.getElementById("travelling-from").value;
        var tTo = document.getElementById("travelling-to").value;
        var date = document.getElementById("date_picker").value;

        if(busNum == "" || tFrom == "" || tTo == "" || date == "" || time == ""){
            alert("All fields are required!");
            return false;
        }

        <?php 
            include "conn.php";
            $sql1 = "SELECT busNum from bus_routes";
            $res1 = mysqli_query($conn, $sql1);
            if(mysqli_num_rows($res1) > 0){
                while($row = mysqli_fetch_assoc($res1)){
        ?>
                else if(busNum == <?php echo $row['busNum'];?>){
                    alert("Bus number already exist");
                    return false;
                }
                <?php
                }
            }
        ?>

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
            alert("Bus is added");
            return true;
        }
    }
</script>
</html>