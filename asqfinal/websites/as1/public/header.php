<!DOCTYPE html>
<html>
	<head>
		<title>ibuy Auctions</title>
		<link rel="stylesheet" href="ibuy.css" />
	</head>

	<body>
		<header>
			<h1><span class="i">i</span><span class="b">b</span><span class="u">u</span><span class="y">y</span></h1>

			<form action="#">
				<input type="text" name="search" placeholder="Search for anything" />
				<input type="submit" name="submit" valueofcategorytable="Search" />
			</form>
		</header>

		<nav>
		
			<ul>
			<li><a href="index.php">Index Page</a></li>
			<?php
include "Connectiondb.php";
$databasevalueforcategory=$pdo -> query("SELECT * FROM category");
foreach($databasevalueforcategory as $valueofcategorytable){

echo'<li><a class="categoryLink" href="category.php?gettingid='.$valueofcategorytable['categoryname'].'" <style margin-left: 100px;>'.$valueofcategorytable['categoryname'].'</a></li>';

}
?>
<li><a href="register.php">Login And Registration</a></li>
			</ul>
		</nav>
		<img src="banners/1.jpg" alt="Banner" />