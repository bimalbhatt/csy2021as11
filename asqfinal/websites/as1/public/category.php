<?php
include "header.php";
include "Connectiondb.php";
?>
<?php 
$takindidforcategory=$_GET['gettingid'];  
if(isset($takindidforcategory)){
$databasevalueofauction=$pdo -> query("SELECT * FROM auction where auction_category='$takindidforcategory'");
foreach($databasevalueofauction as $storingvaluefromtablecategory){
    
     
        echo'<main>


        <ul class="productList">
            <li>
                <img src="product.png" alt="product name">
                <article>
                    <h2> '.$storingvaluefromtablecategory['title'].'</h2>
                    <h3>'.$storingvaluefromtablecategory['auction_category'].'</h3>
                    <p>'.$storingvaluefromtablecategory['description'].'</p>

                    <p class="price">Current bid: '.$storingvaluefromtablecategory['auction_price'].'</p>
                    <a href="product.php?$gettingid='.$storingvaluefromtablecategory['title'].'" class="more auctionLink">More &gt;&gt;</a>
                </article>
            </li>
</main>';
    }
}




?>
<?php
include "footer.php";
?>