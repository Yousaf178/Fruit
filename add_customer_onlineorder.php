<!-- header -->
<!doctype html>
<html>
<html lang="en">
<head>
<title>Eco Fruits an Agriculture Category Bootstrap Responsive Template | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Eco Fruits Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">   
<link href="css/font-awesome.css" rel="stylesheet"> <!-- font-awesome icons -->
<link rel="stylesheet" href="css/lightbox.css">  
<!-- //Custom Theme files --> 
<!-- js -->
<script src="js/jquery-2.2.3.min.js"></script>  
<!-- //js -->
<!-- web-fonts -->   
<link href="//fonts.googleapis.com/css?family=Oranienbaum" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
<!-- //web-fonts -->
</head>
<body>
<?php include('includes/header.php')?>

<div class="top-nav w3-agiletop">
		<div class="container">
			<div class="navbar-header w3llogo" style="height: 75px;margin-top: -17px;"> 
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>  
				<h1><img src="images/swat.jpg"width=100 ></h1> 
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"style="background-color:lightgreen;     margin-left: 99px;">
				<div class="w3menu navbar-right">
					<ul class="nav navbar"style="line-height:40px;font-weight:bold;">
						<li><a href="index.php">Home</a></li>
						<li><a href="about.php" >About us</a></li> 
						<li><a href="services.php">Services</a></li>
						<li><a href="gallery.php">Gallery</a></li>
					   <li><a href="onlineorder.php" class="">Order Now</a></li>
					   <li><a href="logout.php" class="">logout</a></li>
						<li><a href="contacts.php">Contact Us</a></li>
					</ul>
				</div> 
				<div class="clearfix"> </div>  
			</div>
		</div>	
	</div>	 

	


<?php  include_once('admin/include/connection.php'); ?>


<?php 

if(isset($_POST['saveorder'])){
	
	$customer = $_POST['customer'];
	$fruit = $_POST['fruit'];
	$quantity = $_POST['quantity'];
	//$price = $_POST['price'];
	$voucher = $_POST['voucher'];
	$total = $_POST['total'];
	//$description = $_POST['description'];
	//$date = date('Y-m-d');
	//$status = 1;
	/*
   $insert = "insert into customer_fruit(`voucher`,`customer_id`,`fruit_id`,`quantity`,`unitprice`,`totalprice`,`description`,`created`,`status`)
                            	values('$voucher','$customer','$fruit','$quantity','$price','$total','$description','$date','$status')";						
	*/
                            	echo "insert into online_order(`customer_id`,`online_voucher_id`,`fruit_id`,`quantity`)
                                  	values('$customer','$voucher','$fruit','$quantity')";
	$insert = "insert into online_order(`customer_id`,`online_voucher_id`,`fruit_id`,`quantity`)
                                  	values('$customer','$voucher','$fruit','$quantity')";

	$cmd  = $db->query($insert);
  if($cmd){
	  
	   echo '<script>window.location="onlineorder.php?customer='.$customer.'";</script>';
	// header('Location:onlineorder.php');
	 
  }	
  else{
	  echo "Record not save";
  }
	
	
}

