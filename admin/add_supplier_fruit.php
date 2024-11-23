<?php  include_once('include/connection.php'); ?>
<?php  include_once('include/header1.php'); ?>
<?php 

if(empty($_SESSION['id'])){
	
	header('Location:index.php');
}

?>
supplier oder
<?php  include_once('include/header2.php'); ?>
<?php 

if($_POST){
	
	$supplier = $_POST['supplier'];
	$fruit = $_POST['fruit'];
	$quantity = $_POST['quantity'];
	$price = $_POST['price'];
	$voucher = $_POST['voucher'];
	$total = $_POST['total'];
	$description = $_POST['description'];
	$date = date('Y-m-d');
	$status = 1;
	
   $insert = "insert into supplier_fruits(`voucher`,`supplier_id`,`fruit_id`,`quantity`,`unitprice`,`totalprice`,`description`,`created`,`status`)
                            	values('$voucher','$supplier','$fruit','$quantity','$price','$total','$description','$date','$status')";						
	$cmd  = $db->query($insert);
  if($cmd){
	  
	     $sel = "select * from fruits where id='".$fruit."'";
		 $dmc =  $db->query($sel);
		 
		 $row = $dmc->fetch_array();
		 
		 $newquantity = $row['quantity'] + $quantity;
	  
	  $update  = "update fruits set quantity='$newquantity' where id='".$fruit."'";
	  $cmh = $db->query($update);
	  
	   echo '<script>window.location="supplier_fruit.php";alert("Record save successfull");</script>';
	 // header('Location:supplier.php');
	 
  }	
  else{
	  echo "Record not save";
  }
	
	
}


?>
<!--- css ---->
    <script src="js/jquery.min.js"></script>
    <script src="js/external/jquery/jquery.js"></script>
<script>
$(document).ready(function(){
	$("#price , #qu").change(function(){
		var quantity = $('#qu').val();
		var price = $('#price').val();
		var total = quantity * price;
		
		 $('#total').val(total);
		
	});
	
});


</script>
<!--- js ---->
<?php  include_once('include/header3.php'); ?>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add new Supplier Order</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

     <div class="row">
	 <div class="col-md-6">
	     <form action="" method="POST">
		 	    <div class="form-group">
			 <label>Voucher</label>
			 <?php
               $sl = "select max(voucher) as max from supplier_fruits";
			   $mdc = $db->query($sl);
			   $row_voucher = $mdc->fetch_array();

			 ?>
			 <input type="text" name="voucher" id="" value="<?php  echo $row_voucher['max']+1; ?>" class="form-control" >
			
			</div>
		    <div class="form-group">
			 <label>Supplier</label>
			<select name="supplier" class="form-control" >
			<option>--please select supplier--</option>
			<?php 
			$q = "select * from suppliers";
			$dmc = $db->query($q);
			while($rows = $dmc->fetch_array()){
			?>
			<option value="<?php echo $rows['id']; ?>"><?php echo $rows['supplier']; ?></option>
			<?php } ?>
			</select>
			
			</div>
				    <div class="form-group">
			 <label>Fruit</label>
			<select name="fruit" class="form-control" >
			<option>--please select Fruit--</option>
			<?php 
			$q = "select * from fruits";
			$dmc = $db->query($q);
			while($rows = $dmc->fetch_array()){
			?>
			<option value="<?php echo $rows['id']; ?>"><?php echo $rows['fruit']; ?></option>
			<?php } ?>
			</select>
			
			</div>
			    <div class="form-group">
			 <label>Quantity</label>
			 <input type="text" name="quantity" id="qu" class="form-control" placeholder="">
			
			</div>
		     <div class="form-group">
			 <label>Unit Price</label>
			 <input type="text" name="price" id="price" class="form-control" placeholder="Please enter supplier nic here">
			
			</div>
			    <div class="form-group">
			 <label>Total Price</label>
			 <input type="text"  readonly name="total" id="total" class="form-control" >
			
			</div>
			    <div class="form-group">
			 <label>Description</label>
			 <textarea class="form-control" name="description"></textarea>
			
			</div>
			    <div class="form-group">
			 
			 <input type="submit" class="btn btn-primary">
			
			</div>
		 
		 </form>
		</div> 
	 
	 </div>



<?php  include_once('include/footer.php'); ?>