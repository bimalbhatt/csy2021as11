
<?php
include 'userheader.php';
?>
		<main>
			<h1>Category List</h1>
			<table style="width:80%">
<tr>
<th>Category Id</th>
<th>Category Name</th>
<th>Edit</th>
<th>Delete</th>
</tr>
<?php
			include 'connectiondb.php';
			$databasekolagihoyo=$pdo->query("SELECT * FROM category ");
            foreach($databasekolagihoyo as $databasemavakocategorykovalue){
				echo"			
  <tr>
    <td>".$databasemavakocategorykovalue['id']."</td>
    <td>".$databasemavakocategorykovalue['categoryname']."</td>
	<td>";echo'<a href="editcategory.php?$categorynamesid='.$databasemavakocategorykovalue['categoryname'].'">Edit Category</a>
	</td>
	<td><a href="deletecategory.php?categorynamesid='.$databasemavakocategorykovalue['id'].'">Delete Category</a></td>
	
	
  </tr>';
			}
			?>
			

			</table>
			<a href="addcategory.php"><h5>Add category</h5></a>
			
</main>
<?php
include 'footer.php'
?>