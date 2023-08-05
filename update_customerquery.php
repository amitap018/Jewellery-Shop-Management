<?php
	require_once 'connection.php';
	
	if(ISSET($_POST['update'])){
		$user_id = $_POST['user_id'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		
		mysqli_query($conn, "UPDATE `customer` SET `name` = '$name', `phone` = '$phone', `address` = '$address', `email` = '$email' WHERE `user_id` = '$user_id'") or die(mysqli_error());

		header("location: customerInfo.php");
	}
?>