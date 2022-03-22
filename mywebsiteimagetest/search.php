<?php
include 'include.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Results</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/mystyles/searchpage.css"rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-light bg-danger">
  <a class="navbar-brand" href="index.php">Homepge</a>
</nav>
    <h1>Search results</h1>
    <div class="artical_container">
<?php
        if(isset($_POST['submit-search'])){
        $search=mysqli_real_escape_string($connection,$_POST['search']);
        $sql="SELECT * FROM mineartikkler where title LIKE '%$search%' OR artical_content LIKE '%$search%'OR written_date LIKE '%$search%' OR author LIKE '%$search%'";
        $result=mysqli_query($connection,$sql);
        $queryresults=mysqli_num_rows($result);

        $antallartikklerutenbilde=$queryresults;

       // echo "there are ".$queryresults." results matching your search";
        
        if($queryresults>0){
            while($row=mysqli_fetch_assoc($result)){
                echo "<div>
                <a href='artical.php?title=".$row['title']."&date=".$row["written_date"]."'>
                <h3>".$row["title"]."</h3>
                <p>".$row["artical_description"]."</p>
                <p>".$row["written_date"]."</p>
                <p>".$row["author"]."</p>
                </a>
                </div>
                ";
            
            }
        }
        //image 
        $search=mysqli_real_escape_string($connection,$_POST['search']);
        $sql="SELECT * FROM mineartikklermedbilde where title LIKE '%$search%'OR written_date LIKE '%$search%' OR author LIKE '%$search%'";
       // $sql="SELECT * FROM mineartikklermedbilde where title LIKE '%$search%' OR artical_content LIKE '%$search%'OR written_date LIKE '%$search%' OR author LIKE '%$search%'";
        $result=mysqli_query($connection,$sql);
        $queryresults=mysqli_num_rows($result);
        $antallartikklermedbilde=$queryresults;
        $queryresults=$antallartikklermedbilde+$antallartikklerutenbilde;
       
        
        if($queryresults>0){
     
            while($row=mysqli_fetch_assoc($result)){
                echo "<div>
                <a href='articalwithimage.php?title=".$row['title']."&date=".$row["written_date"]."'>
                <img src='data:image/jpeg;base64,".base64_encode($row['artical_image'])."'height='100px''width='100px''>
                <h3>".$row["title"]."</h3>
                <p>".$row["artical_description"]."</p>
                <p>".$row["written_date"]."</p>
                <p>".$row["author"]."</p>
                
                </a>
                </div>
                ";
            
            }
           // echo "<p>there are ".$queryresults." results matching your search</p>";
        }
        
        else{
            //echo "there are no results matching your search";
        }
     }
    
?>
    </div>
    <div><p class="artical_matching"><?php echo"there are ".$queryresults." results matching your search";?></p><br></div>
    <?php
//include 'footer.php';
?>

</body>

</html>
