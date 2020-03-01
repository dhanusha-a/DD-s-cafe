<?php
	include 'connection.php';	
	session_start();
	/*-----------------Menu Display-----------------------------------------------------------*/

	$starter="SELECT * FROM product where category_id = 1";
	$main="SELECT * FROM product where category_id = 2";
	$drink="SELECT * FROM product where category_id = 3";
	$dessert="SELECT * FROM product where category_id = 4";	
	
	/*-------------------------Login------------------------------------------------------*/
	
	$email=$_POST['email'];
	$password=$_POST['password'];
	
	if($_POST['log'])
	{
		$query1="SELECT * FROM client where email='$email' AND password='$password' ";
		$details=mysqli_query($connect,$query1);
		$user=mysqli_fetch_row($details);		
		if($user)
		{
			$_SESSION['user']=$user[0];
			header('location:home.php');
		}	
	}	
	
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
	
	/*-------------------Review---------------------------------------------------------*/
	$c_name=$_POST['commenter_name'];
	$c_email=$_POST['commenter_email'];
	$review=$_POST['review'];
		
		
	if($_POST['rev_frm'])
	{	
		$query="INSERT INTO review (name,email,review) values ('$c_name','$c_email','$review')";
		if(mysqli_query($connect,$query))
			{				
				echo '<div class="alert alert-success"> ';
				echo 'Thank You';
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

		<title>DD's Cafe</title>

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
		
		<!--Login-->
		<link rel="stylesheet" href="css/login.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
				<div class="container">
				<nav id="nav">

					<!-- nav -->
					<ul class="main-nav nav navbar-nav">
						<li><a href="#websitehome">Home</a></li>
						<li><a href="#websiteabout">About</a></li>
						<li><a href="#websitemenu">Menu</a></li>
						<li><a href="#websitereserve">Reservation</a></li>						
					</ul>
					<!-- /nav -->

					<!-- button nav -->
					<ul class="cta-nav">
						<li><a href="#myModal" class="main-button" data-toggle="modal">Login</a></li>						
					</ul>
					<!-- button nav -->

					<!-- contact nav -->
					<ul class="contact-nav nav navbar-nav">
						<li><a href="#websitecontact"><i class="fa fa-phone"></i> +91 78977 98888</a></li>
						<li><a href="#websitecontact"><i class="fa fa-map-marker"></i> Colaba</a></li>
					</ul>
					<!-- contact nav -->

				</nav>
				</div>
			</div>
			<!-- /Bottom nav -->


		</header>
		<!-- /Header -->

		<!-- Home -->
		<a name="websitehome"></a>
		<div id="home" class="banner-area">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url(./img/background02.jpg)"></div>
			<!-- /Backgound Image -->

			<div class="home-wrapper">

				<div class="col-md-10 col-md-offset-1 text-center">
					<div class="home-content">
						<h1 class="white-text">Welcome To DD's Cafe</h1>
						<h4 class="white-text lead">Experience togetherness of the loved ones.</h4>						
					</div>
				</div>

			</div>

		</div>
		<!-- /Home -->

		<!-- About -->
		<a name="websiteabout"></a>
		<div id="about" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<!-- section header -->
					<div class="section-header text-center">
						<h4 class="sub-title">About Us</h4>
						<h2 class="title">The DD's Cafe</h2>
					</div>
					<!-- /section header -->

					<!-- about content -->
					<div class="col-md-5">
						<h4 class="lead">Welcome to DD's Cafe. Since 2017, Offering Traditional Dishes of the highest quality.</h4>
					</div>
					<!-- /about content -->

					<!-- about content -->
					<div class="col-md-7">
						<p>DD's Cafe has earned best name over since the last 3 years and understands the importance of gathering together and eating well. We have the best Indian food in Mumbai for Dinning, Carry Out and Delivery on your door. The freshness, taste, quality and service of our food has won the acceptance of all those who love to eat and know what flavor means. If enjoying food is one of the agenda then DD's Cafe is the best place to eat! You will find not just one delectable dishes but many more equally fantastic dishes to entice your palate. Our menu and services have greatly expanded to reflect the wishes of our growing clientele and the environment around us. Explore our exciting menu that offers the variety of foods and fine cooking will give you both traditional and business settings!</p>
					</div>
					<!-- /about content -->

					<!-- Galery Slider -->
					<div class="col-md-12">
						<div id="galery" class="owl-carousel owl-theme">

							<!-- single column -->
							<div class="galery-item">

								<!-- single image -->
								<div class="galery-img" style="background-image:url(./img/image01.jpg)"></div>
								<!-- /single image -->

							</div>
							<!-- single column -->

							<!-- single column -->
							<div class="galery-item">

								<!-- single image -->
								<div class="galery-img" style="background-image:url(./img/image02.jpg)"></div>
								<!-- /single image -->

								<!-- single image -->
								<div class="galery-img" style="background-image:url(./img/image03.jpg)"></div>
								<!-- /single image -->

							</div>
							<!-- single column -->

							<!-- single column -->
							<div class="galery-item">

								<div class="item-column">
									<!-- single image -->
									<div class="galery-img" style="background-image:url(./img/image04.jpg)"></div>
									<!-- /single image -->

									<!-- single image -->
									<div class="galery-img" style="background-image:url(./img/image05.jpg)"></div>
									<!-- /single image -->
								</div>

								<div class="item-column">
									<!-- single image -->
									<div class="galery-img" style="background-image:url(./img/image06.jpg)"></div>
									<!-- /single image -->

									<!-- single image -->
									<div class="galery-img" style="background-image:url(./img/image07.jpg)"></div>
									<!-- /single image -->
								</div>

							</div>
							<!-- /single column -->

						</div>
					</div>
					<!-- /Galery Slider -->


				</div>
				<!-- /row -->

			</div>
			<!-- /container -->

		</div>
		<!-- /About -->


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
						<h4 class="sub-title">Login to order online</h4>
					</div>

					<!-- menu nav -->
					<ul class="menu-nav">					
					  <li class="active"><a data-toggle="tab" href="#m0">All</a></li>
					  <li><a data-toggle="tab" href="#menu1">Starters</a></li>
					  <li><a data-toggle="tab" href="#menu2">MainDish</a></li>
					  <li><a data-toggle="tab" href="#menu3">Drinks</a></li>
					  <li><a data-toggle="tab" href="#menu4">Dessert</a></li>
					</ul>
					<!-- /menu nav -->

					<!-- menu content -->
					<div id="menu-content" class="tab-content">

						<!-- m0 -->
						<div id="m0" class="tab-pane fade in active">							

								<!-- single dish -->
								<?php 
									
									$all='SELECT * FROM product';
									$r0=mysqli_query($connect,$all);
									while($row0 = mysqli_fetch_array($r0))
									{
										$rs0[]=$row0;
									}	
								
									for($i=0;$i<count($rs0);$i++){?>
									
								<div class="col-md-6">
									<div class="full">
										<div class="for_img">
											<img class="sirdard" src="<?php echo $rs0[$i]['photo']?>">
										</div>
										
										<div class="single-dish">											
											<!--<div class="single-dish-heading">--> <!--</div>-->
											<h4 class="name"><?php echo $rs0[$i]['product_name']?></h4>
											<h4 class="price"><?php echo "Rs ".$rs0[$i]['price']?></h4>										
											<p><?php echo $rs0[$i]['description']?> </p>										
											<button class="b1" name="add" onclick="loginprompt()">+Add</button>
											<ul>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
											</ul>
										</div>									
										
									</div>
								</div>
								<?php }?>
								<!-- /single dish -->							

						</div>
						<!-- /m0 -->
						
						<!-- menu1 -->
						<div id="menu1" class="tab-pane fade in active">							

								<!-- single dish -->
								<?php 
								
									$r1=mysqli_query($connect,$starter);
									while($row1 = mysqli_fetch_array($r1))
									{
										$rs1[]=$row1;
									}	
								
									for($i=0;$i<count($rs1);$i++){?>
									
								<div class="col-md-6">
									<div class="full">
										<div class="for_img">
											<img class="sirdard" src="<?php echo $rs1[$i]['photo']?>">
										</div>
										
										<div class="single-dish">											
											<!--<div class="single-dish-heading">--> <!--</div>-->
											<h4 class="name"><?php echo $rs1[$i]['product_name']?></h4>
											<h4 class="price"><?php echo "Rs ".$rs1[$i]['price']?></h4>										
											<p><?php echo $rs1[$i]['description']?> </p>										
											<button class="b1" name="add" onclick="loginprompt()">+Add</button>
											<ul>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
											</ul>
										</div>									
										
									</div>
								</div>
								<?php }?>
								<!-- /single dish -->							

						</div>
						<!-- /menu1 -->
						
						<!-- menu2 -->
						<div id="menu2" class="tab-pane fade in active">							

								<!-- single dish -->
								<?php 
								
									$r2=mysqli_query($connect,$main);
									while($row2 = mysqli_fetch_array($r2))
									{
										$rs2[]=$row2;
									}	
								
									for($i=0;$i<count($rs2);$i++){?>
									
								<div class="col-md-6">
									<div class="full">
										<div class="for_img">
											<img class="sirdard" src="<?php echo $rs2[$i]['photo']?>">
										</div>
										
										<div class="single-dish">											
											<!--<div class="single-dish-heading">--> <!--</div>-->
											<h4 class="name"><?php echo $rs2[$i]['product_name']?></h4>
											<h4 class="price"><?php echo "Rs ".$rs2[$i]['price']?></h4>										
											<p><?php echo $rs2[$i]['description']?> </p>										
											<button class="b1" name="add" onclick="loginprompt()">+Add</button>
											<ul>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
											</ul>
										</div>									
										
									</div>
								</div>
								<?php }?>
								<!-- /single dish -->							

						</div>
						<!-- /menu2 -->
						
						<!-- menu3 -->
						<div id="menu3" class="tab-pane fade in active">							

								<!-- single dish -->
								<?php 
								
									$r3=mysqli_query($connect,$drink);
									while($row3 = mysqli_fetch_array($r3))
									{
										$rs3[]=$row3;
									}	
								
									for($i=0;$i<count($rs3);$i++){?>
									
								<div class="col-md-6">
									<div class="full">
										<div class="for_img">
											<img class="sirdard" src="<?php echo $rs3[$i]['photo']?>">
										</div>
										
										<div class="single-dish">											
											<!--<div class="single-dish-heading">--> <!--</div>-->
											<h4 class="name"><?php echo $rs3[$i]['product_name']?></h4>
											<h4 class="price"><?php echo "Rs ".$rs3[$i]['price']?></h4>										
											<p><?php echo $rs3[$i]['description']?> </p>										
											<button class="b1" name="add" onclick="loginprompt()">+Add</button>
											<ul>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
											</ul>
										</div>									
										
									</div>
								</div>
								<?php }?>
								<!-- /single dish -->							

						</div>
						<!-- /menu3 -->
						
						<!-- menu4 -->
						<div id="menu4" class="tab-pane fade in active">							

								<!-- single dish -->
								<?php 
								
									$r4=mysqli_query($connect,$dessert);
									while($row4 = mysqli_fetch_array($r4))
									{
										$rs4[]=$row4;
									}	
								
									for($i=0;$i<count($rs4);$i++){?>
									
								<div class="col-md-6">
									<div class="full">
										<div class="for_img">
											<img class="sirdard" src="<?php echo $rs4[$i]['photo']?>">
										</div>
										
										<div class="single-dish">											
											<!--<div class="single-dish-heading">--> <!--</div>-->
											<h4 class="name"><?php echo $rs4[$i]['product_name']?></h4>
											<h4 class="price"><?php echo "Rs ".$rs4[$i]['price']?></h4>										
											<p><?php echo $rs4[$i]['description']?> </p>										
											<button class="b1" name="add" onclick="loginprompt()">+Add</button>
											<ul>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star-half-o"></i></a></li>											
											</ul>
										</div>									
										
									</div>
								</div>
								<?php }?>
								<!-- /single dish -->							

						</div>
						<!-- /menu4 -->

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
		
		<!-- Contact -->
		<a name="websitecontact"></a>
		<div id="contact" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<div class="col-md-5 col-md-offset-7">
						<div class="section-header">
							<h4 class="sub-title">Contact Us</h4>
							<h2 class="title">Get In Touch</h2>
						</div>
						<div class="contact-content">					
							<h3>Tel: <a href="#">+91 78977 98888</a></h3>
							<p>Address: Apollo Bandar, Colaba, Mumbai.</p>
							<p>Email: <a href="#">DDCafe@gmail.com</a></p>
							<ul class="list-inline">
								<li><p>Follow Us:</p></li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>

				</div>
				<!-- /row -->

			</div>
			<!-- /container -->

			<!-- map -->
			<div id="map">
				
						<iframe width="700" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=saras%20cafe%20lucknow&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
						<a href="https://www.embedgooglemap.net/blog/nordvpn-coupon-code/"></a>
			</div>
			
			<!-- /map -->

		</div>
		<!-- Contact -->
		
		<!-- blog post reply -->
		<div id="review" class="modal fade">
			<div class="modal-dialog modal-login">
				<div class="modal-content">
					<div class="modal-header">				
						<h4 class="modal-title">Leave a Reply</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<form method="post" name="review_form">
							<div class="form-group">
								<input class="form-control" placeholder="Name" type="text" name="commenter_name">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Email" type="email" name="commenter_email">
							</div>
							<div class="form-group">
								<textarea class="form-control" placeholder="Message" name="review"></textarea>
							</div><br><br><br>
							<div class="form-group">
								<input type="submit" class="btn btn-success btn-lg btn-block" value="Submit" name="rev_frm">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<!-- /blog post reply -->

		

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
							<a href="#review" data-toggle="modal">Feedback</a>
						</nav>
					</div>
					
					
					<!-- /footer nav -->

				</div>
				<!-- /row -->

			</div>
			<!-- /container -->

		</footer>
		<!-- /Footer -->
		
		<!-- Login -->
		<div id="myModal" class="modal fade">
			<div class="modal-dialog modal-login">
				<div class="modal-content">
					<div class="modal-header">				
						<h4 class="modal-title">Customer Login</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<form method="post" name="login-form">
							<div class="form-group">
								<i class="fa fa-user"></i>
								<input type="text" class="form-control" placeholder="Email" required="required" name="email">
							</div>
							<div class="form-group">
								<i class="fa fa-lock"></i>
								<input type="password" class="form-control" placeholder="Password" required="required" name="password">		<br><br><br>		
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-success btn-lg btn-block" value="Login" name="log">
							</div>
						</form>				
						
					</div>
					<div class="modal-footer">
						<a href="registration.php">Click to Register</a>
					</div>
				</div>
			</div>
		</div>    
		<!-- /Login -->

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
	function loginprompt(){
		alert('Login to order');
	}
</script>
