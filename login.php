<?php 
include_once('admin/include/connection.php');

 
if($_POST){
	$login = $_POST['login'];
	$password = $_POST['userPassword'];
	
	
 $sel = "select * from customers where login='$login' and password='$password' ";
 $cmd = $db->query($sel);
 
 $result = mysqli_num_rows($cmd);
 
 if($result==1){
	 $row = $cmd->fetch_array();
	 
	  $_SESSION['id'] = $row['id'];
	 $_SESSION['full'] = $row['login'];
	 //$_SESSION['password'] = $row['password'];
	 
	 header('Location:index.php');
	 
 }
 else{
	 
	 echo "<script>alert('Invalid user name and password')</script>";
 }
 
	
}

?>

<!DOCTYPE html>
<html lang="en">
<!-- header -->

<head>

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

<body style="background-color:silver;background-image:url('p.jpg');background-image-width:100%; background-repeat:no-repeat;">

     <?php include('includes/header.php')?>


    <div class="container">

        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-success"style="background-color:#c0c8cf;border:2px solid black">
                    <div class="panel-heading"style="background-color:lightblue;color:black">
                        <h3 class="panel-title"style="text-color:blue;">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="" Method="POST">
                            <fieldset>
                                <div class="form-group">
								<label>User Name :</label>
                                    <input class="form-control" placeholder="User name" name="login" type="text" autofocus>
                                </div>
                                <div class="form-group">
								<label>Password</label>
                                    <input class="form-control" placeholder="Password" name="userPassword" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" value="Login" class="btn btn-success pull-right">
                              <a href="signup.php" class="btn btn-success pull">Sign Up</a>
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
