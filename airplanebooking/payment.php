<?php
include("auth_session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head> 
<title>payment</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="images/favicon/favicon-32x32.png">
</head>
<body>
<section class="booker_information">
<h1>booker information: </h1>
<?php

$input_counter=1; 
while ($input_counter <= $_SESSION['SumOfBookers']){
    echo "<div><h2>booker".$input_counter."</h2>";
if(isset($_POST["firstname_booker_".$input_counter.""])){
  $firstname=$_POST["firstname_booker_".$input_counter.""];
  $lastname=$_POST["lastname_booker_".$input_counter.""];
  $age=$_POST["age_booker_".$input_counter.""];
  $gender=$_POST["gender_booker_".$input_counter.""];
  echo "<div>";
   echo "".$firstname." ".$lastname."<br><br>";
   echo "age: ".$age."<br><br>";
   echo "gender: ".$gender."<br><br>";
   echo "</div>";
   echo "</div>";
}
else{
    echo "not working";
}

$input_counter++;
}

?>
</section>
<hr>
<hr>
<section class="payment_information">
<div class="form">
<h1>payment:</h1>
<form action="payment_process.php" method="POST">
    <label for="firstname_input">firstname</label><center><input type="text" name="firstname" id="firstname_input" required></center><br>
    <label for="lastname_input">lastname</label><center><input type="text"  name="lastname" id="lastname_input" required></center><br>
   <label for="creditcardnumberinput">creditcard number</label> <center><!--<input type="number"  name="creditcardnumber" required>--><input type="tel" name="creditcardnumber"  pattern="[0-9]{25}"placeholder="enter your creditcardnumber 25 digits" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" id="creditcardnumberinput"></center><br>
   <label for="creditcardavcnumberinput"> creditcard avc</label><center><!--<input type="number"  name="creditcardavc" required>--><input type="tel" name="creditcardavc"  pattern="[0-9]{11}"placeholder="enter your creditcard avc number 11 digits" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" id="creditcardavcnumberinput"></center><br>
   <label for="creditcardidnumberinput">creditcard id number</label><center><!--<input type="number"  name="creditcardIDnumber"  required>--><input type="tel" name="creditcardIDnumber"  pattern="[0-9]{3}"placeholder="enter your creditcard id number 3 digits" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" id="creditcardidnumberinput"></center><br>
   
    <input type="submit" name="formsubbtn"value="submit">
</form>


<!--<input type="tel" id="phone" name="phone"
       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
       required>--> 


</section>
</body>
</html>