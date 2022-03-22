<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
include("../include.php");
//check for connection errors
if($connection->connect_error){
    die("connection failed: ".$connection->connection_error);
    }
    else{
        echo "connected to articl database";
    }


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
 <div class="form">
 <a href="dashboard-utenbilde.php">uten bilde</a>
 <a href="dashboard-medbilde.php">med bilde</a>
 </div>
 </body>
 </html>