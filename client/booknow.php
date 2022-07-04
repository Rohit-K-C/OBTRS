<html>
    <head>
<link rel="stylesheet" href="../styles/booknow.css">
</head>
<body>
    

<?php 
    session_start();
	$username = $_SESSION['tt'];
	include "../conn.php";
    $busNum = $_GET["busNum"];   
    $_SESSION['bn'] =  $busNum;
    $sql = "SELECT * FROM bus_routes WHERE busNum = '$busNum'";
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){            
?>
    <form action="booked.php" method="POST">
    <div class="book">
        <label class="lbl1">Bus Number: </label><input type="text" id="lblBus" name="busNum" readonly value='<?php echo $row["busNum"]; ?>'></input><br><br>
        <label class="lbl1">Travelling from: </label><input type="text" id="lblFrom" name="tFrom" readonly value='<?php echo $row["travellingFrom"]; ?>'></input><br><br>
        <label class="lbl1">Travelling to: </label><input type="text" id="lblTo" name="tTo" readonly value='<?php echo $row["travellingTo"]; ?>'></input><br><br>
        <label class="lbl1">Date: </label><input type="date" id="lblDate" name="date" readonly value='<?php echo $row["date"]; ?>'></input><br><br>
        <label class="lbl1">Time: </label><input type="time" id="lblTime" name="time" readonly value='<?php echo $row["time"]; ?>'></input><br><br>
        <label class="lbl1">Rating: </label><input type="text" id="lblRating" name="rating" readonly value='<?php echo $row["ratings"]; ?>'></input><br><br> 
        <label class="lbl1">Price per seat: </label><input type="text" id="lblPrice" name="price" readonly value='<?php echo $row["price"]; ?>'></input><br><br>
        <!-- <label class="lbl1">Total Amount: </label><input type="text" id="lblAmount" name="tAmount" readonly></input><br><br> -->
        <input type="submit" value="Proceed">
    </div>
<?php 
    }
}
?>
        <h3>Seats</h3>
        <div class="avail">
        <p>Available Seats:<label id="a">....</label></p>
        <p>Booked Seats:<label id="b">....</label></p>
        <p>Selected Seats:<label id="s">....</label></p>
    </div>
    <?php 
        $seatNums = array();
         $sql1 = "SELECT seat_booked FROM seats WHERE bus_no = '$busNum'";
         $res1 = mysqli_query($conn, $sql1);
         foreach ($res1 as $fetch) 
    {
    $seat=explode(",",$fetch['seat_booked']);
    foreach ($seat as $key) 
    {
        $seatNums[] = $key;
    }
    }    
    $sqlPrice = "SELECT price FROM bus_routes WHERE busNum = '$busNum'";
    $resPrice = mysqli_query($conn, $sql);
    if(mysqli_num_rows($resPrice)>0){
        while($rowPrice=mysqli_fetch_assoc($resPrice)){ 
            $price = implode(" ", $rowPrice);     
    ?>
    <div class="select">
        <table cellspacing="10px">
        <tr>
            <td colspan="2" ></td>
            <td></td>
            <td>
                <input type="checkbox" onchange='handleChange4(this,this.value);' id="4" name="seatNo[]" value="4" <?php if(in_array("4", $seatNums)){?> checked="checked" disabled<?php } ?>><input type="button" id="btn4" name="btn4" value="4" <?php if(in_array("4", $seatNums)){?> disabled <?php } ?>>    
            </td>
            <td>
                <input type="checkbox" onchange='handleChange8(this,this.value);' id="8" name="seatNo[]" value="8" <?php if(in_array("8", $seatNums)){?> checked="checked" disabled<?php } ?>><input type="button" id="btn8" name="btn8" value="8" <?php if(in_array("8", $seatNums)){?> disabled <?php } ?>>
            </td>
            <td>
                <input type="checkbox" onchange='handleChange12(this,this.value);' id="12" name="seatNo[]" value="12" <?php if(in_array("12", $seatNums)){?> checked="checked" disabled<?php } ?>><input type="button" id="btn12" name="btn12" value="12" <?php if(in_array("12", $seatNums)){?> disabled <?php } ?>>
            </td>
            <td>
                <input type="checkbox" onchange='handleChange16(this,this.value);' id="16" name="seatNo[]" value="16" <?php if(in_array("16", $seatNums)){?> checked="checked" disabled<?php } ?>><input type="button" id="btn16" name="btn16" value="16" <?php if(in_array("16", $seatNums)){?> disabled <?php } ?>>
            </td>
            <td>
                <input type="checkbox" onchange='handleChange20(this,this.value);' id="20" name="seatNo[]" value="20" <?php if(in_array("20", $seatNums)){?> checked="checked" disabled<?php } ?>><input type="button" id="btn20" name="btn20" value="20" <?php if(in_array("20", $seatNums)){?> disabled <?php } ?>>
            </td>
            <td>
                <input type="checkbox" onchange='handleChange25(this,this.value);' id="25" name="seatNo[]" value="25" <?php if(in_array("25", $seatNums)){?> checked="checked" disabled<?php } ?>><input type="button" id="btn25" name="btn25" value="25" <?php if(in_array("25", $seatNums)){?> disabled <?php } ?>>
            </td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td></td>
            <td>
                <input type="checkbox" onchange='handleChange3(this,this.value);' id="3" name="seatNo[]" value="3" <?php if(in_array("3", $seatNums)){?> checked="checked" disabled<?php } ?>><input type="button" id="btn3" name="btn3" value="3" <?php if(in_array("3", $seatNums)){?> disabled <?php } ?>>    
            </td>
            <td>
                <input type="checkbox" onchange='handleChange7(this,this.value);' id="7" name="seatNo[]" value="7" <?php if(in_array("7", $seatNums)){?> checked="checked" disabled<?php } ?>><input type="button" id="btn7" name="btn7" value="7" <?php if(in_array("7", $seatNums)){?> disabled <?php } ?>>
            </td>
            <td>
                <input type="checkbox" onchange='handleChange11(this,this.value);' id="11" name="seatNo[]" value="11" <?php if(in_array("11", $seatNums)){?> checked="checked" disabled<?php } ?>><input type="button" id="btn11" name="btn11" value="11" <?php if(in_array("11", $seatNums)){?> disabled <?php } ?>>
            </td>
            <td>
                <input type="checkbox" onchange='handleChange15(this,this.value);' id="15" name="seatNo[]" value="15" <?php if(in_array("15", $seatNums)){?> checked="checked" disabled<?php } ?>><input type="button" id="btn15" name="btn15" value="15" <?php if(in_array("15", $seatNums)){?> disabled <?php } ?>>
            </td>
            <td>
                <input type="checkbox" onchange='handleChange19(this,this.value);' id="19" name="seatNo[]" value="19" <?php if(in_array("19", $seatNums)){?> checked="checked" disabled<?php } ?>><input type="button" id="btn19" name="btn19" value="19" <?php if(in_array("19", $seatNums)){?> disabled <?php } ?>>
            </td>
            <td>
                <input type="checkbox" onchange='handleChange24(this,this.value);' id="24" name="seatNo[]" value="24" <?php if(in_array("24", $seatNums)){?> checked="checked" disabled<?php } ?>><input type="button" id="btn24" name="btn24" value="24" <?php if(in_array("24", $seatNums)){?> disabled <?php } ?>>
            </td>
        </tr>
        <tr>
            <td colspan="8"></td>
            <td>
                <input type="checkbox" onchange='handleChange23(this,this.value);' id="23" name="seatNo[]" value="23" <?php if(in_array("23", $seatNums)){?> checked="checked" disabled<?php } ?>><input type="button" id="btn23" name="btn23" value="23" <?php if(in_array("23", $seatNums)){?> disabled <?php } ?>>
            </td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" onchange='handleChange2(this,this.value);' id="2" name="seatNo[]" value="2" <?php if(in_array("2", $seatNums)){?> checked="checked" disabled<?php } ?>><input type="button" id="btn2" name="btn2" value="2" <?php if(in_array("2", $seatNums)){?> disabled <?php } ?>>    
            </td>
            <td colspan="2"></td>
            <td></td>
            <td>
                <input type="checkbox" onchange='handleChange6(this,this.value);' id="6" name="seatNo[]" value="6" <?php if(in_array("6", $seatNums)){?> checked="checked" disabled<?php } ?>><input type="button" id="btn6" name="btn6" value="6" <?php if(in_array("6", $seatNums)){?> disabled <?php } ?>>
            </td>
            <td>
                <input type="checkbox" onchange='handleChange10(this,this.value);' id="10" name="seatNo[]" value="10" <?php if(in_array("10", $seatNums)){?> checked="checked" disabled<?php } ?>><input type="button" id="btn10" name="btn10" value="10" <?php if(in_array("10", $seatNums)){?> disabled <?php } ?>>
            </td>
            <td>
                <input type="checkbox" onchange='handleChange14(this,this.value);' id="14" name="seatNo[]" value="14" <?php if(in_array("14", $seatNums)){?> checked="checked" disabled<?php } ?>><input type="button" id="btn14" name="btn14" value="14" <?php if(in_array("14", $seatNums)){?> disabled <?php } ?>>
            </td>
            <td>
                <input type="checkbox" onchange='handleChange18(this,this.value);' id="18" name="seatNo[]" value="18" <?php if(in_array("18", $seatNums)){?> checked="checked" disabled<?php } ?>><input type="button" id="btn18" name="btn18" value="18" <?php if(in_array("18", $seatNums)){?> disabled <?php } ?>>
            </td>
            <td>
                <input type="checkbox" onchange='handleChange22(this,this.value);' id="22" name="seatNo[]" value="22" <?php if(in_array("22", $seatNums)){?> checked="checked" disabled<?php } ?>><input type="button" id="btn22" name="btn22" value="22" <?php if(in_array("22", $seatNums)){?> disabled <?php } ?>>
            </td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" onchange='handleChange1(this, this.value);' id="1" name="seatNo[]" value="1" <?php if(in_array("1", $seatNums)){?> checked="checked" disabled<?php } ?>><input type="button" id="btn1" name="btn1" value="1"<?php if(in_array("1", $seatNums)){?> disabled <?php } ?>>    
            </td>
            <td colspan="2"></td>
            <td></td>
            <td>
                <input type="checkbox" onchange='handleChange5(this,this.value);' id="5" name="seatNo[]" value="5" <?php if(in_array("5", $seatNums)){?> checked="checked" disabled<?php } ?>><input type="button" id="btn5" name="btn5" value="5" <?php if(in_array("5", $seatNums)){?> disabled <?php } ?>>
            </td>
            <td>
                <input type="checkbox" onchange='handleChange9(this,this.value);' id="9" name="seatNo[]" value="9" <?php if(in_array("9", $seatNums)){?> checked="checked" disabled<?php } ?>><input type="button" id="btn9" name="btn9" value="9" <?php if(in_array("9", $seatNums)){?> disabled <?php } ?>>
            </td>
            <td>
                <input type="checkbox" onchange='handleChange13(this,this.value);' id="13" name="seatNo[]" value="13" <?php if(in_array("13", $seatNums)){?> checked="checked" disabled<?php } ?>><input type="button" id="btn13" name="btn13" value="13" <?php if(in_array("13", $seatNums)){?> disabled <?php } ?>>
            </td>
            <td>
                <input type="checkbox" onchange='handleChange17(this,this.value);' id="17" name="seatNo[]" value="17" <?php if(in_array("17", $seatNums)){?> checked="checked" disabled<?php } ?>><input type="button" id="btn17" name="btn17" value="17" <?php if(in_array("17", $seatNums)){?> disabled <?php } ?>>
            </td>
            <td>
                <input type="checkbox" onchange='handleChange21(this,this.value);' id="21" name="seatNo[]" value="21" <?php if(in_array("21", $seatNums)){?> checked="checked" disabled<?php } ?>><input type="button" id="btn21" name="btn21" value="21" <?php if(in_array("21", $seatNums)){?> disabled <?php } ?>>
            </td>
        </tr>        
        </table>
    </div>
    <?php } } ?>
