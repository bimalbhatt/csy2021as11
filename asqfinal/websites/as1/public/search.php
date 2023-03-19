<?php
include "userheader.php";
include "Connectiondb.php";
session_start();
?>

<?php 
$searchedtext=$_POST['searchtext'];
$searchresult=$pdo -> query("SELECT * FROM auction where title='$searchedtext'");
foreach($searchresult as $value){
     
        echo'<main>


        <ul class="productList">
            <li>
                <img src="product.png" alt="product name">
                <article>
                    <h2> '.$value['title'].'</h2>
                    <h3>'.$value['auction_category'].'</h3>
                    <p>'.$value['description'].'</p>

                    <p class="price">Current bid: '.$value['auction_price'].'</p>
                    <a href="product.php?$takeCATE='.$value['title'].'" class="more auctionLink">More &gt;&gt;</a>
                </article>
            </li>
</main>';
    }
?>
<?php
include "foot.php";?>