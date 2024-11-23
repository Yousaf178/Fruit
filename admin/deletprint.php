<?php 
include_once("include/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Bilty</title>
<!-- Bootstrap Core CSS -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet" >
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Signika+Negative" rel="stylesheet">
</head>
<style>
.container{
	width:80%;
	border:2px solid #666;
	
	margin-top:30px;
	}
.btn {
    alignment-adjust: central;
        margin:4px 0px 16px 290px;

    padding: 7px 32px;
    font-size: 20px;
    color: #FFF;
    
}
.btn:hover{
	color:#FFF;
	}
</style>
<style media="print">
 @page {
  size: auto;
  margin: 0;
       }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>



<script src="js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
function myFunction() {
		$('#back').hide();
		$('url').hide();
        window.print();

}
</script>
</head>


<body>
<div class="container">
<div class="row" style="background-color:green; color:white;">
 <button class="btn btn-primary hidden-print pull-right" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Delet</button>
<!-- add logo here -->
 <h3 class="text-center">Swat Fruit Project</h3>
  <p class="text-center"><?php echo date('d/m/Y  h:i:sa'); ?></p>
</div>  
  <hr>
  
<div class="row">
<div class="col-lg-12">
<table width="800">
<?php
 $sel = "select customer,contact,address,voucher,invoice_customer.created
  from customers,invoice_customer where customers.id=invoice_customer.customerid and voucher='".$_GET['voucher']."'";
  $cmd = $db->query($sel);
  $row = $cmd->fetch_array();

 ?>
 <tr>
 <td>voucher : </td><td> <?php  echo $row['voucher'];?></td><td></td>
 <td>Date : </td><td> <?php  echo $row['created'];?> </td>
 </tr>
 <tr>
    <td>Customer :</td><td><?php  echo $row['customer'];?></td><td></td><td>contact :</td><td><?php  echo $row['contact'];?></td>
	</tr>
    <td span="2">address : </td><td><?php  echo $row['address'];?></td>
 </tr>

</table>
  <hr>
  <table class="table table-border">
     <thead>
	    <th>#</th>
	    <th>Fruit</th>
	    <th>Quantity</th>
	    <th>Unit Price</th>
	    <th>Total</th>
	 </thead>
	 <tbody>
	<?php
     $q = "select voucher,invoice_temporary.quantity,price,totalprice,fruit from invoice_temporary,fruits  where 
	       fruits.id=invoice_temporary.fruit_id and voucher='".$_GET['voucher']."'";
	 $dmc = $db->query($q);
	 $i = 1;
	 $totalquanity = 0;
	 $totalamount = 0;
	 while($rows = $dmc->fetch_array()){

	?>
								<tr>
	 <td><?php echo $i++; ?></td>
	 <td><?php echo $rows['fruit']; ?></td>
	 <td><?php echo $rows['quantity']; 
	       $totalquanity +=$rows['quantity'];
	 ?></td>
	 <td><?php echo $rows['price']; ?></td>
	 <td><?php echo $rows['totalprice']; 
	     $totalamount +=$rows['totalprice'];
	 ?></td>
	</tr>
	
	 <?php }  ?>
	 </tbody>
	 <tfoot>
	 <tr>
	   <td></td>
	   <td colspan="2" align="center">Total Quanity : 
	     <?php echo $totalquanity; ?></td>
	   <td colspan="2" align="right">Total Amount : 
       <?php echo $totalamount; ?></td>
	 </tr>
									 
	 </tfoot>
  </table>
  <br>
  <small>Stamp/Signature.................</small>
  
  </div>
  </div>
  </div>







<!-- Script to Activate the Carousel -->
<a href="home.php" id="back" class="btn btn-success">Back</a>





</body>
</html>
