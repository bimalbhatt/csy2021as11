<?php
include 'userheader.php';
include 'connectiondb.php';
$querfordb = $pdo->prepare("SELECT * FROM auction");
$querfordb->execute();
$aucvaluesfromdbtable = $querfordb->fetchAll();

?>
<main>
	<h1>Your Auctions</h1>

	<table>
		<tr>
			<th>Title</th>
			<th>Category</th>
			<th>Description</th>
			<th>Auction Date</th>
			<th>Price</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
        <?php foreach ($aucvaluesfromdbtable as $auccolvalues) {
			echo '<tr>
				<td>'.$auccolvalues['title'].'</td>
				<td>'.$auccolvalues['auction_category'].'</td>
				<td>'.$auccolvalues['description'].'</td>
				<td>'.$auccolvalues['auction_date'].'</td>
				<td>'.$auccolvalues['auction_price'].'</td>
				<td><a href="editauction.php?auctionkoid='.$auccolvalues['auction_id'].'">Edit</a></td>
				<td><a href="deleteauction.php?auctionkoid='.$auccolvalues['auction_id'].'">Delete</a></td>
			</tr>';
		} ?>
	</table>
	<h2><a href="addauction.php"><center>Add Auction</center></a></h2>

</main>
<?php
include 'footer.php';
?> 