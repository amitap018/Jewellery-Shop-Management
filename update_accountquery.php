<?php
	require_once 'connection.php';
	
	if(ISSET($_POST['update'])){
		$user_id = $_POST['user_id'];
		$type = $_POST['type'];
		$name = $_POST['name'];

        if($_POST['type']=='Income'){
			$ans=autoincIncome();
			$sql = "INSERT INTO account(type, id, name) VALUES('" . $_POST['type'] . "', '" . $ans . "', '" . $_POST['name'] . "')";
		   
			$conn->query($sql);
			mysqli_close($conn);
			header("location: accountInfo.php");
			} 
		   // if($_GET["expense"]=="Expense")
		   else{
			$ans2=autoincExpense();
			$sql = "INSERT INTO account(type, id, name) VALUES('" . $_POST['type'] . "', '" . $ans2 . "', '" . $_POST['name'] . "')";
		   
			$conn->query($sql);
			mysqli_close($conn);
			header("location: accountInfo.php");
		}
	}
		function autoincIncome()
		{
			include('connection.php');
			global $value2;
			$query = "SELECT id from account where type='Income' order by id desc LIMIT 1";
			$stmt = mysqli_query($conn, $query);
		  //  $stmt->execute();
			$rowcount=mysqli_num_rows($stmt);
	
			if ($rowcount > 0) {
			  //  $result = $stmt->get_result();
				$row = mysqli_fetch_assoc($stmt);
				$value2 = $row['id'];
			   // $value2 = substr($value2, 3, 5);
				$value2 = (int) $value2 + 1;
			 //   $value2 = 100 . sprintf('%04d', $value2);
				$value = $value2;
				return $value;
			} else {
				$value2 = 201001;
				$value = $value2;
				return $value;
			}
		}
		function autoincExpense()
		{
			include('connection.php');
			global $value2;
			$query = "SELECT id from account where type='Expense' order by id desc LIMIT 1";
			$stmt = mysqli_query($conn, $query);
		  //  $stmt->execute();
			$rowcount=mysqli_num_rows($stmt);
	
			if ($rowcount > 0) {
			  //  $result = $stmt->get_result();
				$row = mysqli_fetch_assoc($stmt);
				$value2 = $row['id'];
			   // $value2 = substr($value2, 3, 5);
				$value2 = (int) $value2 + 1;
			 //   $value2 = 100 . sprintf('%04d', $value2);
				$value = $value2;
				return $value;
			} else {
				$value2 = 101001;
				$value = $value2;
				return $value;
			}
		
		mysqli_query($conn, "UPDATE `account` SET `type` = '$type', `id` = '$id', `name` = '$name' WHERE `user_id` = '$user_id'") or die(mysqli_error());

		header("location: accountInfo.php");
	}
?>