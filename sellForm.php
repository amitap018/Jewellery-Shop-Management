<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>JEWELERS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        select {
            border: solid 1px black;
            font-size: 12px;
            border-radius: 5px;
        }

        .newDiv {
            margin-top: 20px;
            margin-left: 20px;
            background-color: white;
            width: 760px;
            min-height: 150px;
        }

        select:focus {
            outline: none;
        }

        input {
            width: 100px;
            height: 20px;

        }

        .myTD td {
            padding: 0 15px;
        }

        .myTD2 td {
            padding: 0 50px;
        }

        .newDivTD td {
            padding: 0 3px;
        }

        #myTable {
            margin-top: 20px;
            margin-left: 15px;
            font-size: 15px;
        }

        #myTable1 {
            margin-top: 20px;
            margin-left: 15px;

        }

        label {
            font-size: 12px;
        }

        .myDiv {
            margin: auto;
            border: 2px solid black;
            width: fit-content;
            padding: 10px;
            background-color: #3424;
            border-radius: 10px;
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

    <?php
    include('connection.php');
    //include('mainmenu.php')
    //session_start();

    error_reporting(E_ALL ^ E_WARNING);

    if (isset($_POST['submitData'])) {

        $type1 = 0;
        $narrator1 = "Payable Amount";

        $type2 = 1;
        $narrator2 = "Paid Amount";

        $cust_name = $_COOKIE['custName'];
        $query = "SELECT user_id from customer where name='$cust_name'";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($result)) {
            $cust_id = $row['user_id'];
        }

        $sql = "INSERT INTO sell_master(cust_id,date,amount, total_gst, payable_amount, payed_cash,payed_qr,payed_ch,amount_payed,balance) VALUES('$cust_id','" . $_POST['date'] . "','" . $_POST['amount2'] . "', '" . $_POST['total_gst'] . "', '" . $_POST['payable_amount'] . "', '" . $_POST['payed_cash'] . "', '" . $_POST['payed_qr'] . "', '" . $_POST['payed_ch'] . "', '" . $_POST['amount_payed'] . "', '" . $_POST['balance'] . "')";
        $conn->query($sql);

        $sql3 = "INSERT INTO sell_recid(date,amt,cust_id,type,Narrator,Status) VALUES('" . $_POST['date'] . "', '" . $_POST['payable_amount'] . "','$cust_id', '$type1', '$narrator1','')";
        $conn->query($sql3);

        $sql4 = "INSERT INTO sell_recid(date,amt,cust_id,type,Narrator,Status) VALUES('" . $_POST['date'] . "', '" . $_POST['amount_payed'] . "','$cust_id', '$type2', '$narrator2','')";
        $conn->query($sql4);

        $sql5= "INSERT INTO voucher(date,amt,acc_id,type,Narrator,Status) VALUES('" . $_POST['date'] . "', '" . $_POST['amount_payed'] . "','$cust_id', '$type2', '$narrator2','')";
        $conn->query($sql5);


        $sql2 = "SELECT master_id FROM sell_master ORDER BY master_id DESC LIMIT 1";
        $result = mysqli_query($conn, $sql2);
        while ($row = mysqli_fetch_assoc($result)) {
            $myID = $row['master_id'];

        }

        $_SESSION['last_id'] = $myID;
        header("location: sellForm.php");
       // mysqli_close($conn);
        
    }


    ?>

