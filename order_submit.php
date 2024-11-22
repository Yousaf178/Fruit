<?php  include_once('admin/include/connection.php'); ?>
<?php

$voucher = $_GET['voucher'];
$customer = $_GET['customer'];
$quantity = $_GET['quantity'];
$totalprice = $_GET['totalprice'];
$fruit = $_GET['fruit'];
$unitprice = $_GET['unitprice'];


$insertintocustomerinvoice = "insert into invoice_customer(`voucher`,`customerid`,`totalquantity`,`totalprice`,`status`)
                                  	values('$voucher','$customer','$quantity','$unitprice','1')";
$cmd  = $db->query($insertintocustomerinvoice);

$insert = "insert into invoice_temporary(`voucher`,`fruit_id`,`customer_id`,`quantity`,`price`,`totalprice`)
                                  	values('$voucher','$fruit','$customer','$quantity','$unitprice','$totalprice')";
	$cmd  = $db->query($insert);
  if($cmd){
	  
	   echo '<script>window.location="index.php";</script>';
	// header('Location:onlineorder.php');
	 
  }	
  else{
	  echo "Record not save";
  }
?>