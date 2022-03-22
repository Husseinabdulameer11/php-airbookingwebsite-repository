<?php
include 'db.php';
include("auth_session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>trip passenger information</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>trip_page</title>
</head>
<body>
<?php


$trip_from=mysqli_real_escape_string($connection,$_GET['trip_from']);
$trip_to=mysqli_real_escape_string($connection,$_GET['trip_to']);
$trip_name=mysqli_real_escape_string($connection,$_GET['trip_name']);
$query="SELECT * FROM trips WHERE trip_name='$trip_name'";
$result=mysqli_query($connection,$query);
$queryresult=mysqli_num_rows($result);
if($queryresult>0){
    while($row=mysqli_fetch_assoc($result)){
    echo "
    <h2>flight information:</h2>
    <h3>trip from: ".$row["trip_from"]."</h3>
    <h3>trip to: ".$row["trip_to"]."</h3>
    <p>departure date: ".$row["departure_date"]."</p>
    <p>return date: ".$row["return_date"]."</p>
    <p>trip name : ".$row["trip_name"]."</p>
    <p>ticket price : ".$row["ticket_price"]."</p>
    ";
   
    $_SESSION["ticket_price"]=$row["ticket_price"];
    $_SESSION["trip_name"]=$row["trip_name"];

    
    }
}
?>
<form action="payment.php" method="POST">
<?php
$input_counter=1; 
while ($input_counter <= $_SESSION['SumOfBookers']){
    echo "<div>the passengers amount :".$input_counter."</div>
    <label for='firstname_input'>first name</label>
    <input type='text'placeholder='first name' name=firstname_booker_".$input_counter." id='firstname_input' required>
    <label for='lastname_input'>last name</label>
    <input type='text'placeholder='last name' name=lastname_booker_".$input_counter." id='lastname_input' required>
    <label for='age_input'>age: </label>
    <input type='number'placeholder='age' min='1' name=age_booker_".$input_counter." id='age_input' required>
    <label for='gender_select'>gender: </label>
    <select required name=gender_booker_".$input_counter." id='gender_select'>
    <option value='' disabled selected>choose gender</option>
    <option value='male'>male</option>
    <option value='female'>female</option>
    </select>
    <br><br>
  
    ";
    $input_counter++;
}

?>
  <button type="submit">submit form</button>
</form>
</body>
</html>