<?php
	require_once 'connection.php';
	
	if(ISSET($_POST['update'])){
		$date = $_POST['date'];
		$silver_rate = $_POST['silver_rate'];
		$gold_rate = $_POST['gold_rate'];
		
		
		mysqli_query($conn, "UPDATE `datewiserate` SET `date` = '$date', `silver_rate` = '$silver_rate', `gold_rate` = '$gold_rate'") or die(mysqli_error());

		header("location: datewiserate.php");
	}
?>