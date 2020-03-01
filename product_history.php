<?php
	include 'connection.php';
	
	/*---------------Session-----------------------------------------------------------------*/
	session_start();
	if(!isset($_SESSION['user']))
	{
		header('location:index.php');
	}
	
	$id=$_SESSION['user'];	
	
	$q1="SELECT od.*,op.*,p.* FROM order_details od INNER JOIN order_product op on od.order_id=op.order_id INNER JOIN product p on  op.product_id=p.product_id where od.client_id='$id'";
		
	$res=mysqli_query($connect,$q1);
	
	if(!mysqli_query($connect,$q1)){
		mysqli_error($connect);
	}
	//$order='';
	
	while($q = mysqli_fetch_array($res))
	{
		$order[]=$q;
	}
	
	//print_r($order);
?>

<html>
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="css/producthist.css">
</head>
<body>

 
<table>
<h2 style="margin-left:550px">Product History</h2>
    <thead>
    <tr>
        <th>Order Id</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Date and Time</th>
        <th>Payment Mode</th>        

    </tr>
    </thead>
	
    <tbody>
	<?php
		for($i=0;$i<count($order);$i++){
	?>	
		<tr>
			<td><?php echo $order[$i]['order_id']?></td>
			<td><?php echo $order[$i]['product_name']?></td>
			<td><?php echo $order[$i]['quantity']?></td>
			<td><?php echo $order[$i]['price']?></td>
			<td><?php echo $order[$i]['date_time']?></td>
			<td><?php echo $order[$i]['payment_mode']?></td>
		</tr>
	<?php } ?>
  
    </tbody>
	
</table>


</body>
</html>