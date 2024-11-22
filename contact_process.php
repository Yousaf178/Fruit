<?php
include('includes/conn.php');


if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mnumber=$_POST['mnumber'];
	$message=$_POST['message'];
	$insert = "insert into contact (`name`,`email`,`mnumber`,`message`)	values  ('$name','$email','$mnumber','$message')";
						
$cmd  = $db->query($insert);
  if($cmd){
	  
	  $insert = "insert into contact()";
	   echo '<script>window.location="contacts.php";alert("Record save successfull");</script>';
	//header('location:contact_process.php');
	

	
}
}

?>