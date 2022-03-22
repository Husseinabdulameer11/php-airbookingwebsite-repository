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
    <form method="POST"action="">
       <label>title</label>
       <input type="text"placeholder="title"name="title"required><br>
       <label>textfield</label>
       <input type="text"placeholder="artical_description"name="artical_description">
       <textarea placeholder="text" name="content" required></textarea>
       <input type="text"name="author"placeholder="author"required>
       <input type="datetime-local"name="written_date"required><br>
       <input type="submit"value="submit">
       </form>
    
       <?php 
       if(isset($_POST['content'])  || isset($_POST['title']) || isset($_POST['author']) ||isset($_POST['written_date'])||isset($_POST['artical_description'])){
        $content = mysql_real_escape_string($_POST['content']);
        $title = mysql_real_escape_string($_POST['title']);
        $description = mysql_real_escape_string($_POST['artical_description']);
        $author = mysql_real_escape_string($_POST['author']);
        $date = mysql_real_escape_string($_POST['written_date']);
        
        //$image=mysql_real_escape_string($_POST['image_upload']);
        // insert record
        $sql="INSERT INTO mineartikkler (title, artical_content,author,written_date,artical_description) VALUES ('$title','$content','$author','$date','$description')";
        if($connection ->query($sql)===TRUE){
            echo "values inserted into table";
        }
        else{
            echo "ERROR: ". $sql . "<br>" .$connection->error;
        }   
    
    }
       ?>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>