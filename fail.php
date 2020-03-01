<html>
	<head>
		<title>Payment Failedl</title>
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
			  color:red;
				margin-top: 25px;

			}
			a{
			  text-decoration: none;
			}
			.btn-danger{
				border-radius:50%;
			}
		
		</style>
		
		
	</head>
	<body>
		<div class="success-page">
		   <button type="button" class="btn btn-danger btn-lg">
			  <span class="glyphicon glyphicon-remove"></span>  
			</button>
			<h2>Payment Failed !</h2>
			<p>Try Again</p>  
			<a href="home.php">Back to Home</a>
		</div>
</div>
	</body>
</html>