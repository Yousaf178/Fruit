<?php  include_once('include/connection.php'); ?>
<?php  include_once('include/header1.php'); ?>
<?php 

if(empty($_SESSION['id'])){
	
	header('Location:index.php');
}

?>
home
<?php  include_once('include/header2.php'); ?>
<!--- css ---->

<!--- js ---->
<?php  include_once('include/header3.php'); ?>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sample</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

     <div class="row">
	        <?php

             if(isset($_POST['voucher'])){
				 
				 $voucher = $_POST['voucher'];
				 $customer = $_POST['customerid'];
				 $quantity = $_POST['totalquantity'];
				 $price = $_POST['totalprice'];
				 
				 
			 $insert = "insert into invoice_customer(`voucher`,`customerid`,`totalquantity`,`totalprice`,`status`)
				                                     values('$voucher','$customer','$quantity','$price','1')";
			 $cmd = $db->query($insert);
			 if($cmd){
				 
				 
				 
				 
				 $sel = "select fruit_id,quantity from invoice_temporary where voucher='$voucher'";
				 $dmc = $db->query($sel);
				while($rows = $dmc->fetch_array()) {
					
					 $q = "select * from fruits where id='".$rows['fruit_id']."';";
					$dd = $db->query($q);
					
				   $rowss = $dd->fetch_array();
				    $new = $rowss['quantity']-$rows['quantity'];
					
					 $update = "update fruits set quantity='$new' where id='".$rows['fruit_id']."';";
					     $ddd = $db->query($update);
						//echo '<script>window.location="add_customer_fruit.php";</script>';
						echo '<script>window.location="printcustomer.php?voucher='.$voucher.'";</script>';
	
					
				}
				 
				 
				 
				 
				 
				 		 }
			 }



			?>
	 
	 </div>



<?php  include_once('include/footer.php'); ?>