</form>
<script type="text/javascript">   
function handleChange1(checkbox, value, price) {
    let btn = document.getElementById("btn1");
    if(checkbox.checked == true){
        btn.style.backgroundColor="rgb(29, 239, 29)";        
        //document.getElementById("lblAmount").value += parseInt(price); 
    }
    else{
        btn.style.backgroundColor="white";  
       // document.getElementById("lblAmount").value -= parseInt(price);  
   }
}

function handleChange2(checkbox, value) {
    if(checkbox.checked == true){
        let btn = document.getElementById("btn2");
        btn.style.backgroundColor="rgb(29, 239, 29)";        
        document.getElementById("seat-no").value+=value;
    }else{
        let btn = document.getElementById("btn2");
        btn.style.backgroundColor="white";      
        document.getElementById("seat-no").value = "";
   }
}

function handleChange3(checkbox, value) {
    if(checkbox.checked == true){
        let btn = document.getElementById("btn3");
        btn.style.backgroundColor="rgb(29, 239, 29)";        
        document.getElementById("seat-no").value+=value;
    }else{
        let btn = document.getElementById("btn3");
        btn.style.backgroundColor="white";      
        document.getElementById("seat-no").value = "";
   }
}

function handleChange4(checkbox, value) {
    if(checkbox.checked == true){
        let btn = document.getElementById("btn4");
        btn.style.backgroundColor="rgb(29, 239, 29)";        
        document.getElementById("seat-no").value+=value;
    }else{
        let btn = document.getElementById("btn4");
        btn.style.backgroundColor="white";      
        document.getElementById("seat-no").value = "";
   }
}

