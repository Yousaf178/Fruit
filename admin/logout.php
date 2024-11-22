<?php
session_start();

if(isset($_SESSION['id'])){
	
	session_destroy();
	//header('Location:index.php');
	echo '<script>window.location="index.php";</script>';
}
?>