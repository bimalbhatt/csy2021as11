<?php
include 'connectiondb.php';
include 'userheader.php';

if(isset($_GET['auctionkoid'])) {
  $auction_id = $_GET['auctionkoid'];

  
  $teidatabasekoqueryhai = $pdo->prepare("SELECT * FROM auction WHERE auction_id = :auctionkoid");
  $teidatabasekoqueryhai->execute(['auctionkoid' => $auction_id]);
  $wegetvalofauction = $teidatabasekoqueryhai->fetch();

  if(!$wegetvalofauction) {
    
    header('Location: viewAuctions.php');
    exit;
  }
}

if(isset($_POST['editauctionsubmitbutton'])) {

  // $tosavetitleofauction = $_POST['thisistitleofauction'];
  // $$tosavecategoryofprod = $_POST['thisiscategoryofauction'];
  // $tosavedescofproc = $_POST['thisisdescofauction'];
  // $tosavedateofauc = $_POST['thisisdateofauction'];
  // $tosaveinitprice = $_POST['initpriceofaucti'];


  $tosavetitleofauction = $_POST['inthevaloftitle'];
  $tosavecategoryofprod = $_POST['inthevalofcategory'];
  $tosavedescofproc = $_POST['inthevalofdescrption'];
  $tosavedateofauc = $_POST['inthevaloftime'];
  $tosaveinitprice = $_POST['initpriceofaucti'];
  $grabbingauctionval = $_POST['auction_id'];

 
  $teidatabasekoqueryhai = $pdo->prepare("UPDATE auction SET title = :title, auction_category = :category, description = :description, auction_date = :date, auction_price = :price WHERE auction_id = :auction_id");
  $result = $teidatabasekoqueryhai->execute(['title' => $tosavetitleofauction, 
  'category' => $tosavecategoryofprod,
   'description' => $tosavedescofproc, 
   'date' => $tosavedateofauc, 'price' => $tosaveinitprice, 'auction_id' => $grabbingauctionval]);

  if($result) {
    
    // header("Location: auctionadmin.php");
    echo "<script>window.location.href = 'auctionadmin.php';</script>";
  } 
}
?>
<main>
  <form action="editAuction.php" method="POST">
    <input type="hidden" name="auction_id" value="<?php echo $wegetvalofauction['auction_id']; ?>">
    <label for="titleofauction">Enter the Title of your Auction</label></br>
    <input type="text" name="inthevaloftitle" value="<?php echo $wegetvalofauction['title']; ?>"></br>
    <label for="explain">Enter description for your Auction</label></br>
<textarea name="inthevalofdescrption"><?php echo $wegetvalofauction['description']; ?></textarea>

<label for="catgg">Category that you want :</label>
<select style="width:290px;" name="inthevalofcategory">
  <?php
  $results = $pdo->query("SELECT * FROM category");
  foreach ($results as $values) {
    $selected = ($wegetvalofauction['auction_category'] == $values['categoryname']) ? 'selected' : '';
    echo '<option value="' . $values['categoryname'] . '" ' . $selected . '>' . $values['categoryname'] . '</option>';
  }
  ?>
</select>
<label for="initialpriceforauction">Enter Initial price of auction:</label></br>
<input type="text" name="initpriceofaucti" value="<?php echo $wegetvalofauction['auction_price']; ?>"></br>
<label for="timethatauctionend"> Cut-off point:</label></br>
<input type="date" name="inthevaloftime" value="<?php echo $wegetvalofauction['auction_date']; ?>"></br>

<input type="submit" name="editauctionsubmitbutton" value="Save Changes">
</form>
</main> 