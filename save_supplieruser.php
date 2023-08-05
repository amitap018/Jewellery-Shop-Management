<?php
	require_once 'connection.php';
	
	if(ISSET($_POST['save'])){
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$email = $_POST['email'];
        $type = $_POST['type'];
        $gst = $_POST['gst'];
		
		mysqli_query($conn, "INSERT INTO `supplieruser` VALUES('', '$name', '$phone', '$address', '$email', '$type', '$gst')") or die(mysqli_error());
		
		header("location: supplierInfo.php");
	}
?>