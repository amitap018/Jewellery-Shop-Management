<?php
	require_once 'connection.php';
	
	if(ISSET($_POST['save'])){
		$itemname = $_POST['itemname'];
		$category = $_POST['category'];
		$weight = $_POST['weight'];
		$quantity = $_POST['quantity'];
		
		mysqli_query($conn, "INSERT INTO `item` VALUES('', '$itemname', '$category', '$weight', '$quantity')") or die(mysqli_error());
		
		header("location: itemInfo.php");
	}
?>