<html>
	<head>
		<title>Payment Successful</title>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
		<style>
			.success-page{
			  max-width:300px;
			  display:block;
			  margin: 0 auto;
			  text-align: center;
				  position: relative;
				top: 50%;
				transform: perspective(1px) translateY(50%)
			}
			.success-page img{
			  max-width:62px;
			  display: block;
			  margin: 0 auto;
			}

			.btn-view-orders{
			  display: block;
			  border:1px solid #47c7c5;
			  width:100px;
			  margin: 0 auto;
			  margin-top: 45px;
			  padding: 10px;
			  color:#fff;
			  background-color:#47c7c5;
			  text-decoration: none;
			  margin-bottom: 20px;
			}
			h2{
			  color:#47c7c5;
				margin-top: 25px;

			}
			a{
			  text-decoration: none;
			}
			
			.btn-success{
				border-radius:50%;
			}
		
		</style>
		
	</head>
	<body>
		<div class="success-page">
			<button type="button" class="btn btn-success btn-lg">
			  <span class="glyphicon glyphicon-ok"></span>
			</button>
			  <h2>Payment Successful !</h2>
			  <p>We are delighted to inform you that we received your payments</p>
			  <a href="product_history.php" class="btn-view-orders">View Orders</a>
			  <a href="index.php">Continue Shopping</a>
		</div>
	</body>
</html>