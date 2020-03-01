<?php

if(isset($_GET['ORDER_ID'])){
	echo $_GET['ORDER_ID'];
	echo $_GET['CUST_ID'];	
}
else
{
	echo "Not";
}
?>