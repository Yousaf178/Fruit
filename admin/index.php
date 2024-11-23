<?php 
include_once('include/connection.php');
 
if($_POST){
	$user = $_REQUEST['userName'];
	$password = $_REQUEST['userPassword'];
	
	
 $sel = "select * from admin where username='$user' and password='$password' ";
 $cmd = $db->query($sel);
 
 $result = mysqli_num_rows($cmd);
 
 
 if($result==1){
	 $row = $cmd->fetch_array();
	 
	  $_SESSION['id'] = $row['id'];
	 $_SESSION['full'] = $row['fullname'];
	 $_SESSION['user'] = $row['username'];
	 
	 header('Location:home.php');
	 
 }
 else{
	 
	 echo "<script>alert('Invalid user name and password')</script>";
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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-success"style="background-color:#c0c8cf;border:2px solid black">
                    <div class="panel-heading"style="background-color:lightblue;color:black">
                        <h3 class="panel-title"style="text-color:blue;">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="" Method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="User name" name="userName" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="userPassword" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" value="Login" class="btn btn-success">
                            </fieldset>
                        </form>
				
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
