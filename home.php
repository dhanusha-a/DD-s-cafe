<?php
	include 'connection.php';
	
	/*---------------Session-----------------------------------------------------------------*/
	session_start();
	if(!isset($_SESSION['user']))
	{
		header('location:index.php');
	}
	
	$user="SELECT * FROM client where client_id='".$_SESSION['user']."'";
	$res=mysqli_query($connect,$user);
	$user_res=mysqli_fetch_row($res);	
	/*-----------------Menu Display-----------------------------------------------------------*/

	
	
	/*-------------------Table Booking---------------------------------------------------------*/
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$guest_number=$_POST['guest_number'];
	$date=$_POST['date'];
	$time=$_POST['time'];
		
	if($_POST['submit'])
	{	
		$query="INSERT INTO table_booking (customer_name,email,contact,guests,date,time) values ('$name','$email',$phone,'$guest_number','$date','$time')";
		if(mysqli_query($connect,$query))
			{				
				echo '<div class="alert alert-success"> ';
				echo 'Booking Successful';
				echo '</div>';				
			}
	}
	
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>DD's Cafe User Home</title>
		
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Quicksand:400,700%7CCabin:400%7CDancing+Script" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Owl Carousel -->
		<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
		<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
		
		

		
		
		<style>
		.popover
		{
		    width: 100%;
		    max-width: 800px;
		}
		</style>
		

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	
	<body>
	
	<!-- Header -->
		<header id="header">


			<!-- Bottom nav -->
			<div id="bottom-nav">
				<div class="container" >
				<nav id="nav" role="navigation">

					<!-- nav -->
					<ul class="main-nav nav navbar-nav">						
						<li class="nav-item dropdown">
						<a href="#websitemenu" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?php echo "  $user_res[3]";?> <i class="fa fa-angle-down" aria-hidden="true"></i> </a>						
						<ul class="dropdown-menu">
							<li><a href="update_user.php"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
							<li><a href="product_history.php"><i class="fa fa-history"></i> Purchase History</a></li>
							<li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
							
						</ul>
							
						</li>
						<li><a href="#websitemenu">Menu</a></li>
						<li><a href="#websitereserve">Reservation</a></li>						
					</ul>
					<!-- /nav -->					
					
					<!--Cart Nav-->
					
					<div id="navbar-cart" class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a id="cart-popover" class="btn" data-placement="bottom" title="Shopping Cart">
									<span class="glyphicon glyphicon-shopping-cart"></span>
									<span class="badge"></span>
									<span class="total_price">₹0.00</span>
								</a>
							</li>
						</ul>
					</div>
						
					
					<div id="popover_content_wrapper" style="display: none">
						<span id="cart_details"></span>
						<div align="right">
							<a href="CartSummary.php" class="btn btn-primary" id="check_out_cart">
							<span class="glyphicon glyphicon-shopping-cart"></span> Check out
							</a>
							<a href="#" class="btn btn-default" id="clear_cart">
							<span class="glyphicon glyphicon-trash"></span> Clear
							</a>
						</div>
					</div>
					<!--/Cart Nav-->

				</nav>
				</div>
			</div>
			<!-- /Bottom nav -->


		</header>
		<!-- /Header -->
		
		<!-- Menu -->
		<a name="websitemenu"></a>
		<div id="menu" class="section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url(./img/background01.jpg)"></div>
			<!-- /Backgound Image -->

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<div class="section-header text-center">
						<h4 class="sub-title">Discover</h4>
						<h2 class="title white-text">Our Menu</h2>
					</div>
					
					<div class="container" style="padding-bottom:10px;">
						<div class="input-group menu-search">
							<input type="text" class="form-control" placeholder="Search" name="search_text">
							  <span class="input-group-btn">
									<button class="btn btn-search search-menu">
										<i class="fa fa-search fa-fw"></i> Search
									</button>
							  </span>
						</div>
						<div class="sort-div">
							<button class="btn btn-default btn-sm sort mn" name="mn" id=0>
								<span class="glyphicon glyphicon-sort"></span> Price Low to High
							</button>
						</div>
					</div>

					<!-- menu nav -->
					<ul class="menu-nav">					
					  <li class="active"><button name="mn" class="btn btn-mn mn"><a data-toggle="tab" href="#m0">All</a></button></li>
					  <li><button name="mn" class="btn btn-mn mn" id=1><a data-toggle="tab" href="#m0">Starters</a></button></li>
					  <li><button name="mn" class="btn btn-mn mn" id=2><a data-toggle="tab" href="#m0">MainDish</a></button></li>
					  <li><button name="mn" class="btn btn-mn mn" id=3><a data-toggle="tab" href="#m0">Drinks</a></button></li>
					  <li><button name="mn" class="btn btn-mn mn" id=4><a data-toggle="tab" href="#m0">Dessert</a></button></li>
					</ul>
					<!-- /menu nav -->

					<!-- menu content -->
					<div id="menu-content" class="tab-content">	
					
						<!-- m0 -->
						<div id="m0" class="tab-pane fade in active">							

								<!-- single dish -->
								
								<!-- /single dish -->							

						</div>
						<!-- /m0 -->					

					</div>
					<!-- /menu content -->

				</div>
				<!-- /row -->

			</div>
			<!-- /container -->

		</div>
		<!-- /Menu -->
		
		<!-- Reservation -->
		<a name="websitereserve"></a>
		<div id="reservation" class="section">

			<!-- Backgound Image -->
			<div class="bg-image" style="background-image:url(./img/background03.jpg)"></div>
			<!-- /Backgound Image -->

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<!-- reservation form -->
					<div class=" col-md-offset-1 col-sm-10 col-sm-offset-1">
						<form class="reserve-form row" name="table_book" method="post">
							<div class="section-header text-center">
								<h4 class="sub-title">Reservation</h4>
								<h2 class="title white-text">Book Your Table</h2>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Name:</label>
									<input class="input" type="text" placeholder="Name" name="name">
								</div>
								<div class="form-group">
									<label for="phone">Phone:</label>
									<input class="input" type="tel" placeholder="Phone" maxlength="10" name="phone" >
								</div>
								<div class="form-group">
									<label for="date">Date:</label>
									<input class="input" type="date" placeholder="MM/DD/YYYY" name="date">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="email">Email:</label>
									<input class="input" type="email" placeholder="Email" name="email">
								</div>
								<div class="form-group">
									<label for="number">Number of Guests:</label>
									<select class="input" name="guest_number">
										<option value="1">1 Person</option>
										<option value="2">2 People</option>
										<option value="3">3 People</option>
										<option value="4">4 People</option>
										<option value="5">5 People</option>
										<option value="6">6 People</option>
									</select>
								</div>
								<div class="form-group">
								  <label for="time">Time:</label>
								  <input class="input" type="time" name="time">
								</div>
							</div>

							<div class="col-md-12 text-center">
								<input type="submit" name="submit" value="Book now" class="main-button">
								<!--<button class="main-button" type="submit" value="submit">Book Now</button>-->
							</div>

						</form>
					</div>
					
					<!-- /reservation form -->

					

				</div>
				<!-- /row -->

			</div>
			<!-- /container -->

		</div>
		<!-- /Reservation -->
		
		<br><br>
		<!-- Footer -->
		<footer id="footer">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">
				
					<div class="col-md-6"> </div>					

					<!-- footer nav -->
					<div class="col-md-6">
						<nav class="footer-nav">
							<a href="#websitehome">Home</a>
							<a href="#websiteabout">About</a>
							<a href="#websitemenu">Menu</a>
							<a href="#websitereserve">Reservation</a>
							<a href="#websitecontact">Contact</a>
						</nav>
					</div>
					
					
					<!-- /footer nav -->

				</div>
				<!-- /row -->

			</div>
			<!-- /container -->

		</footer>
		<!-- /Footer -->
		
		<!-- Preloader -->
		<div id="preloader">
			<div class="preloader">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
		<!-- /Preloader -->

		<!-- jQuery Plugins -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/owl.carousel.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
		<script type="text/javascript" src="js/google-map.js"></script>
		<script type="text/javascript" src="js/main.js"></script>		

	</body>
