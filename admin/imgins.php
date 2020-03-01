<?php
	include 'C:\wamp\www\dd\connection.php';
	
	
	/*-------------Category Dropdown-------------------------*/
	
	$q1 = "SELECT * FROM category";
	$cat = mysqli_query($connect,$q1);
	
	/*--------------Insert Product----------------------------*/
	
	$product_category=$_POST['product_category'];
	$product_name=$_POST['product_name'];
	$product_desc=$_POST['product_desc'];
	$product_price=$_POST['product_price'];
	$product_type=$_POST['product_type'];
	
	
	
	if(isset($_POST['submit']))
	{
		move_uploaded_file($_FILES["file"]["tmp_name"],"../product_img/" . $_FILES["file"]["name"]);
		echo "<br>";
		echo "Stored in: "."../product_img/".$_FILES["file"]["name"];
		$image= "../product_img/".$_FILES["file"]["name"];
		
		$query="INSERT INTO product (category_id,product_name,description,price,type,photo) VALUES ('$product_category','$product_name','$product_desc',$product_price,'$product_type','$image')";
		
		if(mysqli_query($connect,$query)){
			echo "Inserted";
			
		}
		else{
			echo $query."            ".mysqli_error($connect);
		}
		header('location:display_product.php');
	
	}	
	
	/*if (mysqli_num_rows($cat) > 0) {
    // output data of each row
		while($row = mysqli_fetch_assoc($cat)) {
			echo $row["category_id"]."    ".$row["category_name"]."<br>";
		}
	}*/

?>


<html>
	<head>
		<title>Enter Product</title>
	</head>
<body>
	<h1 align="center">Add Product</h1>
	
	<form name="product" method="post" enctype="multipart/form-data">
		<table width="40%" align="center">
			<tr>
				<td>Category:</td>
				<td>
					<select name="product_category">
						<option>Select</option>
						<?php while($row = mysqli_fetch_array($cat)) { 
							$rs[]=$row;
						}
						for($i=0;$i<count($rs);$i++)
						{
						?>
							<option value="<?php echo $rs[$i]['category_id']; ?>"> <?php echo $rs[$i]['category_name']; ?> </option>
						<?php }?>						
					</select>
					
				</td>				
			</tr>
			<tr>
				<td>Name:</td>
				<td><input type="text" name="product_name"></td>				
			</tr>
			<tr>
				<td>Description:</td>
				<td><input type="text" name="product_desc"></td>				
			</tr>
			<tr>
				<td>Price:</td>
				<td><input type="number" name="product_price"></td>				
			</tr>
			<tr>
				<td>Type:</td>
				<td>
					<input type="radio" name="product_type" value="veg">Veg &nbsp; <input type="radio" name="product_type" value="non_veg">Non Veg
					
				</td>				
			</tr>
			<tr>
				<td>Image:</td>
				<td><input type="file" name="file" id="file"></td>				
			</tr>
			<tr>				
				<td colspan = 2>					
						<input type="submit" name="submit" value="Submit">
						<input type="reset" name="reset" value="Reset">					
				</td>				
			</tr>
		</table>
		
	</form>
</body>
</html>