function handleChange5(checkbox, value) {
    if(checkbox.checked == true){
        let btn = document.getElementById("btn5");
        btn.style.backgroundColor="rgb(29, 239, 29)";        
        document.getElementById("seat-no").value+=value;
    }else{
        let btn = document.getElementById("btn5");
        btn.style.backgroundColor="white";      
        document.getElementById("seat-no").value = "";
   }
}

function handleChange6(checkbox, value) {
    if(checkbox.checked == true){
        let btn = document.getElementById("btn6");
        btn.style.backgroundColor="rgb(29, 239, 29)";        
        document.getElementById("seat-no").value+=value;
    }else{
        let btn = document.getElementById("btn6");
        btn.style.backgroundColor="white";      
        document.getElementById("seat-no").value = "";
   }
}

function handleChange7(checkbox, value) {
    if(checkbox.checked == true){
        let btn = document.getElementById("btn7");
        btn.style.backgroundColor="rgb(29, 239, 29)";        
        document.getElementById("seat-no").value+=value;
    }else{
        let btn = document.getElementById("btn7");
        btn.style.backgroundColor="white";      
        document.getElementById("seat-no").value = "";
   }
}

function handleChange8(checkbox, value) {
    if(checkbox.checked == true){
        let btn = document.getElementById("btn8");
        btn.style.backgroundColor="rgb(29, 239, 29)";        
        document.getElementById("seat-no").value+=value;
    }else{
        let btn = document.getElementById("btn8");
        btn.style.backgroundColor="white";      
        document.getElementById("seat-no").value = "";
   }
}