</html>

<script>
$(document).ready(function(){

	load_cart_data();	
	load_menu();	
	
	function load_menu(){
		$.ajax({
				url:"menu.php",
				method:"POST",				
				success:function(data)
				{					
					$('#m0').html(data);				
				}
			});	
	}
	
	$(document).on('click', '.mn', function(){		
		var cat_id = $(this).attr("id");	
			console.log(cat_id);
		
			$.ajax({
				url:"menu.php",
				method:"POST",
				data:{cat_id:cat_id},
				success:function(data)
				{					
					$('#m0').html(data);				
				}
			});		
	});
	
	$(document).on('click', '.search-menu', function(){		
		var search = $('input[name=search_text]').val();	
			console.log(search);
		
			$.ajax({
				url:"menu.php",
				method:"POST",
				data:{search:search},
				success:function(data)
				{					
					$('#m0').html(data);				
				}
			});		
	});

	$('#cart-popover').popover({
		html : true,
        container: 'body',
        content:function(){
        	return $('#popover_content_wrapper').html();
        }
	});
	
	function load_cart_data()
	{
		$.ajax({
			url:"fetch_cart.php",
			method:"POST",
			dataType:"json",
			success:function(data)
			{
				$('#cart_details').html(data.cart_details);
				$('.total_price').text(data.total_price);
				$('.badge').text(data.total_item);
			}
		});
	}
	
	$(document).on('click', '.add_to_cart', function(){		
		var product_id = $(this).attr("id");
		console.log(product_id);
		var product_name = $('#name'+product_id+'').val();
		var product_price = $('#price'+product_id+'').val();
		var product_quantity = $('#quantity'+product_id).val();
		
		console.log(product_id);
		console.log(product_name);
		console.log(product_price);
		console.log(product_quantity);
		
		var action = "add";
		
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
				success:function(data)
				{
					load_cart_data();					
				}
			});
		
	});
	
	$(document).on('click', '.delete', function(){
		var product_id = $(this).attr("id");
		var action = 'remove';
		
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{product_id:product_id, action:action},
				success:function()
				{
					load_cart_data();
					$('#cart-popover').popover('hide');					
				}
			})		
	});

	$(document).on('click', '#clear_cart', function(){
		var action = 'empty';
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{action:action},
			success:function()
			{
				load_cart_data();
				$('#cart-popover').popover('hide');
				alert("Your Cart has been clear");
			}
		});
	});
	
});	
</script>