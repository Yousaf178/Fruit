<?php  include_once('include/connection.php'); 


if(empty($_SESSION['id'])){
	
	header('Location:index.php');
}

if(isset($_GET['id'])){
	
	$newqutity = $_GET['qu'];
	
    $sel = "select * from fruits where id='".$_GET['id']."'";
	$cmd = $db->query($sel);
	$rows = $cmd->fetch_array();
	
	
   $quantity = $rows['quantity'];
   
   if($quantity > $newqutity){
	   
	  // echo "<p>Available</p>";
	   
   }
   else{
	   
	   echo "Sorry your order is out of range";
   }
	
	
	
	
}


?>