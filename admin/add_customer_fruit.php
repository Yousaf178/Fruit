<?php
error_reporting(0);
  include_once('include/connection.php'); ?>
<?php  include_once('include/header1.php'); ?>
<?php 

if(empty($_SESSION['id'])){
	
	header('Location:index.php');
}

?>
Customer oder
<?php  include_once('include/header2.php'); ?>
<?php 

if($_POST){
	
	$customer = $_POST['customer'];
	$fruit = $_POST['fruit'];
	$quantity = $_POST['quantity'];
	$price = $_POST['price'];
	$voucher = $_POST['voucher'];
	$total = $_POST['total'];
	//$description = $_POST['description'];
	//$date = date('Y-m-d');
	//$status = 1;
	
   // $insert = "insert into customer_fruit(`voucher`,`customer_id`,`fruit_id`,`quantity`,`unitprice`,`totalprice`,`description`,`created`,`status`)
                            	// values('$voucher','$customer','$fruit','$quantity','$price','$total','$description','$date','$status')";						
	
	$insert = "insert into invoice_temporary(`voucher`,`fruit_id`,`customer_id`,`quantity`,`price`,`totalprice`)
                                  	values('$voucher','$fruit','$customer','$quantity','$price','$total')";

	$cmd  = $db->query($insert);
  if($cmd){
	  
	   echo '<script>window.location="add_customer_fruit.php?customer='.$customer.'";</script>';
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
<script type="text/javascript">
$(document).ready(function() {
	$("#qu").blur(function(){
		var id=$('#fruit').val();
		var quantity =$('#qu').val();
		$.ajax({
			url:'quantity_ajax.php?id='+id+'&&qu='+quantity,
			success:function(data){
				if(data=='Sorry your order is out of range'){
				$(".box").html(data);
				$('#qu').val('');
				}else{
					
					$(".box").html(data);
				}
			}
		});
	});
	});
</script>
<style>

.box{
	
	color:red;
	width:200px;
	height:5px;
}

</style>
<!--- js ---->
<?php  include_once('include/header3.php'); ?>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add new Customer Order</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

     <div class="row">
	 <div class="col-md-4">
	     <form action="" method="POST">
		 	    <div class="form-group">
			 <label>Voucher</label>
			 <?php
               $sl = "select max(voucher) as max from invoice_customer";
			   $mdc = $db->query($sl);
			   $row_voucher = $mdc->fetch_array();
			   $voucher =  $row_voucher['max']+1;

			 ?>
			 <input type="text" name="voucher" id="" value="<?php  echo $voucher; ?>" class="form-control" >
			
			</div>
			<?php 
			 if(!isset($_GET['customer'])){
			
			?>
		    <div class="form-group">
			 <label>Customer</label>
			<select name="customer" class="form-control" >
			<option>--please select customer--</option>
			<?php 
			$q = "select * from customers";
			$dmc = $db->query($q);
			while($rows = $dmc->fetch_array()){
			?>
			<option value="<?php echo $rows['id']; ?>"><?php echo $rows['customer']; ?></option>
			<?php } ?>
			</select>
			
			</div>
			 <?php } else{ ?>
			 	    <div class="form-group">
			 <label>Customer</label>
			<select name="customer" class="form-control" >

			<?php 
			$q = "select * from customers where id='".$_GET['customer']."'";
			$dmc = $db->query($q);
		    $rows = $dmc->fetch_array();
			?>
			<option value="<?php echo $rows['id']; ?>" selected><?php echo $rows['customer']; ?></option>
	
			</select>
			
			</div>
			 <?php } ?>
				    <div class="form-group">
			 <label>Fruit</label>
			<select name="fruit" id="fruit" class="form-control" >
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
			 <input type="text" name="quantity" id="qu" class="form-control" placeholder=""><span class="box"></span>
			
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
			 
			 <input type="submit" value="Save to Cart" class="btn btn-primary">
			
			</div>
		 
		 </form>
		</div> 
		<div class="col-md-8">
		   <div class="panel panel-primary">
		      <div class="panel panel-heading">Order list</div>
			  <div class="panel panel-body">
			  <table class="table table-border">
			     <thead>
				   <tr>
				      <th>s/N</th>
				      <th>Fruit</th>
				      <th>quantity</th>
				      <th>unit price</th>
				      <th>Total price</th>
					  
				   </tr>
				 </thead>
				 <tbody>
				 <?php 
				// echo "select fruit,invoice_temporary.quantity,price,created,voucher,totalprice from 
				 // fruits,invoice_temporary where fruits.id=invoice_temporary.fruit_id and voucher='$voucher'";exit();
				 $sl = "select fruit,invoice_temporary.quantity,price,voucher,totalprice from 
				  fruits,invoice_temporary where fruits.id=invoice_temporary.fruit_id and voucher='$voucher'";
				  $dmc = $db->query($sl);
				  $i=1;
				  $totalquantity = 0;
				  $totalprice = 0;
				  while($rows = $dmc->fetch_array()){
				 
				 ?>
				    <tr>
					  <td><?php echo $i++; ?></td>
					  <td><?php echo $rows['fruit']; ?></td>
					  <td><?php echo $rows['quantity']; 
					       $totalquantity +=$rows['quantity'];
					  ?></td>
					  <td><?php echo $rows['price']; ?></td>
					  <td><?php echo $rows['totalprice'];
                           $totalprice +=$rows['totalprice'];
						   
					  ?></td>
					</tr>
				  <?php } ?>
				 </tbody>
				 <tfoot>
				 <form action="invoice_send.php" Method="POST">
				    <tr>
					 <td></td>
					 <td>Total quantity :</td>
					 <td><input type="text" readonly value="<?php echo $totalquantity; ?>" name="totalquantity" ></td>
					 <td>Total Amount :</td>
					 <td><input type="text" readonly value="<?php echo $totalprice; ?>" name="totalprice"></td>
					 <input type="hidden" name="voucher" value="<?php echo $voucher; ?>">
					 <input type="hidden" name="customerid" value="<?php echo $_GET['customer']; ?>">
					</tr>
					<tr>
					  <td></td>
					  <td><input type="submit" value="Save" class="btn btn-success"></td>
					  <td></td>
					  <td></td>
					  <td></td>
					</tr>
				 </form>
				 </tfoot>
				 
			  
			  </table>
			  </div>
		   
		   </div>
		
		</div>
	 
	 </div>



<?php  include_once('include/footer.php'); ?>