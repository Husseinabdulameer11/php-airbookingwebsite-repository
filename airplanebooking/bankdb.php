<?php
$server="localhost";
$username="root";
$password="";
$dbname="bankdatabase";

$connection = mysqli_connect($server,$username,$password,$dbname);
    // Check connection
    if($connection->connect_error){
        die("connection failed: ".$connection->connection_error);
        }
        else{
            echo "connected to bank database";
        }
?>