<div class="left-sidebar-pro">
            <nav id="sidebar" class="">
                <div class="sidebar-header">
                    <a href="accountInfo.php"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    <strong><img src="img/logo/logosn.png" alt="" /></strong>
                </div>
                <div class="left-custom-menu-adp-wrap comment-scrollbar">
                    <nav class="sidebar-nav left-sidebar-menu-pro">
                        <ul class="metismenu" id="menu1">
                            <li class="active">
                                <a class="has-arrow" href="accountInfo.php">
                                       <i class="fa big-icon fa-home icon-wrap"></i>
                                       <span class="mini-click-non">Masters</span>
                                    </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <li><a title="Dashboard v.3" href="accountInfo.php"><i class="fa fa-cube sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Account Info</span></a></li>
                                    <li><a title="Product List" href="customerInfo.php"><i class="fa fa-female sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Customer Info</span></a></li>
                                    <li><a title="Product Edit" href="supplierInfo.php"><i class="fa fa-bolt sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Supplier Info</span></a></li>
                                    <li><a title="Product Detail" href="itemInfo.php"><i class="fa fa-heart-o sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Item Info</span></a></li>
                                    <li><a title="Product Cart" href="datewiserate.php"><i class="fa fa-level-down sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Date Wise Rate</span></a></li>
                                
                                </ul>
                            </li>
                            <li>
                              <a class="has-arrow" href="accountInfo.php">
                                     <i class="fa big-icon fa-circle-o icon-wrap"></i>
                                     <span class="mini-click-non">Transaction</span>
                                  </a>
                              <ul class="submenu-angle" aria-expanded="true">
                                  <li><a title="Dashboard v.3" href="purchaseForm.php"><i class="fa fa-square-o sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Purchase Form</span></a></li>
                                  <li><a title="Product List" href="sellForm.php"><i class="fa fa-male sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Sell Form</span></a></li>
                                  
                              </ul>
                          </li>
                          <li>
                            <a class="has-arrow" href="accountInfo.php">
                                   <i class="fa big-icon fa-square icon-wrap"></i>
                                   <span class="mini-click-non">Vouchers</span>
                                </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard v.3" href="purchaseReceipt.php"><i class="fa fa-lock sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Purchase Resid</span></a></li>
                                <li><a title="Product List" href="sellReceipt.php"><i class="fa fa-unlock sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Sell Resid</span></a></li>
                                
                            </ul>
                        </li>
                        <li>
                          <a class="has-arrow" href="accountInfo.php">
                                 <i class="fa big-icon fa-book icon-wrap"></i>
                                 <span class="mini-click-non">Reports</span>
                              </a>
                          <ul class="submenu-angle" aria-expanded="true">
                          <li><a title="Dashboard v.3" href="supplierList.php"><i class="fa fa-user sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Supplier List</span></a></li>
                              <li><a title="Product List" href="customerList.php"><i class="fa fa-money sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Customer List</span></a></li>
                              <li><a title="Dashboard v.3" href="accountList.php"><i class="fa fa-cube sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Account List</span></a></li>
                              <li><a title="Product List" href="itemList.php"><i class="fa fa-female sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Item List</span></a></li>
                              <li><a title="Product Edit" href="datewisePurchase.php"><i class="fa fa-bolt sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Datewise Purchase</span></a></li>
                              <li><a title="Product Detail" href="datewiseSell.php"><i class="fa fa-heart-o sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Datewise Sell</span></a></li>
                              <li><a title="Product Cart" href="supplierDue.php"><i class="fa fa-level-down sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Supplier Due</span></a></li>
                              <li><a title="Product List" href="customerDue.php"><i class="fa fa-unlock sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Customer Due</span></a></li>
                          </ul>
                      </li>
                        </ul>
                    </nav>
                </div>
            </nav>
        </div>
        <!-- Start Welcome area -->
        <div class="all-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="logo-pro">
                            <a href="accountInfo.php"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-advance-area">
                <div class="header-top-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="header-top-wraper">
                                    <div class="row">
                                        <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                            <div class="menu-switcher-pro">
                                                <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                        <i class="fa fa-bars"></i>
                                                    </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                            <div class="header-top-menu tabl-d-n">
                                                <ul class="nav navbar-nav mai-top-nav">
                                                    <li class="nav-item"><a href="home.php" class="nav-link" style="font-size: 17px;"><strong> Home </strong></a>
                                                    </li>
                                                    <!--<li class="nav-item"><a href="about.php" class="nav-link" style="font-size: 17px;"><strong> About </strong></a>
                                                    </li>-->
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                            <div class="header-right-info">
                                                <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                   
                                                    <li class="nav-item">
                                                      
                                                            <li><a href="register.html"><span class="fa fa-lock author-log-ic">Log Out</span></a>
                                                            </li>
                                                          
                                                        
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu start -->
                <div class="mobile-menu-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="mobile-menu">
                                    <nav id="dropdown">
                                        <ul class="mobile-menu-nav">
                                            <li><a data-toggle="collapse" data-target="#Charts" href="home.php">Home <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                                <ul class="collapse dropdown-header-top">
                                                    
                                                    <li><a href="accountInfo.php">Account Info</a></li>
                                                    <li><a href="customerInfo.php">Customer Info</a></li>
                                                    <li><a href="supplierInfo.php">Supplier Info</a></li>
                                                    <li><a href="itemInfo.php">Item Info</a></li>
                                                    <li><a href="date_wise_rate.php">Date Wise Rate</a></li>
                                        
                                                </ul>
                                            </li>
                                     
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu end -->
                <div class="breadcome-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="breadcome-list single-page-breadcome">
                                    <div class="row" style="margin-left: 190px;">
                                        
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <ul class="breadcome-menu">
                                                
                                                <li><span class="bread-blod" style="font-size: 25px;"><strong> Sell Form </strong></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    <div class="myDiv">
        <form method="post" name="sample">
            <table class="myTD">

                <tr>
                    <td><span>
                            <label for="table">Item Name: </label>
                            <br>
                            <select name="item_name" id="item_name" required>
                                <option value="0">Please Select</option>
                                <?php
                                $query = "SELECT itemname FROM item";
                                $result = $conn->query($query);
                                while ($row = mysqli_fetch_array($result)) {
                                    $item_name = $row["itemname"];
                                    ?>
                                    <option value="<?php if (isset($item_name))
                                        echo $item_name; ?>"><?php if (isset($item_name))
                                              echo $item_name; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </span></td>

                    <td><span>
                            <label for="table">Category: </label>
                            <br>
                            <input type="text" name="category" id="category" required disabled>
                            <br>

                        </span></td>
                    <td><span>
                            <label for="table">Rate: </label>
                            <br>
                            <input type="text" name="rate" id="rate" required disabled>
                        </span></td>
                    <td><span>
                            <label for="table">Quantity: </label>
                            <br>
                            <input type="number" name="quantity" id="quantity" required>
                        </span></td>
                    <td><span>
                            <label for="table">Gross Weight: </label>
                            <br>
                            <input type="number" name="gross_wt" id="gross_wt" required>
                        </span></td>
                    <td><span>
                            <label for="table">Less Weight: </label>
                            <br>
                            <input type="number" name="less_wt" id="less_wt" required>
                        </span></td>
                </tr>

                <tr>
                    <td><span>
                            <label for="table">Net Weight: </label>
                            <br>
                            <input type="number" name="net_wt" id="net_wt" required disabled>
                        </span></td>
                    <td><span>
                            <label for="table">Purity: </label>
                            <br>
                            <input type="number" name="purity" id="purity" required>
                        </span></td>
                    <td><span>
                            <label for="table">Pure Weight: </label>
                            <br>
                            <input type="number" name="pure_wt" id="pure_wt" required disabled>
                        </span></td>
                    <td><span>
                            <label for="table">Making Charges: </label>
                            <br>
                            <input type="number" name="making_charges" id="making_charges" required>
                        </span></td>
                    <td><span>
                            <label for="table">Amount: </label>
                            <br>
                            <input type="number" name="amount" id="amount" required disabled>
                        </span></td>
                    <td><span>
                            <label for="table">CGST(%): </label>
                            <br>
                            <input type="number" name="cgst" id="cgst" required>
                        </span></td>

                </tr>
                <tr>
                    <td><span>
                            <label for="table">SGST(%): </label>
                            <br>
                            <input type="number" name="sgst" id="sgst" required>
                        </span></td>
                    <td><span>
                            <label for="table">Total Amount: </label>
                            <br>
                            <input type="number" name="total" id="total" required disabled>
                        </span></td>
                    <td><span>
                            <label for="table">HSN Code: </label>
                            <br>
                            <input type="text" name="hsn" id="hsn" required>
                        </span></td>
                    <td><span>
                            <label for="table">HUID Number: </label>
                            <br>
                            <input type="text" name="huid" id="huid" required>
                        </span></td>
                    <td><span>
                            <label for="table">Customer Name: </label>
                            <br>
                            <select name="cust_name" id="cust_name" required>
                                <option value="0">Please Select</option>
                                <?php
                                $query = "SELECT name FROM customer";
                                $result = $conn->query($query);
                                while ($row = mysqli_fetch_array($result)) {
                                    $cust_name = $row['name'];

                                    ?>
                                    <option value="<?php if (isset($cust_name))
                                        echo $cust_name; ?>"><?php if (isset($cust_name))
                                              echo $cust_name; ?></option>
                                    <?php
                                }
                                ?>
                            </select>

                        </span></td>
                    <td><span>
                            <label for="table">Date: </label>
                            <br>
                            <input type="date" name="date" id="date" required>
                        </span></td>

                </tr>
                <tr>
                    <td><span>
                            <br>
                        </span></td>
                    <td><span>
                            <br>
                        </span></td>
                    <td><span>
                            <br>
                        </span></td>
                    <td><span>
                            <br>
                        </span></td>
                    <td><span>
                            <br>

                            <button id="addName" name="addName" onclick="addData()"
                                style="width:70px; border-radius:5px; font-size: 15px">Add</button>
                        </span></td>
                    <td><span>
                            <br>
                            <button id="clear" onclick="clearTextArea()"
                                style="width:70px; border-radius:5px; font-size: 15px">Clear</button>
                        </span></td>

                </tr>
            </table>
        </form>
        <!--
        <div id="myTable1">
            <textarea class="textarea" name="textarea1" id="textarea1" cols="148" rows="15"
                style="font-size:10px; "></textarea>
        </div>
         -->
        <div class="newDiv">
            <form action="sellForm.php" method="POST">
                <table style=" font-size:8px; width: 100%;" id="tbl" class="newDivTD">
                    <thead>
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
                        <th>CGST(%)</th>
                        <th>SGST(%)</th>
                        <th>Total Amount</th>
                        <th>HSN No.</th>
                        <th>HUID No.</th>

                    </thead>

                    <tbody>

                    </tbody>
                </table>
            </form>
        </div>

        <div>
            <form method="post">
                <table class="myTD2">
                    <tr>
                        <td><span>
                                <label for="table">Amount: </label>
                                <br>
                                <input type="text" name="amount2" id="amount2">
                            </span></td>
                        <td><span>
                                <label for="table">Payed By Cash: </label>
                                <br>
                                <input type="text" name="payed_cash" id="payed_cash">
                            </span></td>
                        <td><span>
                                <label for="table">Amount Payed: </label>
                                <br>
                                <input type="text" name="amount_payed" id="amount_payed">
                            </span></td>


                    <tr>
                        <td><span>
                                <label for="table">Total GST Amount: </label>
                                <br>
                                <input type="text" name="total_gst" id="total_gst">
                            </span></td>
                        <td><span>
                                <label for="table">Payed By QR: </label>
                                <br>
                                <input type="text" name="payed_qr" id="payed_qr">
                            </span></td>
                        <td><span>

                                <label for="table">Balance Amount: </label>
                                <br>
                                <input type="text" name="balance" id="balance">

                            </span></td>
                        <td><span>
                                <br>
                                <button type="submit" style="width:70px; border-radius:5px; font-size: 15px"
                                    name="submitData" id="submitData">Submit</button>
                            </span></td>
                    </tr>

                    <tr>
                        <td><span>

                                <label for="table">Payable Amount: </label>
                                <br>
                                <input type="text" name="payable_amount" id="payable_amount">
                            </span></td>
                        <td><span>
                                <label for="table">Payed By Cheque: </label>
                                <br>
                                <input type="text" name="payed_ch" id="payed_ch">
                            </span></td>
                        <td><span>
                                <br>
                            </span></td>
                        <td><span>
                                <br>
                                <button type="button"
                                    style="width:70px; border-radius:5px; font-size: 15px">Exit</button>
                            </span></td>

                    </tr>

                </table>
            </form>
        </div>

    </div>


    <script type="text/javascript">
        var tot_amt = 0;
        var tot_gst = 0;
        var tot_payble = 0;
        var cust_name = "myCust";
        const item_names = [];
        const categorys = [];
        const rates = [];
        const quantitys = [];
        const gross_wts = [];
        const less_wts = [];
        const net_wts = [];
        const puritys = [];
        const pure_wts = [];
        const making_charge = [];
        const amounts = [];
        const cgsts = [];
        const sgsts = [];
        const total_amounts = [];
        const hsn_nos = [];
        const huid_nos = [];

        var count = 0;

        $(document).ready(function () {
            $('#item_name').on('change', function () {
                var item_name = this.value;

                $.ajax({
                    url: 'sellajax.php',
                    type: "POST",
                    data: {
                        item_name: item_name
                    },
                    success: function (response) {
                        var ans = $.parseJSON(response);
                        let a = ans[0];
                        let rate = ans[1];
                        if (a == "111") {
                            a = "Gold";
                        }
                        else if (a == "222") {
                            a = "Silver";
                        }
                        $('#category').val(a);
                        $('#rate').val(rate);
                    }
                });


            });

            $('#less_wt').on('change', function () {
                var less_wt = this.value;
                var gross_wt = document.getElementById("gross_wt").value;
                var net_wt = gross_wt - less_wt;
                $('#net_wt').val(net_wt);
            });
            $('#cust_name').on('change', function () {
                cust_name = this.value;
                document.cookie = "custName = " + cust_name;
            });
            $('#purity').on('change', function () {
                var purity = this.value;
                var net_wt = document.getElementById("net_wt").value;
                var pure_wt = (purity / 100) * net_wt;
                $('#pure_wt').val(pure_wt);
            });
            $('#making_charges').on('change', function () {
                var making_charges = document.getElementById("making_charges").value;
                var quantity = document.getElementById("quantity").value;
                var pure_wt = document.getElementById("pure_wt").value;
                var rate = document.getElementById("rate").value;
                var amount = (pure_wt * rate * quantity + parseFloat(making_charges));
                $('#amount').val(amount);
            });
            $('#sgst').on('change', function () {

                let sgst = document.getElementById("sgst").value;
                let cgst = document.getElementById("cgst").value;
                let amount = document.getElementById("amount").value;
                let total_amount = ((cgst / 100) * amount) + ((sgst / 100) * amount) + parseFloat(amount);
                $('#total').val(total_amount);
            });
            $('#payed_ch').on('change', function () {
                var cash = document.getElementById("payed_cash").value;
                var qr = document.getElementById("payed_qr").value;
                var ch = document.getElementById("payed_ch").value;
                var total_amount = document.getElementById("payable_amount").value;
                var amount_payed = parseFloat(cash) + parseFloat(qr) + parseFloat(ch);
                var balance_amount = parseFloat(total_amount) - parseFloat(amount_payed);
                $('#amount_payed').val(amount_payed);
                $('#balance').val(balance_amount);
            });

        });

        function addData() {
            document.cookie = "count = " + 1;
            var tr = document.createElement('tr');

            var td1 = tr.appendChild(document.createElement('td'));
            var td2 = tr.appendChild(document.createElement('td'));
            var td3 = tr.appendChild(document.createElement('td'));
            var td4 = tr.appendChild(document.createElement('td'));
            var td5 = tr.appendChild(document.createElement('td'));
            var td6 = tr.appendChild(document.createElement('td'));
            var td7 = tr.appendChild(document.createElement('td'));
            var td8 = tr.appendChild(document.createElement('td'));
            var td9 = tr.appendChild(document.createElement('td'));
            var td10 = tr.appendChild(document.createElement('td'));
            var td11 = tr.appendChild(document.createElement('td'));
            var td12 = tr.appendChild(document.createElement('td'));
            var td13 = tr.appendChild(document.createElement('td'));
            var td14 = tr.appendChild(document.createElement('td'));
            var td15 = tr.appendChild(document.createElement('td'));
            var td16 = tr.appendChild(document.createElement('td'));


            var item_name = document.getElementById("item_name").value;
            var category = document.getElementById("category").value;
            var rate = document.getElementById("rate").value;
            var quantity = document.getElementById("quantity").value;
            var gross_wt = document.getElementById("gross_wt").value;
            var less_wt = document.getElementById("less_wt").value;
            var net_wt = document.getElementById("net_wt").value;
            var purity = document.getElementById("purity").value;
            var pure_wt = document.getElementById("pure_wt").value;
            var making_charges = document.getElementById("making_charges").value;
            var amount = document.getElementById("amount").value;
            var cgst = document.getElementById("cgst").value;
            var sgst = document.getElementById("sgst").value;
            var total_amount = document.getElementById("total").value;
            var hsn = document.getElementById("hsn").value;
            var huid = document.getElementById("huid").value;

            <?php
            $cust_name = 'cust_name';
            ?>
            if (item_name == "") {
                alert("Item name is required");
            } else if (quantity == "") {
                alert("Quantity is required");
            } else if (gross_wt == "") {
                alert("Gross is required");
            } else if (less_wt == "") {
                alert("Less is required");
            } else if (purity == "") {
                alert("Purity is required");
            } else if (making_charges == "") {
                alert("Making  is required");
            } else if (cgst == "") {
                alert("CGST is required");
            } else if (sgst == "") {
                alert("SGST is required");
            } else if (hsn == "") {
                alert("HSN is required");
            } else if (huid == "") {
                alert("HUID is required");
            }
            else {

                td1.innerHTML = item_name;
                td2.innerHTML = category;
                td3.innerHTML = rate;
                td4.innerHTML = quantity;
                td5.innerHTML = gross_wt;
                td6.innerHTML = less_wt;
                td7.innerHTML = net_wt;
                td8.innerHTML = purity;
                td9.innerHTML = pure_wt;
                td10.innerHTML = making_charges;
                td11.innerHTML = amount;
                td12.innerHTML = cgst;
                td13.innerHTML = sgst;
                td14.innerHTML = total_amount;
                td15.innerHTML = hsn;
                td16.innerHTML = huid;

                document.getElementById("tbl").appendChild(tr);

                var am = document.getElementById('amount').value;
                tot_amt = parseInt(tot_amt) + parseInt(am);
                var cgst1 = document.getElementById("cgst").value;
                var sgst1 = document.getElementById("sgst").value;
                var total_amount1 = document.getElementById("total").value;
                tot_payble = parseFloat(tot_payble) + parseFloat(total_amount1);
                var total_gst1 = ((cgst1 / 100) * am) + ((sgst1 / 100) * am);
                tot_gst = parseFloat(tot_gst) + parseFloat(total_gst1);

                document.getElementById('amount2').value = tot_amt;
                document.getElementById('total_gst').value = tot_gst;
                document.getElementById('payable_amount').value = tot_payble;

                item_names.push(item_name);
                categorys.push(category);
                rates.push(rate);
                quantitys.push(quantity);
                gross_wts.push(gross_wt);
                less_wts.push(less_wt);
                net_wts.push(net_wt);
                puritys.push(purity);
                pure_wts.push(pure_wt);
                making_charge.push(making_charges);
                amounts.push(amount);
                cgsts.push(cgst);
                sgsts.push(sgst);
                total_amounts.push(total_amount);
                hsn_nos.push(hsn);
                huid_nos.push(huid);

                $.ajax({
                    url: 'sell_save_data.php',
                    type: 'post',
                    data: {
                        item_names: item_names,
                        categorys: categorys,
                        rates: rates,
                        quantitys: quantitys,
                        gross_wts: gross_wts,
                        less_wts: less_wts,
                        net_wts: net_wts,
                        puritys: puritys,
                        pure_wts: pure_wts,
                        making_charge: making_charge,
                        amounts: amounts,
                        cgsts: cgsts,
                        sgsts: sgsts,
                        total_amounts: total_amounts,
                        hsn_nos: hsn_nos,
                        huid_nos: huid_nos
                    },
                    success: function (response) {

                        console.log(item_names)
                    }
                });


                document.getElementById("item_name").value = "";
                document.getElementById("category").value = "";
                document.getElementById("rate").value = "";
                document.getElementById("quantity").value = "";
                document.getElementById("gross_wt").value = "";
                document.getElementById("less_wt").value = "";
                document.getElementById("net_wt").value = "";
                document.getElementById("purity").value = "";
                document.getElementById("pure_wt").value = "";
                document.getElementById("making_charges").value = "";
                document.getElementById("amount").value = "";
                document.getElementById("cgst").value = "";
                document.getElementById("sgst").value = "";
                document.getElementById("total").value = "";
                document.getElementById("hsn").value = "";
                document.getElementById("huid").value = "";
            }
        }


        function clearTextArea() {
            document.getElementById('textarea1').value = "";
            document.getElementById("item_name1").value = "";
            document.getElementById("category").value = "";
            document.getElementById("rate").value = "";
            document.getElementById("quantity").value = "";
            document.getElementById("gross_wt").value = "";
            document.getElementById("less_wt").value = "";
            document.getElementById("net_wt").value = "";
            document.getElementById("purity").value = "";
            document.getElementById("pure_wt").value = "";
            document.getElementById("making_charges").value = "";
            document.getElementById("amount").value = "";
            document.getElementById("cgst").value = "";
            document.getElementById("sgst").value = "";
            document.getElementById("total").value = "";
            document.getElementById("hsn").value = "";
            document.getElementById("huid").value = "";
        }
    </script>

<script src="js/jquery-3.2.1.min.js"></script>	
    <script src="js/bootstrap.js"></script>
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="js/morrisjs/raphael-min.js"></script>
    <script src="js/morrisjs/morris.js"></script>
    <script src="js/morrisjs/morris-active-pro.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>

</body>


</html>