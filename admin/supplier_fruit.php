<?php  include_once('include/connection.php'); ?>
<?php  include_once('include/header1.php'); ?>
<?php 

if(empty($_SESSION['id'])){
	
	header('Location:index.php');
}

?>
Supplier order
<?php  include_once('include/header2.php'); ?>
<!--- css ---->

<!--- js ---->
<?php  include_once('include/header3.php'); ?>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Supplier Order</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

     <div class="row">
	 <a href="add_supplier_fruit.php" class="btn btn-success">Add supplier order</a>
	     <div class="table-responsive">
		    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
			   <thead>
			     <tr>
				    <th>#</th>
				    <th>Voucher</th>
				    <th>supplier</th>
				    <th>Fruit</th>
				    <th>Quantity</th>
				    <th>Unit Price</th>
				    <th>Total Price</th>
				    <th>Date</th>
				    <th>Action</th>
				 </tr>
			   </thead>
			   <tbody>
			   <?php 
			     $sel = "select supplier_fruits.id,supplier,fruit,supplier_fruits.quantity,unitprice,totalprice,voucher,supplier_fruits.created,supplier_fruits.status from fruits,suppliers,supplier_fruits where
 				          supplier_fruits.supplier_id=suppliers.id and
						  supplier_fruits.fruit_id=fruits.id";
				 $cmd =$db->query($sel);
				 $i = 1;
				 while($row= $cmd->fetch_array()){
				 
			   
			   ?>
			     <tr>
				    <td><?php  echo $i++; ?></td>
				    <td><?php echo $row['voucher'];  ?></td>
				    <td><?php echo $row['supplier'];  ?></td>
				    <td><?php echo $row['fruit'];  ?></td>
				    <td><?php echo $row['quantity'];  ?></td>
				    <td><?php echo $row['unitprice'];  ?></td>
				    <td><?php echo $row['totalprice'];  ?></td>
				    <td><?php echo $row['created'];  ?></td>
	
				    <td>
					<a href="edit_order.php?id=<?php echo $row['id']; ?>" class="glyphicon glyphicon-pencil"></a>
					<a href="delete_order.php?id=<?php echo $row['id']; ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete this order');"></a>
					</td>
				 
				 
				 </tr>
				 <?php } ?>
			   </tbody>
			
			
			
			</table>
		 
		 </div>
	 
	 </div>



<?php  include_once('include/footer.php'); ?>