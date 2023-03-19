<?php
include 'connectiondb.php';
include 'userheader.php';
?>
<main>
<form action="addcategory.php" method="POST">
    <label>Category:</label> <input type="text" name="thapnalaicategory" />
    <input type="submit" value="Add Category" name="categorythapkolaginame" />
</form>
</main>
<?php

if (isset($_POST['categorythapkolaginame'])){
$categorykousernamehaiyo=$_POST['thapnalaicategory'];
$fordatabasecategorycheck=$pdo->prepare("SELECT * from category WHERE categoryname=? ");
$fordatabasecategorycheck->execute([$categorykousernamehaiyo]);
$numberofrows=$fordatabasecategorycheck->rowCount();
if($numberofrows >0){
  
  echo'<main><center>This category name is alreadedy inserted try other</center></main>';
}else{
  $databasekolagihoyo=$pdo->prepare("INSERT INTO category(categoryname) VALUES (:catnamehoyothapekowala)");
 
 $databaseinfoofcategory=[
'catnamehoyothapekowala'=>$categorykousernamehaiyo

 ];
 $checkingresult=$databasekolagihoyo->execute($databaseinfoofcategory);
 if ($checkingresult) {
    echo"<script>alert('successful added category into you database')</script>";
  } else {
    echo"<script>alert('Unfortunately')</script>";
  }
}
 
}
?>
<a href="adminheader.php"><h5>Back To The category page</h5></a>


