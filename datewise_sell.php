<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datewise Sell</title>
    <link rel="stylesheet" href="formstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        input[type=text],
        input[type=number],
        input[type=email] {

            border-radius: 5px;
            padding: 10px 18px;
            box-sizing: border-box;
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 60%;
            margin-left: auto;
            margin-right: auto;
            margin-top: auto;
            margin-bottom: auto;

        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #D2AC47;
            color: rgb(255, 255, 255);
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js">
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript">
    </script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>

</head>

<body>
 <!-- 
    <table class="table table-bordered">
        <thead class="alert-success">
            <tr>
                <th>Master</th>
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
            require 'connection.php';
            $query = mysqli_query($conn, "SELECT * FROM sell_master");
            while ($fetch = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td>
                        <?php echo $fetch['master_id'] ?>
                    </td>
                    <td>
                        <?php echo $fetch['amount'] ?>
                    </td>
                    <td>
                        <?php echo $fetch['total_gst'] ?>
                    </td>
                    <td>
                        <?php echo $fetch['payable_amount'] ?>
                    </td>
                    <td>
                        <?php echo $fetch['payed_cash'] ?>
                    </td>
                    <td>
                        <?php echo $fetch['payed_qr'] ?>
                    </td>
                    <td>
                        <?php echo $fetch['payed_ch'] ?>
                    </td>
                    <td>
                        <?php echo $fetch['amount_payed'] ?>
                    </td>
                    <td>
                        <?php echo $fetch['balance'] ?>
                    </td>
                    <td><button class="btn btn-warning" data-toggle="modal" class="myButton" type="button" onclick="bill()"
                            id="<?php echo $fetch['master_id'] ?>"><span
                                class="glyphicon glyphicon-edit"></span> Show</button></td>
                </tr>
                <?php
  //header("location: datewise_sell.php");
               // include 'bill.php';
            
            }
            ?>
        </tbody>
    </table>
-->
   
            
    <?php
   // $master_idd = 0;
    include('connection.php');
    //include('userMenu.php'); 
    

    $query = "SELECT * FROM sell_master";

    $result = mysqli_query($conn, $query);
    echo "<table border='1' id='customers'>

<tr>
<th>Master ID</th>
<th>Amount</th>

<th>Total GST</th>

<th>Payable Amount</th>

<th>Payed By Cash</th>

<th>Payed By QR</th>

<th>Payed By Cheque</th>

<th>Amount Payed</th>

<th>Balance</th>

</tr>";
    while ($row = mysqli_fetch_assoc($result)) {


        echo "<tr>";
        echo "<td>" . $row['master_id'] . "</td>";

        $master_id = $row['master_id'];
        echo "<td>" . $row['amount'] . "</td>";

        echo "<td>" . $row['total_gst'] . "</td>";

        echo "<td>" . $row['payable_amount'] . "</td>";

        echo "<td>" . $row['payed_cash'] . "</td>";
        echo "<td>" . $row['payed_qr'] . "</td>";
        echo "<td>" . $row['payed_ch'] . "</td>";
        echo "<td>" . $row['amount_payed'] . "</td>";
        echo "<td>" . $row['balance'] . "</td>";

        echo '<td><button class="myButton" onClick="bill()"  id="' . $master_id . '">Show</button></td>';
        

        echo "</tr>";

    }
    ?>





<script>
//var buttonId=3;
/*
var table = document.getElementById("customers");

table.addEventListener("click", function(event) {
  var target = event.target;

  if (target.classList.contains("myButton")) {
    var  buttonId = target.id;
    console.log("Button clicked: " + buttonId);
    $.ajax({
            url: 'bill.php',
            type: 'post',
            data: {
                buttonId: buttonId
            },
            success: function (response) {

                console.log("Hollo World");
            }
        });


        window.location.href = "bill.php";
  }
})

   // var buttons = document.getElementsByTagName("button");

    // Iterate over the buttons and attach event listeners
  //  for (var i = 0; i < buttons.length; i++) {
  //      buttons[i].addEventListener("click", bill);
  //  }
   */

  var buttons = document.getElementsByClassName("myButton");

  for (var i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener("click", function() {
      var buttonId = this.id;
      
      // Send buttonId to another PHP file using AJAX
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "bill.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          // Handle the response from the PHP file
          var response = xhr.responseText;
          console.log(response);
        }
      };
      xhr.send("buttonId=" + encodeURIComponent(buttonId));
    });
  }



function bill() {
   window.location.href = "bill.php";
       
    }

</script>



</body>

</html>