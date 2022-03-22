<?php
include 'navbar.php'; 
?>
<link rel="stylesheet"href="./css/mystyles/homepagestyle.css">
<div class="artical_container">
<?php
$query="SELECT * FROM `mineartikkler`";
$result=mysqli_query($connection,$query);
$queryresults=mysqli_num_rows($result);
if($queryresults > 0){
while($row= mysqli_fetch_assoc($result)){
   // echo "<div><h3>".$row['title']."</h3><p>".$row['artical_content']."</p><p>".$row['written_date']."</p><p>Author: ".$row['author']."</p></div>";
   echo "<div class='artikkel-div'>
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

$query="SELECT * FROM `mineartikklermedbilde`";
$result=mysqli_query($connection,$query);
$queryresults=mysqli_num_rows($result);
//echo $image_src;
if($queryresults > 0){
while($row= mysqli_fetch_assoc($result)){
  //echo '<h1>'.$image_src.'</h1>';
//echo $row['artical_image'].base64_encode($row['artical_image']);
    //echo "<div><h3>".$row['title']."</h3><p>".$row['artical_content']."</p><p>".$row['written_date']."</p><p>Author: ".$row['author']."</p></div>";
  //echo '<div style="background-image:url(upload/'.row["artical_image"].');"></div>';
  //<img src='upload/".$row['artical_image']."".base64_encode($row['artical_image'])."'>
    echo "<div class='artikkel-div'>
    <a href='articalwithimage.php?title=".$row['title']."&date=".$row["written_date"]."'>
    <img src='data:image/jpeg;base64,".base64_encode($row['artical_image'])."'height='100px''width='100px''>
    <h3>".$row["title"]."</h3>
   <p>".$row["artical_description"]."</p>
   <p>".$row["written_date"]."</p>
   <p>".$row["author"]."</p>
  
   </a>
  </div>
  ";

};
}
//while($row_of_items=mysqli_fetch_array($result)){
  //echo "<br> <div><h6>".$row_of_items["title"]."</h6><br> ".$row_of_items["artical_content"]."<br><a href='artical.php?title=".$row_of_items['title']."'>read artical</a></div>";}
  
  ?>
  </div>
  </body>
  <?php
  //include 'footer.php';
  ?>
  </html>