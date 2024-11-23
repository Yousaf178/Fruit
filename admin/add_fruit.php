<?php  include_once('include/connection.php'); ?>
<?php  include_once('include/header1.php'); ?>
<?php 

if(empty($_SESSION['id'])){
	
	header('Location:index.php');
}

?>
Customer
<?php  include_once('include/header2.php'); ?>
<?php 

if($_POST){
	
	$errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
       $file_tmp =$_FILES['image']['tmp_name'];
	   $file_desc =$_FILES['image']['desc'];
     $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
	$fruit = $_POST['fruit'];
	$quantity=$_POST['quantity'];
	$file_desc=$_POST['desc'];
	
    $insert = "insert into fruits(`fruit`,`image`,quantity,`description`)
                            	values('$fruit','$file_name','$quantity','$file_desc')";
						
	$cmd  = $db->query($insert);
  if($cmd){
	  
	  $insert = "insert into stores()";
	   echo '<script>window.location="fruit.php";alert("Record save successfull");</script>';
	 // header('Location:supplier.php');
	 
  }	
  else{
	 // echo "Record not save";
  }
	
	
}


?>
<!--- css ---->

<!--- js ---->
<?php  include_once('include/header3.php'); ?>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add new fruit</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

     <div class="row">
	 <div class="col-md-6">
	     <form action="" method="POST"  enctype="multipart/form-data" >
		    <div class="form-group">
			 <label>Fruit</label>
			 <input type="text" name="fruit" class="form-control" placeholder="Please enter fruit name here">
		
			</div>
		<div class="form-group">
			 <label>Picture</label>
			 <input type="file" name="image" class="form-control">
			 
			  <div class="form-group">
			 <label>Quantity</label>
			 <input type="text" name="quantity" class="form-control" placeholder=" Enter Quantity">
		
			</div>

			  <div class="form-group">
			 <label>Description</label>
			 <input type="text" name="desc" class="form-control" placeholder="Please enter description name here">
		
			</div>
			
			
			
			</div>
			    <div class="form-group">
			 
			 <input type="submit" class="btn btn-primary">
			
			</div>
		 
		 </form>
		</div> 
	 
	 </div>



<?php  include_once('include/footer.php'); ?>