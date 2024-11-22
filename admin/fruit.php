<?php  include_once('include/connection.php'); ?>
<?php  include_once('include/header1.php'); ?>
<?php 

if(empty($_SESSION['id'])){
	
	header('Location:index.php');
}

?>
fruit
<?php  include_once('include/header2.php'); ?>
<!--- css ---->

<!--- js ---->
<?php  include_once('include/header3.php'); ?>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Fruits</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

     <div class="row">
	 <a href="add_fruit.php" class="btn btn-primary ">Add fruit</a>
	     <div class="table-responsive">
		    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
			   <thead>
			     <tr>
				    <th>#</th>
				    <th>Fruit</th>
				    <th>image</th>
				    <th>Quantity</th>
					<th>Desc</th>
					<th>Action</th>
					
					
				 </tr>
			   </thead>
			   <tbody>
			   <?php 
			     $sel = "select * from fruits";
				 $cmd =$db->query($sel);
				 $i = 1;
				 while($row= $cmd->fetch_array()){
				 
			   
			   ?>
			     <tr>
				    <td><?php  echo $i++; ?></td>
				    <td><?php echo $row['fruit'];  ?></td>
				    <td><img src="../images/<?php echo $row['image'];  ?>" width="70" height="70" alt="no image"></td>
				    <td><?php echo $row['quantity'];  ?></td>
					<td><?php echo $row['description'];  ?></td>
	
				    <td>
					<a href="edit_fruit.php?id=<?php echo $row['id']; ?>" class="glyphicon glyphicon-pencil"></a>
					<a href="delete_fruit.php?id=<?php echo $row['id']; ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete this customer');"></a>
					</td>
				 
				 
				 </tr>
				 <?php } ?>
			   </tbody>
			
			
			
			</table>
		 
		 </div>
	 
	 </div>



<?php  include_once('include/footer.php'); ?>