if(isset($_POST['saveinvoice'])){
	
	$totalq = $_POST['totalquantity'];
	$voucher = $_POST['voucher'];
	$customer = $_SESSION['id'];
	$date = date('Y-m-d');
	
	$q = "INSERT INTO `online_voucher` (`voucher`, `total_quantity`, `customer_id`, `created`, `status`)
                	VALUES ('$voucher', '$totalq', '$customer', '$date','1');";
	$cmd = $db->query($q);
	if($cmd)
	{
		
	header('location:index.php');
	
		
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
</title>
 <!-- Bootstrap Core CSS -->
    <link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="admin/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	

	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	
 

            <div class="row">
			
			
                <div class="col-md-8"style="text-align:center">
                    <h1 style="font-size:50px;color:;padding-left:370px;"><i>Please Enter your Order</i></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

     <div class="row">
	 
	             <div class="col-md-1 col-md-offset-2" style="border:0px solid black;">
				 
	    
	     <form action="" method="POST">
		 	  
			 <?php
                $sl = "select max(voucher) as max from online_voucher";
			   $mdc = $db->query($sl);
			   $row_voucher = $mdc->fetch_array();
			   $voucher =  $row_voucher['max']+1;

			 ?>
			 
			
			
				   
			   

			    
		 
		 </form>
			</div>
			<div class="col-md-2" align="left">
		    <table class="table" style="border: 1px solid blue;">
			<caption style="color:white;text-align:center;border:1px solid blue;background-color:blue;">Customer order list</caption>
           <thead>			  
 			  <tr>
			     <th>S/n</th>
			     <th>Fruit</th>
			     <th>Quantity</th>
			   </tr>
			   </thead>
			   <tbody>
			   <?php 
			    $list = "select fruit,online_order.quantity,online_order.id,online_voucher_id,fruits.unit_price 
				from fruits,online_order where fruits.id=online_order.fruit_id and online_voucher_id='$voucher' and customer_id='".$_SESSION['id']."'";
				 $cmd = $db->query($list);
				 $i = 1;
				 while($rows = $cmd->fetch_array()){
			   
			   ?>
			 
			   <tr>
			     <td><?php  echo $i++; ?></td>
			     <td><?php  echo $rows['fruit']; ?></td>
			     <td><?php  echo $rows['quantity']; ?></td>
			   
			   
			   </tr>
				 <?php } ?>
			</tbody>
			
			</table>
		
		</div>
		<div align="left" class="col-md-5">
		   <div class="panel panel-primary">
		      <div class="panel panel-heading">Order list</div>
			  
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
				 $sl = "select fruit,online_order.quantity,online_order.id,online_voucher_id,fruits.unit_price ,fruits.id as fid
				from fruits,online_order where fruits.id=online_order.fruit_id and online_voucher_id='$voucher' and customer_id='".$_SESSION['id']."'";
				  $dmc = $db->query($sl);
				  $i=1;
				  $totalquantity = 0;
				  $totalprice = 0;
				  while($rows = $dmc->fetch_array()){
				 $fuitID = $rows['fid'];
				 ?>
				    <tr>
					  <td><?php echo $i++; ?></td>
					  <td><?php echo $rows['fruit']; 
					  $fruit = $rows['fruit'];?></td>
					  <td><?php echo $rows['quantity']; 
					       $totalquantity +=$rows['quantity'];
					  ?></td>
					  <td><?php echo $rows['unit_price']; 
					  $unitprice = $rows['unit_price'];
					?></td>
					  <td><?php
					  $total_price=$rows['unit_price'] * $rows['quantity'];
					   echo $total_price;
                           $totalprice +=$total_price;
						   
					  ?></td>
					</tr>
				  <?php } ?>
				 </tbody>
				 <tfoot>
				 <form action="" Method="POST">
				    <tr>
					 <td></td>
					 <td><b>Total quantity :</b></td>
					 <td><input type="text" readonly value="<?php echo $totalquantity; ?>" name="totalquantity" ></td>
					 <td><b>Total Amount :</b></td>
					 <td><input type="text" readonly value="<?php echo $totalprice; ?>" name="totalprice"></td>
					 <input type="hidden" name="voucher" value="<?php echo $voucher; ?>">
					 <input type="hidden" name="customerid" value="<?php echo $_GET['customer']; ?>">
					</tr>
					<tr>
					  <td></td>
					  <td><a href="order_submit.php?voucher=<?php echo $voucher; ?>&&customer=<?php echo $_SESSION['id']; ?>&&quantity=<?php echo $totalquantity; ?>&&totalprice=<?php echo $totalprice; ?>&&fruit=<?php echo $fuitID; ?>&&unitprice=<?php echo $unitprice; ?> "class="btn btn-primary">Buy</a></td>
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

	        <script src="js/jquery-2.2.3.min.js"></script>

<?php  include_once('includes/footer.php'); ?> 
</html>
	
