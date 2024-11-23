<?php  include_once('include/connection.php'); ?>
<?php  include_once('include/header1.php'); ?>
<?php 

if(empty($_SESSION['id'])){
	
	header('Location:index.php');
}

?>
Customer order
<?php  include_once('include/header2.php'); ?>
<!--- css ---->

<!--- js ---->
<?php  include_once('include/header3.php'); ?>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Customer Order</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

     <div class="row">
	 <a href="add_customer_fruit.php" class="btn btn-success">Add Customer order</a>
	 <a href="order.php" class="btn btn-success"> Customer order</a>
	     <div class="table-responsive">
		    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
			   <thead>
			     <tr>
				    <th>#</th>
				    <th>Voucher</th>
				    <th>Customer</th>
				    <th>Quantity</th>
				    <th>Total Price</th>
				    <th>Date</th>
				    <th>Action</th>
				 </tr>
			   </thead>
			   <tbody>
			   <?php 
			   echo "select invoice_customer.id,customer,totalquantity,totalprice,voucher,invoice_customer.created from customers,invoice_customer where
 				          customers.id=invoice_customer.customerid";
			     $sel = "select invoice_customer.id,customer,totalquantity,totalprice,voucher,invoice_customer.created from customers,invoice_customer where
 				          customers.id=invoice_customer.customerid";
				 $cmd =$db->query($sel);
				 $i = 1;
				 while($row= $cmd->fetch_array()){
					 
					
				 
			   
			   ?>
			     <tr>
				    <td><?php  echo $i++; ?></td>
				    <td><?php echo $row['voucher'];  ?></td>
				    <td><?php echo $row['customer'];  ?></td>
				    <td><?php echo $row['totalquantity'];  ?></td>
				    <td><?php echo $row['totalprice'];  ?></td>
				    <td><?php echo $row['created'];  ?></td>
	
				    <td>
			<a href="printcustomer.php?voucher=<?php echo $row['voucher']; ?>" class="btn btn-success">Print</a>
			
			
					</td>
				 
				 
				 </tr>
				 <?php } ?>
			   </tbody>
			
			
			
			</table>
		 
		 </div>
	 
	 </div>



<?php  include_once('include/footer.php'); ?>