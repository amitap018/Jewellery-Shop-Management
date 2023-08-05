<?php
	require_once 'connection.php';
	
	if(ISSET($_POST['update'])){
		$user_id = $_POST['user_id'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$email = $_POST['email'];
        $type = $_POST['type'];
        $gst = $_POST['gst'];
		
		mysqli_query($conn, "UPDATE `supplieruser` SET `name` = '$name', `phone` = '$phone', `address` = '$address', `email` = '$email', `type` = '$type', `gst` = '$gst' WHERE `user_id` = '$user_id'") or die(mysqli_error());

		header("location: supplierInfo.php");
	}
?>