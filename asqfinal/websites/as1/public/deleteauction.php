<?php
include 'connectiondb.php';


$auction_id = $_GET['auctionkoid'];


$calofcatfromdatabasetable = $pdo->prepare("DELETE FROM auction WHERE auction_id = ?");
$calofcatfromdatabasetable->execute([$auction_id]);

// header("Location: auctionadmin.php");
echo "<script>window.location.href = 'auctionadmin.php';</script>";
exit();
?>