<?php
include 'navbar.php'; 
$query="SELECT * FROM `mineartikkler`";
$result=mysqli_query($connection,$query);
$queryresults=mysqli_num_rows($result);
if($queryresults > 0){
while($row= mysqli_fetch_assoc($result)){
    //echo "<div><h3>".$row['title']."</h3><p>".$row['artical_content']."</p><p>".$row['written_date']."</p><p>Author: ".$row['author']."</p></div>";
    echo "<div>
    <a href='artical.php?title=".$row['title']."&date=".$row["written_date"]."'>
    <h3>".$row["title"]."</h3>
    <p>".$row["artical_content"]."</p>
    <p>".$row["written_date"]."</p>
    <p>".$row["author"]."</p>
    </a>
    </div>
    ";
}

}

//while($row_of_items=mysqli_fetch_array($result)){
  //echo "<br> <div><h6>".$row_of_items["title"]."</h6><br> ".$row_of_items["artical_content"]."<br><a href='artical.php?title=".$row_of_items['title']."'>read artical</a></div>";}
  
  ?>
  </body>
  </html>