<?php
include("bankdb.php");
include("auth_session.php");

if(isset($_POST["formsubbtn"])){
    $firstname=$_POST["firstname"];
    $lastname=$_POST["lastname"];
    $creditcardnumber=$_POST["creditcardnumber"];
    $creditcardavc=$_POST["creditcardavc"];
    $creditcardidnumber=$_POST["creditcardIDnumber"];
    echo "<div>";
   echo "".$firstname." ".$lastname."<br><br>";
   echo "creditcardnumber: ".$creditcardnumber."<br><br>";
   echo "creditcard avc: ".$creditcardavc."<br><br>";
   echo "creditcardidnumber: ".$creditcardidnumber."<br><br>";
   echo "</div>";
    $sql="SELECT * from users where firstname='$firstname' AND lastname='$lastname' AND creditcardnumber='$creditcardnumber'AND creditcardavc='$creditcardavc'AND creditcardid='$creditcardidnumber'";
    $result=mysqli_query($connection,$sql);
    $queryresult=mysqli_num_rows($result);
if($queryresult>0){

    while($row=mysqli_fetch_assoc($result)){
    
        if(intval($row["balance"]) >= intval($_SESSION["ticket_price"])*intval($_SESSION['SumOfBookers'])){
            $_SESSION["creditcardfirstname"]=$firstname;
            $_SESSION["creditcardlastname"]=$lastname;
            $_SESSION["creditcardnumber"]=$creditcardnumber;
            $_SESSION["creditcardavc"]=$creditcardavc;
            $_SESSION["creditcardidnumber"]=$creditcardidnumber;
            $_SESSION["account_balance"]=$row["balance"];
            //need to work here to subtract amount of bookers from the airplane seats
            //mysqli_connect("localhost","root","","airplanebookingdatabase");
            
                $connection = mysqli_connect("localhost","root","","airplanebookingdatabase");
               
                $NewAmountOfSeats=$_SESSION["amount_of_seats"]-$_SESSION["SumOfBookers"];
                $_SESSION["NewAmountOfSeats"]=$NewAmountOfSeats;




echo "<br>";
echo"sum of bookers".$_SESSION["SumOfBookers"]."<br><br>";
echo $NewAmountOfSeats;
//$sql="UPDATE `trips` SET `amount_of_seats`='"$_SESSION["amount_of_seats"]-$_SESSION["SumOfBookers"]."'" WHERE `trip_name`="".$_SESSION['trip_name']."";
//$sql="UPDATE `trips` SET `amount_of_seats`='$NewAmountOfSeats' WHERE `trip_name`=".$_SESSION['trip_name']."";
//$result=mysqli_query($connection,$sql);







            header("Location: success.php");

          
        }
        else{
            header("Location: failure_not_enough_cash.php");
        }
   
}

}
else{
    header("Location: cardnotfound.php");
}
}
?>