<?php
  include("auth_session.php");
    $connection = mysqli_connect("localhost","root","","bankdatabase");
    // Check connection
    if($connection->connect_error){
        die("connection failed: ".$connection->connection_error);
        }
        else{
            echo "connected to bank database";
        }


//$sql="SELECT balance from users where creditcardnumber="$_SESSION["creditcardnumber"]=$creditcardnumber"AND creditcardavc="$_SESSION["creditcardavc"]"AND creditcardid="$_SESSION["creditcardidnumber"]"";
$newbalance=$_SESSION["account_balance"]-($_SESSION["ticket_price"]* $_SESSION['SumOfBookers']);
echo $newbalance;
$_SESSION["newbalance"]=$newbalance;
//$sql="UPDATE users SET balance=".$newbalance."WHERE creditcardnumber="$_SESSION["creditcardnumber"]=$creditcardnumber"AND creditcardavc="$_SESSION["creditcardavc"]"AND creditcardid="$_SESSION["creditcardidnumber"]"";
//$sql = "UPDATE users SET balance='$newbalance' WHERE creditcardnumber=$_SESSION["creditcardnumber"].";
//$sql = "UPDATE users SET balance=$newbalance WHERE creditcardnumber=".$_SESSION['creditcardnumber']."";
//$mysqli="UPDATE `users` SET `balance`='$newbalance' WHERE `creditcardnumber`=".$_SESSION['creditcardnumber']."";
$sql="UPDATE `users` SET `balance`='$newbalance' WHERE `creditcardnumber`=".$_SESSION['creditcardnumber']."";

$result=mysqli_query($connection,$sql);
mysqli_close($connection);
header("Location:successtripchange.php");
  
?>