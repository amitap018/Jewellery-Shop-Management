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

    //session_start();
    error_reporting(E_ALL ^ E_WARNING);
    
    if (isset($_POST['addName'])) {
    $type1=0;
    $narrator1= "Payable Amount";
    $type2=1;
    $narrator2= "Paid Amount";
  
    $sql="INSERT INTO sell_recid(date,amt,cust_id,type,Narrator,Status) VALUES('" . $_POST['date'] . "', '" . $_POST['amt_payed'] . "','" . $_POST['cust_id'] . "', '$type2', '$narrator2','')";	
    $conn->query($sql);

    $sql2= "INSERT INTO voucher(date,amt,acc_id,type,Narrator,Status) VALUES('" . $_POST['date'] . "', '" . $_POST['amt_payed'] . "','" . $_POST['cust_id'] . "', '$type2', '$narrator2','')";
        $conn->query($sql2);
 
    
    //mysqli_close($conn);
    header("location: sellReceipt.php");
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
                                                
                                                <li><span class="bread-blod" style="font-size: 25px;"><strong> Sell Recid </strong></span>
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
                            <label for="table">Customer ID: </label>
                            <br>
                            <input type="text" name="cust_id" id="cust_id" required >
                            <br>

                        </span></td>
                    <td><span>
                            <label for="table">Date: </label>
                            <br>
                            <input type="date" name="date" id="date" required>
                        </span></td>
                </tr>




                <tr>
                    <td><span>
                            <label for="table">Total Nave: </label>
                            <br>
                            <input type="number" name="total_nav" id="total_nav" required>
                        </span></td>
                    <td><span>
                            <label for="table">Total Paid: </label>
                            <br>
                            <input type="number" name="total_paid" id="total_paid" required>
                        </span></td>
                    <td><span>
                            <label for="table">Total Balance: </label>
                            <br>
                            <input type="number" name="total_balance" id="total_balance" required>
                        </span></td>
                </tr>


                <tr>
                    <td><span>
                            <br>
                            <label for="table">Amount Payed: </label>

                            <input type="number" name="amt_payed" id="amt_payed" required>
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
                        </span></td>
                    <td><span>
                            <br>

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

                        </span></td>
                    <td><span>
                            <br>
                            <button id="addName" name="addName"
                                style="width:70px; border-radius:5px; font-size: 15px">Add</button>
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
                        </span></td>
                    <td><span>
                            <br>
                            <button id="clear" style="width:70px; border-radius:5px; font-size: 15px">Clear</button>
                        </span></td>

                </tr>
            </table>


        </form>

    </div>

    </div>


    <script>
        $(document).ready(function () {
            $('#cust_name').on('change', function () {
                var cust_name = this.value;

                $.ajax({
                    url: 'sellReceiptAjax.php',
                    type: "POST",
                    data: {
                        cust_name: cust_name
                    },
                    success: function (response) {
                        var ans2 = $.parseJSON(response);
                        //  var ans = response;
                        let a = ans2[0];
                        let b = ans2[1];
                        let c = ans2[2];
                        let d = ans2[3];

                        $('#cust_id').val(a);
                        $('#total_nav').val(b);
                        $('#total_paid').val(c);
                        $('#total_balance').val(d);

                    }
                });


            });
        });
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