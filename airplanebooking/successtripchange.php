<?php

$connection = mysqli_connect("localhost","root","","airplanebookingdatabase");
if(!$connection){
    echo "not connected";
}
else{
    echo "connected";
}
session_start();
$NewAmountOfSeats=$_SESSION["amount_of_seats"]-$_SESSION["SumOfBookers"];
echo "<br>";
echo"sum of bookers".$_SESSION["SumOfBookers"]."<br><br>";
echo $NewAmountOfSeats;
echo "<br>";
echo $_SESSION["newbalance"];
$sql="UPDATE `trips` SET `amount_of_seats`='$NewAmountOfSeats'Where `trip_id`=".$_SESSION["trip_ID"]."";
//$sql="UPDATE `trips` SET `amount_of_seats`='$NewAmountOfSeats' WHERE `trip_name`=".$_SESSION['trip_name']."";
$result=mysqli_query($connection,$sql);


?>
