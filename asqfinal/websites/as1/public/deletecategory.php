<?php
include 'connectiondb.php';

$category_id = $_GET['categorynamesid'];


$calofcatfromdatabasetable = $pdo->prepare("DELETE FROM category WHERE id = ?");
$calofcatfromdatabasetable->execute([$category_id]);


header("Location: adminheader.php");
exit();
?>