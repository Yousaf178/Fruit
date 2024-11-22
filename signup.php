
<?php  include_once('admin/include/connection.php'); ?>
<?php 

if($_POST){
	
	$customer = $_POST['name'];
	$contact = $_POST['contact'];
	$nic = $_POST['nic'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	//$created = $_POST['created'];
	//$status = $_POST['status'];
	$login = $_POST['login'];
	$password = $_POST['password'];

	
    $insert = "insert into customers(`customer`,`contact`,`nic`,`email`,`address`,`status`,`login`,`password`)
                           values('$customer','$contact','$nic','$email','$address','1','$login','$password')";
							
	
	$cmd  = $db->query($insert);
  if($cmd){
	   echo '<script>window.location="signup.php";alert("Record save successfull");</script>';
	 header('Location:login.php');
	 
  }	
  else{
	 // echo "Record not save";
  }
	
	
}


?>
	

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
 <?php include('includes/header.php')?>


<body style="background-color:silver;background-image:url('01.jpg');background-image-width:100%; background-repeat:no-repeat;">
     



    <div class="container" style="margin-top:50px;margin-left:150px;">
	
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:-80px;">
                <div class="login-panel panel panel-success"style="background-color:#c0c8cf;border:2px solid black;">
                    <div class="panel-heading"style="background-color:lightblue;color:black;">
                        <h3 class="panel-title"style="text-color:blue;">Please Enter Personal Information</h3>
                    </div>
                    <div class="panel-body">
					
					
                        <form role="form" action="" Method="POST">
						
                            <fieldset>
							
                                <div class="form-group" >
								
								  
                                    <input class="form-control" placeholder="Full name" name="name" type="text" autofocus >
                                </div>
								
								 <div class="form-group">
								 
                                    <input class="form-control" placeholder="Contact" name="contact" type="text" autofocus>
                                </div>
									 <div class="form-group">
			                 
			                <input type="email" name="email" class="form-control" placeholder="Email">
			
			                 </div>
								 <div class="form-group">
								 
                                    <input class="form-control" placeholder="NIC" name="nic" type="text" autofocus>
                                </div>
								<div class="form-group">
								 
                                    <input class="form-control" placeholder="Address" name="address" type="text" >
                                </div>
						
								 <div class="form-group">
							
                                    <input class="form-control" placeholder="Please Enter your User name" name="login" type="text" >
                                </div>
                                <div class="form-group">
								
                                    <input class="form-control" placeholder="Please Enter your Password" name="password" type="password" >
                                </div>
								
								
                          
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" value="Save" class="btn btn-success" style="margin-left:110px;width:100px;border:1px solid black;">
                          
                            </fieldset>
                        </form>
				
                    </div>
                </div>
            </div>
        </div>
		
		
    </div>
	

    <!-- jQuery -->
    <script src="admin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin/dist/js/sb-admin-2.js"></script>
	
	

</body>

</html>
