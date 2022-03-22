<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
include("../include.php");
/*
$dir = "../Upload";

if(is_dir($dir)===false){
    mkdir($dir);
    echo "folder created";
}
else{
    echo "folder not created";
}
*/
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
    <form method="POST"action="" enctype="multipart/form-data">
       <label>title</label>
       <input type="text"placeholder="title"name="title"required><br>
       <label>textfield</label>
       <textarea placeholder="text" name="content" required></textarea>
       <input type="text"placeholder="artical_description"name="artical_description">
       <input type="text"name="author"placeholder="author"required>
       <input type="datetime-local"name="written_date"required><br>
       <input type="file"name="image_upload">
       <input type="submit"value="submit">
       </form>
    
       <?php 
       if(isset($_POST['content'])  || isset($_POST['title']) || isset($_POST['author']) ||isset($_POST['written_date'])||isset($_FILES['image_upload'])||isset($_POST['artical_description'])){
       
        $content = mysql_real_escape_string($_POST['content']);
        $title = mysql_real_escape_string($_POST['title']);
        $description = mysql_real_escape_string($_POST['artical_description']);
        $author = mysql_real_escape_string($_POST['author']);
        $date = mysql_real_escape_string($_POST['written_date']);

       if(!empty($_FILES["image_upload"]["name"])){
            $fileName=basename($_FILES["image_upload"]["name"]);
            $filetype=pathinfo($fileName,PATHINFO_EXTENSION);
            $allowtypes=array('jpg','png','jpeg','gif');
            if(in_array($filetype,$allowtypes)){
                $image=$_FILES['image_upload']['tmp_name'];
                $imgcontent=addslashes(file_get_contents($image));
                $insert=$connection->query("INSERT INTO mineartikklermedbilde (title, artical_content,author,written_date,artical_image,artical_description) VALUES ('$title','$content','$author','$date','$imgcontent','$description')");
                if($insert){
                    echo "file uploaded";
                }
                else{
                    echo "file not uploaded";
                }
            }
            else{
                echo "file not supported";
            }
       }




   }
    
       ?>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>