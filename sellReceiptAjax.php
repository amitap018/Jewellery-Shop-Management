<?php
session_start();
include('connection.php');
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

if (isset($_POST['cust_name'])) {
    $name = $_POST['cust_name'];

    $cust_id = array();
 //   $total_nav=array();
   // $amount_payed=array();
  //  $balance=array();
    $query = "SELECT user_id FROM customer where  name='$name'";
    $result1 = mysqli_query($conn, $query);

    if (mysqli_num_rows($result1) > 0) {
        while ($row = mysqli_fetch_assoc($result1)) {
            $cust_id = $row["user_id"];
        }


        $query2 = "SELECT payable_amount, amount_payed, balance FROM sell_master where  cust_id='$cust_id' order by master_id desc LIMIT 1";
        $result2 = mysqli_query($conn, $query2);
        if (mysqli_num_rows($result2) > 0) {
            while ($row = mysqli_fetch_assoc($result2)) {
                $total_nav = $row["payable_amount"];
                $amount_payed = $row["amount_payed"];
                $balance = $row["balance"];
            }
        }
    }


    $ans2 = array($cust_id, $total_nav, $amount_payed, $balance);
    echo json_encode($ans2, JSON_FORCE_OBJECT);

}
?>