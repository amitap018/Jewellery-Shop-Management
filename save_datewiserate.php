<?php
	require_once 'connection.php';
	
	if(ISSET($_POST['save'])){
		$date = $_POST['date'];
		$silver_date = $_POST['silver_rate'];
		$gold_rate = $_POST['gold_rate'];
		
		
		mysqli_query($conn, "INSERT INTO `datewiserate` VALUES('', '$date', '$silver_date', '$gold_rate')") or die(mysqli_error());
		
		header("location: datewiserate.php");
	}
?>