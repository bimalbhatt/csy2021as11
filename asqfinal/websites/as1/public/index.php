<?php
include 'header.php';
include 'connectiondb.php';
?>
<body>
    <main>
    <?php

$databasevalueauc=$pdo -> query("SELECT * FROM `auction` ORDER BY auction_id DESC LIMIT 10");
foreach($databasevalueauc as $dbvalueofauctiontable){
echo'<main>
			<ul class="productList">
				<li>
					<img src="product.png" alt="product name">
					<article>
						<h2> '.$dbvalueofauctiontable['title'].'</h2>
						<h3>'.$dbvalueofauctiontable['auction_category'].'</h3>
						<p>'.$dbvalueofauctiontable['description'].'</p>

						<p class="price">Current bid: '.$dbvalueofauctiontable['auction_price'].'</p>
						<a href="product.php?$gettingid='.$dbvalueofauctiontable['title'].'" class="more auctionLink">More &gt;&gt;</a>
					</article>
				</li>
</main>';
}


?>
</body>
<?php
include 'footer.php';
?>