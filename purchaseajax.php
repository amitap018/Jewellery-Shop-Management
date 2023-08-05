<?php
session_start();
include('connection.php');
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

if (isset($_POST['item_name'])) {
   $name = $_POST['item_name'];

   $users_arr = array();
   $query = "SELECT * FROM `item` where  itemname='$name'";
   $result1 = mysqli_query($conn, $query);

   if (mysqli_num_rows($result1) > 0) {

      while ($res = mysqli_fetch_assoc($result1)) {
         $category = $res['category'];
         if ($category == "Gold") {
            $users_arr = 111;
         } else if ($category == "Silver") {
            $users_arr = 222;
         }
         //echo "<script>alert('HI $users_arr');</script>";

      }

      if ($users_arr == 111) {
         $query2 = mysqli_query($conn, "SELECT gold_rate FROM datewiserate order by date desc LIMIT 1");
         $row = mysqli_fetch_array($query2);
         $rate = $row["gold_rate"];
      } else {
         $query2 = mysqli_query($conn, "SELECT silver_rate FROM datewiserate order by date desc LIMIT 1");
         $row = mysqli_fetch_array($query2);
         $rate = $row["silver_rate"];
      }
   }
   $ans = array($users_arr, $rate);
   #echo json_encode($users_arr,$rate);
   echo json_encode($ans, JSON_FORCE_OBJECT);

}
?>