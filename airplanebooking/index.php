<?php
include("auth_session.php");
include("db.php");
//check for connection errors



$query="SELECT airport_name,airport_city FROM `airport_information`";
$result=mysqli_query($connection,$query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>-->
</head>
<body>
<?php
      $results=array();
      while($row=mysqli_fetch_array($result)){
        $results[]=$row;
      };
               
    ?>

    <form action="trip_search.php"method="Post">
    <label>from</label>
    <select name="trip_from" required>
    <option value=""disabled selected>Select an Airport</option>
     <?php
        foreach($results as $key => $row){
          echo "<option value=".$row['airport_name'].">".$row['airport_city']."</option>";
        }
   
    ?>
    </select>
   
    <label>to</label>
    <select name="trip_to" required>
    <option value=""disabled selected>Select an Airport</option>
     <?php
           foreach($results as $key => $row){
            echo "<option value=".$row['airport_name'].">".$row['airport_city']."</option>";
          }
        ?>
    </select>
    <br>
    <br>
    <label for="departure_date">travel date</label>
    <input type="date"name="departure_date" id="departure_date" required>
    <label for="return_date">return date</label>
    <input type="date"name="return_date"  id="return_date" required>
    <br>
    <label for="amount_adults">adults</label><input type="number"name="amount_adults" id="amount_adults"min="1" value="1">
    <label for="amount_teenagers">Teenagers</label><input type="number"name="amount_teenagers" id="amount_teenagers"min="0" value="0">
    <label for="amount_infants">infants</label><input type="number"name="amount_infants" id="amount_infants"min="0" value="0">
    <?php
    ?>
    <button type="submit" name="search_submit">search flights</button>
    </form>
  
    <button type="submit" name="payment_submit_btn" id="payment_btn">payment system</button>
    <div id="result"></div>
    <script>
    // prevent user from selecting dates before today
    var today = new Date().toISOString().split('T')[0];
document.getElementById("departure_date").setAttribute('min', today);
document.getElementById("return_date").setAttribute('min', today);
// test to prevent user from returning on a date before departure date
  //if(document.getElementById("departure_date").value != today){
  //document.getElementById("return_date").setAttribute('min', document.getElementById("departure_date").value);
//}



    
    </script>
<script>

</script>
</body>
</html>