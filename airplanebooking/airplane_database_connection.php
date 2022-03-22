<?php
    // Enter your host name, database username, password, and database name.
    // If you have not set database password on localhost then set empty.
    $connection = mysqli_connect("localhost","root","","airplanebookingdatabase");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    
    }
    else{
        echo "connected succesfuly";
    }
    $query="SELECT trip_from,trip_to,Date FROM `trips`";
// variable with the results
$result=mysqli_query($connection,$query);

    while($row_of_items=mysqli_fetch_array($result)){
        echo "<br> ".$row_of_items["trip_from"]." ".$row_of_items["trip_to"]."<p>".$row_of_items["Date"]."</p><br>";
    }
?>