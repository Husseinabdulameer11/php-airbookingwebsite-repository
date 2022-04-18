<?php
include 'db.php';
include("auth_session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>trips search results</title>
</head>
<body>
<div class="trips_container">
<?php
if(isset($_POST['search_submit'])){
$trip_from=mysqli_real_escape_string($connection,$_POST['trip_from']);

$trip_to=mysqli_real_escape_string($connection,$_POST['trip_to']);

$departure_date=mysqli_real_escape_string($connection,$_POST['departure_date']);

$return_date=mysqli_real_escape_string($connection,$_POST['return_date']);

$amount_adults=mysqli_real_escape_string($connection,$_POST['amount_adults']);

$amount_teenagers=mysqli_real_escape_string($connection,$_POST['amount_teenagers']);

$amount_infants=mysqli_real_escape_string($connection,$_POST['amount_infants']);


$sum_of_bookers=$amount_adults+$amount_infants+$amount_teenagers;


$_SESSION['SumOfBookers']=$sum_of_bookers;
;
//echo "this is the amount of people that are going to book this time: ".$_SESSION['SumOfBookers']."";

$sql="SELECT * FROM trips where trip_from LIKE '%$trip_from%'AND trip_to LIKE '%$trip_to%'AND departure_date LIKE '%$departure_date' AND return_date LIKE '%$return_date'";
$result=mysqli_query($connection,$sql);

$queryresults=mysqli_num_rows($result);
//needs an image
if($queryresults>0){
    while($row=mysqli_fetch_assoc($result)){
        echo "<div>
        <h3>".$row["trip_from"]."</h3>
        <h3>".$row["trip_to"]."</h3>
        <p>".$row["departure_date"]."</p>
        <p>".$row["return_date"]."</p>
        <p>".$row["amount_of_seats"]."</p>
        <p>".$row["cabin_class"]."</p>
        <p>".$row["airplane_company_manager"]."</p>
        <a href='trip.php?trip_from=".$row['trip_from']."&trip_to=".$row['trip_to']."&trip_name=".$row['trip_name']."'>Book Now</a>
     
        
        </div>
        ";
        $_SESSION["amount_of_seats"]=$row["amount_of_seats"];
        $_SESSION["trip_ID"]=$row["trip_id"];
    }
}
else{
    echo "no flights found";
}
//echo " from: ".$trip_from."";
//echo " to : ".$trip_to."";
//echo " return date: ".$return_date."";
//echo " departure_date: ".$departure_date."";
//echo " amount of adults: ".$amount_adults." amount of teenagers: ".$amount_teenagers." amount of infants: ".$amount_infants." sum of all of them: ".$sum_of_bookers."";

}





?>
</div>
</body>
</html>