function handleChange9(checkbox, value) {
    if(checkbox.checked == true){
        let btn = document.getElementById("btn9");
        btn.style.backgroundColor="rgb(29, 239, 29)";        
        document.getElementById("seat-no").value+=value;
    }else{
        let btn = document.getElementById("btn9");
        btn.style.backgroundColor="white";      
        document.getElementById("seat-no").value = "";
   }
}

function handleChange10(checkbox, value) {
    if(checkbox.checked == true){
        let btn = document.getElementById("btn10");
        btn.style.backgroundColor="rgb(29, 239, 29)";        
        document.getElementById("seat-no").value+=value;
    }else{
        let btn = document.getElementById("btn10");
        btn.style.backgroundColor="white";      
        document.getElementById("seat-no").value = "";
   }
}

function handleChange11(checkbox, value) {
    if(checkbox.checked == true){
        let btn = document.getElementById("btn11");
        btn.style.backgroundColor="rgb(29, 239, 29)";        
        document.getElementById("seat-no").value+=value;
    }else{
        let btn = document.getElementById("btn11");
        btn.style.backgroundColor="white";      
        document.getElementById("seat-no").value = "";
   }
}

function handleChange12(checkbox, value) {
    if(checkbox.checked == true){
        let btn = document.getElementById("btn12");
        btn.style.backgroundColor="rgb(29, 239, 29)";        
        document.getElementById("seat-no").value+=value;
    }else{
        let btn = document.getElementById("btn12");
        btn.style.backgroundColor="white";      
        document.getElementById("seat-no").value = "";
   }
}

function handleChange13(checkbox, value) {
    if(checkbox.checked == true){
        let btn = document.getElementById("btn13");
        btn.style.backgroundColor="rgb(29, 239, 29)";        
        document.getElementById("seat-no").value+=value;
    }else{
        let btn = document.getElementById("btn13");
        btn.style.backgroundColor="white";      
        document.getElementById("seat-no").value = "";
   }
}

function handleChange14(checkbox, value) {
    if(checkbox.checked == true){
        let btn = document.getElementById("btn14");
        btn.style.backgroundColor="rgb(29, 239, 29)";        
        document.getElementById("seat-no").value+=value;
    }else{
        let btn = document.getElementById("btn14");
        btn.style.backgroundColor="white";      
        document.getElementById("seat-no").value = "";
   }
}

