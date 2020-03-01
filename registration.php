<?php
	include 'connection.php';
	
	$name=$_POST['Name'];
	$contact=$_POST['Contact'];
	$email=$_POST['Email'];
	$password=$_POST['Password'];
	$cpassword=$_POST['Confirm_password'];
	
	if($_POST['submit'])
	{
		if($password!=$cpassword)
		{
			echo'<div class="alert alert-danger"> Password and Confirm Password do not match! </div>';
		}	
		else
		{
			$query="INSERT INTO client (client_name,contact,email,password) VALUES ('$name','$contact','$email','$password')";
			if(mysqli_query($connect,$query))
			{				
				echo '<div class="alert alert-success"> ';
				echo 'Registraion Successful';
				echo '</div>';				
			}
			else
			{
				echo $query."    ".$mysqli_error($connect);
			}
		}
		
	}
	
?>

<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Registration Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/registration.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

</head>
<body>
<div class="bg-image bg-parallax overlay" style="background-image:url(../img/background02.jpg)"></div>
	<div class="signup-form">	
    <form method="post" name="register">
		<h2>Register</h2>
		<p class="hint-text">Create your account. It's free and only takes a minute.</p>
        <div class="form-group">
				
				<input type="text" class="form-control" name="Name" placeholder="Full Name" required="required">      	
        </div>
		 <div class="form-group">
			<input type="tel" class="form-control" name="Contact" placeholder="Contact No. (10 digits)" required="required" pattern="[0-9]{10}">      	
        </div>		
		
        <div class="form-group">
        	<input type="email" class="form-control" name="Email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="Password" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="Confirm_password" placeholder="Confirm Password" required="required">
        </div> 
        <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
		</div>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" value="submit" name="submit">Register Now</button>
        </div>
    </form>
	<div class="text-center">Already have an account? <a href="index.php">Sign in</a></div>
</div>
</div></div>
</body>
</html>                            