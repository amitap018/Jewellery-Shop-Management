<?php
	require_once 'connection.php';
	
	if(ISSET($_POST['save'])){
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		
		mysqli_query($conn, "INSERT INTO `customer` VALUES('', '$name', '$phone', '$address', '$email')") or die(mysqli_error());
		
		header("location: customerInfo.php");
	}
?>