function handleChange15(checkbox, value) {
    if(checkbox.checked == true){
        let btn = document.getElementById("btn15");
        btn.style.backgroundColor="rgb(29, 239, 29)";        
        document.getElementById("seat-no").value+=value;
    }else{
        let btn = document.getElementById("btn15");
        btn.style.backgroundColor="white";      
        document.getElementById("seat-no").value = "";
   }
}

function handleChange16(checkbox, value) {
    if(checkbox.checked == true){
        let btn = document.getElementById("btn16");
        btn.style.backgroundColor="rgb(29, 239, 29)";        
        document.getElementById("seat-no").value+=value;
    }else{
        let btn = document.getElementById("btn16");
        btn.style.backgroundColor="white";      
        document.getElementById("seat-no").value = "";
   }
}

function handleChange17(checkbox, value) {
    if(checkbox.checked == true){
        let btn = document.getElementById("btn17");
        btn.style.backgroundColor="rgb(29, 239, 29)";        
        document.getElementById("seat-no").value+=value;
    }else{
        let btn = document.getElementById("btn17");
        btn.style.backgroundColor="white";      
        document.getElementById("seat-no").value = "";
   }
}

function handleChange18(checkbox, value) {
    if(checkbox.checked == true){
        let btn = document.getElementById("btn18");
        btn.style.backgroundColor="rgb(29, 239, 29)";        
        document.getElementById("seat-no").value+=value;
    }else{
        let btn = document.getElementById("btn18");
        btn.style.backgroundColor="white";      
        document.getElementById("seat-no").value = "";
   }
}

function handleChange19(checkbox, value) {
    if(checkbox.checked == true){
        let btn = document.getElementById("btn19");
        btn.style.backgroundColor="rgb(29, 239, 29)";        
        document.getElementById("seat-no").value+=value;
    }else{
        let btn = document.getElementById("btn19");
        btn.style.backgroundColor="white";      
        document.getElementById("seat-no").value = "";
   }
}

function handleChange20(checkbox, value) {
    if(checkbox.checked == true){
        let btn = document.getElementById("btn20");
        btn.style.backgroundColor="rgb(29, 239, 29)";        
        document.getElementById("seat-no").value+=value;
    }else{
        let btn = document.getElementById("btn20");
        btn.style.backgroundColor="white";      
        document.getElementById("seat-no").value = "";
   }
}

function handleChange21(checkbox, value) {
    if(checkbox.checked == true){
        let btn = document.getElementById("btn21");
        btn.style.backgroundColor="rgb(29, 239, 29)";        
        document.getElementById("seat-no").value+=value;
    }else{
        let btn = document.getElementById("btn21");
        btn.style.backgroundColor="white";      
        document.getElementById("seat-no").value = "";
   }
}

function handleChange22(checkbox, value) {
    if(checkbox.checked == true){
        let btn = document.getElementById("btn22");
        btn.style.backgroundColor="rgb(29, 239, 29)";        
        document.getElementById("seat-no").value+=value;
    }else{
        let btn = document.getElementById("btn22");
        btn.style.backgroundColor="white";      
        document.getElementById("seat-no").value = "";
   }
}

function handleChange23(checkbox, value) {
    if(checkbox.checked == true){
        let btn = document.getElementById("btn23");
        btn.style.backgroundColor="rgb(29, 239, 29)";        
        document.getElementById("seat-no").value+=value;
    }else{
        let btn = document.getElementById("btn23");
        btn.style.backgroundColor="white";      
        document.getElementById("seat-no").value = "";
   }
}

function handleChange24(checkbox, value) {
    if(checkbox.checked == true){
        let btn = document.getElementById("btn24");
        btn.style.backgroundColor="rgb(29, 239, 29)";        
        document.getElementById("seat-no").value+=value;
    }else{
        let btn = document.getElementById("btn24");
        btn.style.backgroundColor="white";      
        document.getElementById("seat-no").value = "";
   }
}

function handleChange25(checkbox, value) {
    if(checkbox.checked == true){
        let btn = document.getElementById("btn25");
        btn.style.backgroundColor="rgb(29, 239, 29)";        
        document.getElementById("seat-no").value+=value;
    }else{
        let btn = document.getElementById("btn25");
        btn.style.backgroundColor="white";      
        document.getElementById("seat-no").value = "";
   }
}
</script>
</body>
</html>