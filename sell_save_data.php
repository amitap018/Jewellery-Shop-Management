
<?php
include('connection.php');
include('sellForm.php');
session_start();

$last_id = $_SESSION['last_id'];
$last_id=$last_id + 1;

if (isset($_POST['item_names']) && isset($_POST['categorys']) && isset($_POST['rates']) && isset($_POST['quantitys']) && isset($_POST['gross_wts']) && isset($_POST['less_wts']) && isset($_POST['net_wts']) && isset($_POST['puritys']) && isset($_POST['pure_wts']) && isset($_POST['making_charge']) && isset($_POST['amounts']) && isset($_POST['cgsts']) && isset($_POST['sgsts']) && isset($_POST['total_amounts']) && isset($_POST['hsn_nos']) && isset($_POST['huid_nos']) ) {
    $item_names = $_POST['item_names'];
    $categorys = $_POST['categorys'];
    $rates = $_POST['rates'];
    $quantitys = $_POST['quantitys'];
    $gross_wts = $_POST['gross_wts'];
    $less_wts = $_POST['less_wts'];
    $net_wts = $_POST['net_wts'];
    $puritys = $_POST['puritys'];
    $puer_wts = $_POST['pure_wts'];
    $making_charge = $_POST['making_charge'];
    $amounts = $_POST['amounts'];
    $cgsts = $_POST['cgsts'];
    $sgsts = $_POST['sgsts'];
    $total_amounts = $_POST['total_amounts'];
    $hsn_nos = $_POST['hsn_nos'];
    $huid_nos = $_POST['huid_nos'];


 
    for ($i = (count($item_names)-1); $i < count($item_names); $i++) {
        $item_name = mysqli_real_escape_string($conn, $item_names[$i]);
        $category = mysqli_real_escape_string($conn, $categorys[$i]);
        $rate = mysqli_real_escape_string($conn, $rates[$i]);
        $quantity = mysqli_real_escape_string($conn, $quantitys[$i]);
        $gross_wt = mysqli_real_escape_string($conn, $gross_wts[$i]);
        $less_wt = mysqli_real_escape_string($conn, $less_wts[$i]);
        $net_wt = mysqli_real_escape_string($conn, $net_wts[$i]);
        $purity = mysqli_real_escape_string($conn, $puritys[$i]);
        $pure_wt = mysqli_real_escape_string($conn, $puer_wts[$i]);
        $making_charges = mysqli_real_escape_string($conn, $making_charge[$i]);
        $amount = mysqli_real_escape_string($conn, $amounts[$i]);
        $cgst = mysqli_real_escape_string($conn, $cgsts[$i]);
        $sgst = mysqli_real_escape_string($conn, $sgsts[$i]);
        $total_amount = mysqli_real_escape_string($conn, $total_amounts[$i]);
        $hsn = mysqli_real_escape_string($conn, $hsn_nos[$i]);
        $huid = mysqli_real_escape_string($conn, $huid_nos[$i]);

        $query = "SELECT user_id from item where itemname='$item_name'";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($result)) {
            $item_id = $row['user_id'];
        }


        $sql2 = "INSERT INTO sell_details (master_id,item_id,item_name, category, rate, quantity, gross_wt, less_wt, net_wt, purity, pure_wt, making_charges, amount, cgst,sgst,total_amount, hsn,huid) values('$last_id','$item_id','$item_name','$category','$rate','$quantity','$gross_wt','$less_wt','$net_wt','$purity','$pure_wt','$making_charges','$amount','$cgst','$sgst','$total_amount','$hsn','$huid')";
        $conn->query($sql2);
   
      
    }
    mysqli_close($conn);
}


?>