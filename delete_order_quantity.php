<?php
  session_start();

$db = new mysqli("localhost","root","","swat_fruit");
$id = $_GET['id'];

$sql = "DELETE FROM online_order WHERE id='".$_GET['id']."'";
$dabc = $db->query($sql);
					  // echo $dabc;exit();
					header('Location:onlineorder.php'); 
?>