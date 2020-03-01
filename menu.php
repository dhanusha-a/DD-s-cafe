<?php

	include 'connection.php';

	$menu="SELECT * FROM product";	
	
	if(isset($_POST["cat_id"]))			
	{		
		if($_POST["cat_id"]==0){
			$menu="SELECT * FROM product ORDER BY price";
		}
		else{
			$menu="SELECT * FROM product where category_id = '".$_POST["cat_id"]."' ";
		}
	}
	
	if(isset($_POST["search"])){
		$search=$_POST["search"];
		$menu="SELECT * FROM product WHERE LOWER(product_name) LIKE LOWER('%{$search}%') ";
	}
	
	$r1=mysqli_query($connect,$menu);	
	
	$output = '';	
	
	foreach($r1 as $rs0)
	{
		$output.= '<div class="col-md-6">
						<div class="full">
							<div class="for_img">
								<img class="sirdard" src="'.$rs0['photo'].'">
							</div>
							
							<div class="single-dish">											
								<!--<div class="single-dish-heading">--> <!--</div>-->
								<h4 class="name">'.$rs0['product_name'].'</h4>
								<h4 class="price">Rs '.$rs0['price'].'</h4>										
								<p>'.$rs0['description'].' </p>										
								<input type="button" name="add_to_cart" id='.$rs0['product_id'].' class="btn btn-success form-control add_to_cart" value="+Add" />
								<ul>
									<li><a href="#"><i class="fa fa-star"></i></a></li>
									<li><a href="#"><i class="fa fa-star"></i></a></li>
									<li><a href="#"><i class="fa fa-star"></i></a></li>
									<li><a href="#"><i class="fa fa-star"></i></a></li>
									<li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
								</ul>
							</div>		
								
							<input type="hidden" name="hidden_quantity" id="quantity'. $rs0['product_id'].'" value=1 />
							<input type="hidden" name="hidden_name" id="name'.$rs0['product_id'].'" value="'.$rs0['product_name'].'" />
							<input type="hidden" name="hidden_price" id="price'.$rs0['product_id'].'" value="'.$rs0['price'].'" />							
						</div>
					</div> ';	
	}	
	echo $output;
?>