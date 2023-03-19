<?php
include "header.php";
include "Connectiondb.php";
?>
<?php 

$databasequerytostoryvalofauc=$pdo -> query("SELECT * FROM `auction` WHERE title='".$_GET['$gettingid']."' LIMIT 1");
	foreach($databasequerytostoryvalofauc as $valueofauctiontable){
echo'<main>
<h1>auction Page</h1>
			<article class="product">

					<img src="product.png" alt="product name">
					<section class="details">
						<h2>'.$valueofauctiontable['title'].'</h2>
						<h3>'.$valueofauctiontable['auction_category'].'</h3>
						<p>Auction created by <a href="#">User.Name</a></p>
						<p class="price">Current bid:'.$valueofauctiontable['auction_price'].'</p>
						<time>Time left: 8 hours 3 minutes</time>
						<form action="#" class="bid">
							<input type="text" name="bid" placeholder="Enter bid amount" />
							<input type="submit" valueofauctiontable="Place bid" />
						</form>
					</section>
					<section class="description">
					<p>
					'.$valueofauctiontable['description'].'
						</p>

					</section>
</main>';
	}



?>