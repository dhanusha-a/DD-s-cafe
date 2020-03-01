<?php
	include 'connection.php';
	
	
	/*------------------Session---------------------------*/
	session_start();
	if(!isset($_SESSION['user']))
	{
		header('location:index.php');
	}
	
	
	/*----------------Fetch & Display--------------------*/
	
	$id=$_SESSION['user'];
	//echo $id;	
	
	$display="SELECT * FROM client WHERE client_id='$id'";
	$result=mysqli_query($connect,$display);
	$rs=mysqli_fetch_array($result);	
	
	/*----------------Update-----------------------------*/
	
	$name=$_POST['Name'];
	$contact=$_POST['Contact'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$pin=$_POST['pin'];
	
	if($_POST['submit'])
	{		
		$query="UPDATE client SET client_name='$name',contact=$contact,address='$address',city='$city',state='$state',pin =$pin where client_id='$id' ";
		if(mysqli_query($connect,$query))
		{				
			header('location:update_user.php');		
		}
		
	}
	
	if($_POST['back'])
	{
		header('location:home.php');	
	}
?>

<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Update Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/registration.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

<style>
input[type=text],input[type=tel]{
	color:#000000;
}
</style>

</head>
<body>

<div class="bg-image bg-parallax overlay" style="background-image:url(../img/background02.jpg)"></div>
	<div class="signup-form">	
    <form method="post" name="register">
		<h2>Profile</h2>		
        <div class="form-group">
				
				<input type="text" class="form-control" name="Name" placeholder="Full Name" required="required" value=<?php echo $rs['client_name']; ?>>      	
        </div>
		 <div class="form-group">
			<input type="tel" class="form-control" name="Contact" placeholder="Contact No. (10 digits)" required="required" pattern="[0-9]{10}" value=<?php echo $rs['contact']; ?>>      	
        </div>		
		
		<div class="form-group">
				<input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo $rs["address"];?>" >
        </div>
		<div class="form-group">
				<input type="text" class="form-control" name="city" placeholder="City" value=<?php echo $rs['city']; ?>>
        </div>
		<div class="form-group">
				<input type="text" class="form-control" name="state" placeholder="State" value=<?php echo $rs['state']; ?>>      	
        </div>
		<div class="form-group">
				<input type="text" class="form-control" name="pin" placeholder="Pincode" pattern="[0-9]{6}" value=<?php echo $rs['pin']; ?>>        	
        </div>        	
        
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" value="submit" name="submit">Update</button>
        </div>
		
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block" value="back" name="back">Back to Home</button>
        </div>
    </form>
	
</div>
</div></div>
</body>
</html>                            