<?php  include_once('include/connection.php'); ?>
<?php  include_once('include/header1.php'); ?>
<?php 

if(empty($_SESSION['id'])){
	
	header('Location:index.php');
}

?>
 order
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
	 
	     <div class="table-responsive">
		    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
			   <thead>
			     <tr>
				
				    <th>S/n</th>
				    <th>Voucher</th>
				    <th>Customer</th>
				    <th>Quantity</th>
					<th>Date</th>
					<th>Action</th>
				 </tr>
			   </thead>
			   

              <tbody>
			   <?php 
			   echo "select online_voucher.id,customer,total_quantity,voucher,online_voucher.created,customer_id  from customers,online_voucher  where
 				          customers.id=online_voucher.customer_id 
                      					  ";
			     $sel = "select online_voucher.id,customer,total_quantity,voucher,online_voucher.created,customer_id  from customers,online_voucher  where
 				          customers.id=online_voucher.customer_id 
                      					  ";
				 $cmd =$db->query($sel);
				 $i = 1;
				 while($row= $cmd->fetch_array()){
					 
					
				 
			   
			   ?>
			     <tr>
				    <td><?php  echo $i++; ?></td>
				    <td><?php echo $row['voucher'];  ?></td>
				    <td><?php echo $row['customer'];  ?></td>
				    <td><?php echo $row['total_quantity'];  ?></td>
				    <td><?php echo $row['created'];  ?></td>
	                <td><a href="add_customer_onlineorder.php?voucher=<?php echo $row['voucher']; ?>&&customer=<?php echo $row['customer_id']; ?>" class="btn btn-success">Check order</a></td>

				 
				 
				 </tr>
				 <?php } ?>
			   </tbody>
			
			
	
			</tbody>
		 </table>
		 </div>
		 			   	 <a href="customer_fruit.php" class="btn btn-success">Back</a>
	 
	 </div>



<?php  include_once('include/footer.php'); ?>