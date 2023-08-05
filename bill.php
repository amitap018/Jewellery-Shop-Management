<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Jewellery Shop Invoice</title>
  <link rel="stylesheet" type="text/css" href="invoice.css">
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .invoice {
      max-width: 1000px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
    }

    .invoice .header {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .invoice .header .shop-name {
      font-size: 30px;
      font-weight: bold;
      color: gold;
    }

    .invoice .header .logo {
      max-height: 50px;
    }

    .invoice .info {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .invoice .info .customer-info {
      width: 50%;
    }

    .invoice .info .invoice-info {
      width: 50%;
      text-align: right;
    }

    .invoice .info .info-label {
      font-weight: bold;
    }

    .invoice .table {
      width: 100%;
      border-collapse: collapse;
    }

    .invoice .table th,
    .invoice .table td {
      padding: 10px;
      border: 1px solid #ccc;
      font-size: 10px;
    }

    .invoice .table th {
      background-color: #f0f0f0;
    }

    .invoice .total {
      margin-top: 20px;
      text-align: right;
    }

    .invoice .total .total-label {
      /* font-weight: bold;*/
    }
  </style>

  
</head>

<body>


  <div class="invoice">
    <div class="header">
      <div class="shop-name">Jewellery Shop</div>
    </div>
    <div class="info">
      <div class="customer-info">
        <div class="info-label">Customer:</div>


        <?php
        //session_start();
        include('connection.php');
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

        //    $master_id = $_POST['buttonId'];
        //$master_id = 9;
        $cust_id = 0;
        // $master_id = $fetch['master_id'];
        $master_id= $_POST['buttonId'];
        
        $query = "SELECT cust_id FROM sell_master where master_id='$master_id'";
        $result1 = mysqli_query($conn, $query);
        while ($res = mysqli_fetch_assoc($result1)) {
          $cust_id = $res['cust_id'];
        }
        $query2 = "SELECT * FROM customer where user_id='$cust_id'";

        $result = mysqli_query($conn, $query2);
        while ($row = mysqli_fetch_assoc($result)) {

          echo "<tr>";
          echo "<td>" . $row['name'] . "</td>";
          echo "</tr>";
          echo "<br>";
          echo "<tr>";
          echo "<td>" . $row['address'] . "</td>";
          echo "</tr>";
          echo "<br>";
          echo "<tr>";
          echo "<td>" . $row['phone'] . "</td>";
          echo "</tr>";
          echo "<br>";
          echo "<tr>";
          echo "<td>" . $row['email'] . "</td>";
          echo "</tr>";

        }

        ?>
      </div>
      <div class="invoice-info">
        <div class="info-label">Invoice:</div>
        Invoice #: 001<br>
        <p>
         Date:  <script> document.write(new Date().toLocaleDateString()); </script>
        </p>
      </div>
    </div>
    <div class="table" id="update_modal<?php echo $fetch['master_id'] ?>">
      <!-- Rest of the HTML code -->



      <table class="table" id="bill">
        <thead>
          <tr>
            <th>Item Name</th>
            <th>Category</th>
            <th>Rate</th>
            <th>Quantity</th>
            <th>Gross Weight</th>
            <th>Less Weight</th>
            <th>Net Weight</th>
            <th>Purity</th>
            <th>Pure Weight</th>
            <th>Making Charges</th>
            <th>Amount</th>
            <th>CGST</th>
            <th>SGST</th>
            <th>Total Amount</th>
            <th>HSN No.</th>
            <th>HUID No.</th>
          </tr>
        </thead>
        <tbody>



          <?php

          //session_start();
          include('connection.php');
          error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

          if (isset($_POST['buttonId'])) {
            $master_id = $_POST['buttonId'];

            //    $master_id = $_POST['buttonId'];
            // $master_id = 9;
            // $master_id = $fetch['master_id'];
          
            $query = "SELECT * FROM sell_details where master_id='$master_id'";

            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {

              echo "<tr>";
              //  echo "<td>" . $row['master_id'] . "</td>";
          
              echo "<td>" . $row['item_name'] . "</td>";

              echo "<td>" . $row['category'] . "</td>";

              echo "<td>" . $row['rate'] . "</td>";

              echo "<td>" . $row['quantity'] . "</td>";
              echo "<td>" . $row['gross_wt'] . "</td>";
              echo "<td>" . $row['less_wt'] . "</td>";
              echo "<td>" . $row['net_wt'] . "</td>";
              echo "<td>" . $row['purity'] . "</td>";
              echo "<td>" . $row['pure_wt'] . "</td>";
              echo "<td>" . $row['making_charges'] . "</td>";
              echo "<td>" . $row['amount'] . "</td>";
              echo "<td>" . $row['cgst'] . "</td>";
              echo "<td>" . $row['sgst'] . "</td>";
              echo "<td>" . $row['total_amount'] . "</td>";
              echo "<td>" . $row['hsn'] . "</td>";
              echo "<td>" . $row['huid'] . "</td>";

            }
          }
          ?>
        </tbody>
      </table>

      <br>

      <br>



      <table class="table" id="invoice-table">
        <thead>
          <tr>
            <th>Amount</th>
            <th>Total GST</th>
            <th>Payable Amount</th>
            <th>Payed By Cash</th>
            <th>Payed By QR</th>
            <th>Payed By Cheque</th>
            <th>Payed Amount</th>
            <th>Balance</th>
          </tr>
        </thead>
        <tbody>



          <?php

          //  session_start();
          include('connection.php');
          error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);



          //    $master_id = $_POST['buttonId'];
          $master_id = 5;

          $query = "SELECT * FROM sell_master where master_id='$master_id'";

          $result = mysqli_query($conn, $query);
          while ($row = mysqli_fetch_assoc($result)) {

            echo "<tr>";
            //  echo "<td>" . $row['master_id'] . "</td>";
          
            echo "<td>" . $row['amount'] . "</td>";

            echo "<td>" . $row['total_gst'] . "</td>";

            echo "<td>" . $row['payable_amount'] . "</td>";

            echo "<td>" . $row['payed_cash'] . "</td>";
            echo "<td>" . $row['payed_qr'] . "</td>";
            echo "<td>" . $row['payed_ch'] . "</td>";
            echo "<td>" . $row['amount_payed'] . "</td>";
            echo "<td>" . $row['balance'] . "</td>";

          }

          ?>
        </tbody>
      </table>
      <button onclick="printInvoice()">Print</button>
      <script src="invoice.js"></script>
      <script>
        var dt = new Date();
        document.getElementById('date-time').innerHTML = dt;
      </script>
</body>