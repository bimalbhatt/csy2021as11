<?php
include 'connectiondb.php';
include 'userheader.php';
?>
<main>
<form action="editcategory.php?$categorynamesid=" method="POST">
    <label>Category:</label> <input type="text" value="<?php
    $cate_name=$_GET['$categorynamesid'];
    echo $cate_name;
    ?>"; name="paribartancategory" />
    <input type="submit" value="Edit Category" name="categoryparibartankolagi" />
</form>
</main>
<?php

if (isset($_POST['categoryparibartankolagi'])){

$categorykousernamehaiyo=$_POST['paribartancategory'];

$databasekolagihoyo = $pdo->query("UPDATE category SET categoryname='.$categorykousernamehaiyo.' WHERE categoryname='.$cate_name.'");



if ($databasekolagihoyo) {
    echo"<script>alert('successful added category into you database')</script>";
    // header("Location: adminheader.php");
    echo "<script>window.location.href = 'adminheader.php';</script>";
  }
  }

?>



