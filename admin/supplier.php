<?php  include_once('include/connection.php'); ?>
<?php  include_once('include/header1.php'); ?>
<?php 

if(empty($_SESSION['id'])){
	
	header('Location:index.php');
}

?>
supplier
<?php  include_once('include/header2.php'); ?>
<!--- css ---->

<!--- js ---->
<?php  include_once('include/header3.php'); ?>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">suppliers</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

     <div class="row">
	 <a href="add_supplier.php" class="btn btn-success">Add Supplier</a>
	     <div class="table-responsive">
		    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
			   <thead>
			     <tr>
				    <th>#</th>
				    <th>Supplier</th>
				    <th>Contact</th>
				    <th>Email</th>
				    <th>NIC</th>
				    <th>Address</th>
				    <th>Action</th>
				 </tr>
			   </thead>
			   <tbody>
			   <?php 
			     $sel = "select * from suppliers";
				 $cmd =$db->query($sel);
				 $i = 1;
				 while($row= $cmd->fetch_array()){
				 
			   
			   ?>
			     <tr>
				    <td><?php  echo $i++; ?></td>
				    <td><?php echo $row['supplier'];  ?></td>
				    <td><?php echo $row['contact'];  ?></td>
				    <td><?php echo $row['email'];  ?></td>
				    <td><?php echo $row['nic'];  ?></td>
				    <td><?php echo $row['address'];  ?></td>
	
				    <td>
					<a href="edit_supplier.php?id=<?php echo $row['id']; ?>" class="glyphicon glyphicon-pencil"></a>
					<a href="delete_supplier.php?id=<?php echo $row['id']; ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete this Supplier');"></a>
				
					</td>
				 
				 
				 </tr>
				 <?php } ?>
			   </tbody>
			
			
			
			</table>
		 
		 </div>
	 
	 </div>



<?php  include_once('include/footer.php'); ?>