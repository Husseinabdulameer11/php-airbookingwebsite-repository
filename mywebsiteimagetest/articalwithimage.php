<?php
include 'include.php';

//while($row_of_items=mysqli_fetch_array($result)){
  //echo "<br> <div><h6>".$row_of_items["title"]."</h6><br> ".$row_of_items["artical_content"]."<br><a href='artical.php?title=".$row_of_items['title']."'>read artical</a></div>";}  
  ?>
  <html>
  <head>
  <link href="./css/bootstrap.min.css" rel="stylesheet">
  <link href="./css/mystyles/mystyles.css"rel="stylesheet">
  </head>
  <body>
<h1 class="artical-page-header">artical page</h1>
<?php
 $title=mysqli_real_escape_string($connection,$_GET['title']);
 $date=mysqli_real_escape_string($connection,$_GET['date']);
$query="SELECT * FROM `mineartikklermedbilde`WHERE title='$title'AND written_date='$date'";
$result=mysqli_query($connection,$query);
$queryresults=mysqli_num_rows($result);
if($queryresults > 0){
while($row= mysqli_fetch_assoc($result)){
    echo "<div>
    <img src='data:image/jpeg;base64,".base64_encode($row['artical_image'])."'height='100px''width='100px''>
    <h3 class='artical_title'>".$row["title"]."</h3>
    <p>".$row["artical_description"]."</p>
    <p>".$row["artical_content"]."</p>
    <p>".$row["written_date"]."</p>
    <p>".$row["author"]."</p>
    </div>
    ";
}
}
else{
echo "nothing inserted to be retreaved here";
}

?>

  </body>
  </html>

  <!--
phoneemailpassword: 




  -->