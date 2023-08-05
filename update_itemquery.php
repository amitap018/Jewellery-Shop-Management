<?php
	require_once 'connection.php';
	
	if(ISSET($_POST['update'])){
		$user_id = $_POST['user_id'];
		$itemname = $_POST['itemname'];
		$category = $_POST['category'];
		$weight = $_POST['weight'];
		$quantity = $_POST['quantity'];
      
		mysqli_query($conn, "UPDATE `item` SET `itemname` = '$itemname', `category` = '$category', `weight` = '$weight', `quantity` = '$quantity' WHERE `user_id` = '$user_id'") or die(mysqli_error());

		header("location: itemInfo.php");
	}
?>