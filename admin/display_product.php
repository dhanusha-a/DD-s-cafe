<?php
	include 'C:\wamp\www\dd\connection.php';
	
	/*--------------Display in table-------------------------------------------------------*/
	
	$query="SELECT p.*,c.* FROM product p, category c where p.category_id=c.category_id";
	$result=mysqli_query($connect,$query);
	while($row = mysqli_fetch_array($result))
	{
		$rs[]=$row;
	}
	
	/*---------------Delete-----------------------------------------------------------------*/
	
	if($_GET['id'] != '')
	{
		$id=$_GET['id'];
		$delete=" DELETE FROM product WHERE product_id = '$id' ";
		if(mysqli_query($connect,$delete))
		{
			echo "Deleted";
			header('location:display_product.php');
		}
		else
		{
			echo $delete . "    " . mysqli_error($connect);
		}
		
	}
?>

<html>
	<head>
		<title>Display Products</title>
	</head>
	<body>
		<h1 align="center">Display Products</h1>
		<table border="1" align="center" width="90%">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Category</th>
				<th>Description</th>
				<th>Price</th>
				<th>Type</th>
				<th>Photo</th>
				<th>Action</th>
			</tr>
			
			<?php for($i=0;$i<count($rs);$i++){	?>
				<tr>
					<td><?php echo $rs[$i]['product_id'];?></td>
					<td><?php echo $rs[$i]['product_name'];?></td>
					<td><?php echo $rs[$i]['category_name'];?></td>
					<td><?php echo $rs[$i]['description'];?></td>
					<td><?php echo $rs[$i]['price'];?></td>
					<td><?php echo $rs[$i]['type'];?></td>
					<td><img src="<?php echo $rs[$i]['photo'];?>" height="110" width="160"></td>
					<td><a href="display_product.php?id=<?php echo $rs[$i]['product_id'];?>">Delete</td>
				</tr>
			<?php } ?>
			
		</table>
	</body>
</html>