<?php
include 'connectiondb.php';
include 'userheader.php';

if (isset($_POST['ourownsubmitbutton'])) {

    $tosavetitleofauction = $_POST['thisistitleofauction'];
    $tosavecategoryofprod = $_POST['thisiscategoryofauction'];
    $tosavedescofproc = $_POST['thisisdescofauction'];
    $tosavedateofauc = $_POST['thisisdateofauction'];
    $tosaveinitprice = $_POST['initpriceofaucti'];
    
   $impliquerdb = $pdo->prepare("INSERT INTO auction (title, auction_category, description, auction_date, auction_price) VALUES (:thisisaucttitle, :thisiscatforauction, :thisisdescriptforauction, :thisisdateforauction, :thisispriceofanauction)");
  $fieldvalforus=[
    ':thisisaucttitle' => $tosavetitleofauction,
    ':thisiscatforauction' => $tosavecategoryofprod,
    ':thisisdescriptforauction' => $tosavedescofproc,
    ':thisisdateforauction' => $tosavedateofauc,
    ':thisispriceofanauction' => $tosaveinitprice
];
    
    $finalvalforusindb =$impliquerdb->execute($fieldvalforus);
    
    if ($finalvalforusindb) {
        echo "<script>alert('Successfully added auction to your database')</script>";
        echo "<script>window.location.href = 'auctionadmin.php';</script>";
    } else {
        echo "<script>alert('Failed to add auction to your database')</script>";
    }
}
?>

<main>
    <form action="addAuction.php" method="POST">
        <label>Enter the Title of your Auction</label></br>
        <input type="text" name="thisistitleofauction"></br>

        <label>Enter description for your Auction</label></br>
        <textarea name="thisisdescofauction"></textarea>

        <label>Category that you want :</label>
        <select style="width:290px;" name="thisiscategoryofauction">
            <?php
            $finalvalforusindbs = $pdo->query("SELECT * FROM category");
            foreach ($finalvalforusindbs as $valforcat) {
                echo '<option value="' . $valforcat['categoryname'] . '">' . $valforcat['categoryname'] . '</option>';
            }
            ?>
        </select>
        <label>Enter Initial price of auction:</label></br>
        <input type="text" name="initpriceofaucti"></br>
        <label> Cut-off point:</label></br>
        <input type="date" name="thisisdateofauction"></br>
        <input type="submit" name="ourownsubmitbutton" value="Add Auction">
    </form>
</main>
