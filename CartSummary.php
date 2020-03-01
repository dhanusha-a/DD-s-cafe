<?php
	include 'connection.php';
	session_start();
	
	/*Payment*/
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
	
	/*Cart Table*/
	$total_price = 0;
	$total_item = 0;
	
	$order="ORDS" .rand(1,9).rand(100,9999);
	
	/*Address*/
	$id=$_SESSION['user'];	
	$display="SELECT * FROM client WHERE client_id='$id'";
	$result=mysqli_query($connect,$display);
	$rs=mysqli_fetch_array($result);
	
	/*Insert*/
	$address=$_POST['address'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$pin=$_POST['pin'];
	$total=$_POST['TXN_AMOUNT'];
	
	$send = array(
    'ORDER_ID' => $order, 
    'CUST_ID' => $id,
    'TXN_AMOUNT' => $total
    );
	$send=http_build_query($send);
	
	if(isset($_POST['submit'])){
		
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			$query1="INSERT INTO order_product (order_id,product_id,quantity) values ('$order','".$values["product_id"]."','".$values["product_quantity"]."')";
			
			if(!mysqli_query($connect,$query1)){
				echo mysqli_error($connect);
			}
		}
		
		$query="INSERT INTO order_details (order_id,client_id,total,shipping_address,city,state,pin) values ('$order',$id,$total,'$address','$city','$state','$pin')";		
		if(mysqli_query($connect,$query)){			
			header("location:pgRedirect.php?ORDER_ID=$order&CUST_ID=$id&TXN_AMOUNT=$total");
		}
		else{ 
			echo mysqli_error($connect);
		}
	}
	
?>
<html>
	<head>
		<title>Order Summary</title>		
		
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="css/cartsum.css" />
	</head>
	<body>
	
	<div class="container"> 
		<section class="invoice">
			<header>
				<h3>Order Summary</h3> <br>
				<h4>Order ID: <?php echo $order ?></h4>
			</header>			
			
			<table class="table table-bordered table-striped">
				<thead class="thread-dark">
					<tr>  
						<th>Product Name</th>  
						<th>Quantity</th>  
						<th>Price</th>  
						<th>Total</th>             
					</tr>
				</thead>
				<tbody>
					<?php if(!empty($_SESSION["shopping_cart"]))
					{
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{?>
							<tr>
								<td><?php echo $values["product_name"]?></td>
								<td><?php echo $values["product_quantity"]?></td>
								<td align="right">₹ <?php echo $values["product_price"]?></td>
								<td align="right">₹ <?php echo number_format($values["product_quantity"] * $values["product_price"], 2)?></td>					
							</tr>
							<?php $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
							$total_item = $total_item + 1;
						}?>
					<tr>  
						<td colspan="3" align="right">Total</td>  
						<td align="right">₹ <?php echo number_format($total_price, 2)?> </td>         
					</tr>
					<?php } ?>
				</tbody>
			</table>	
		</section>			
	</div>
	
	<div class="container">  
		<section>
			  <form id="contact" method="post">
					<h3>Shipping Order Form</h3><br>
					<fieldset>
						<input placeholder="Street Name/Flat Number/Plot Number" type="text" name="address" value="<?php echo $rs["address"];?>"    required autofocus>
					</fieldset>
					<fieldset>
						<input placeholder="City" type="text" tabindex="2"  name="city" value="<?php echo $rs["city"];?>" required>
					</fieldset>
					<fieldset>
						<input placeholder="State" type="text" tabindex="3" name="state" value="<?php echo $rs["state"];?>"  required>
					</fieldset>
					<fieldset>
						<input placeholder="Pincode" type="text" tabindex="4" name="pin" value="<?php echo $rs["pin"];?>">
					</fieldset>										
					<fieldset>
						<input type="submit" name="submit"  class="btn btn-success" value="Proceed to Pay">
					</fieldset>
					
					<input type="hidden" id="ORDER_ID" name="ORDER_ID" value="<?php echo $order ?>">
					<input type="hidden" id="CUST_ID" name="CUST_ID" value="<?php echo $id ?>">
					<input type="hidden" id="TXN_AMOUNT" name="TXN_AMOUNT" value="<?php echo $total_price ?>">
					
					
			  </form>
		</section>
	</div>
		
	
	</body>
</html>