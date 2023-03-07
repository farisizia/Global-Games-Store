<?php 
require 'functions.php';
error_reporting(E_ALL && ~E_NOTICE);

session_start();

$id = $_SESSION['id'];

$result = mysqli_query($conn,"SELECT * FROM user WHERE id = $id ");

$row = mysqli_fetch_assoc($result);
$username = $row['username'];
$email = $row['email'];
$balance_panding = $row['balance_panding'];
$balance_avail = $row['balance_avail'];

$order_product = mysqli_query($conn,"SELECT * FROM orderproduct WHERE id_user = $id");
$row = mysqli_fetch_assoc($result);





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daily Shop | Home</title>

    <!-- Font awesome -->
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="css/jquery.smartmenus.bootstrap.css" rel="stylesheet" />
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="css/jquery.simpleLens.css" />
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="css/slick.css" />
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="css/nouislider.css" />
    <!-- Theme color -->
    <link id="switcher" href="css/theme-color/red-theme.css" rel="stylesheet" />
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all" />

    <!-- Main style sheet -->
    <link href="css/style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- wpf loader Two -->
    <div id="wpf-loader-two">
        <div class="wpf-loader-two-inner">
            <span>Loading</span>
        </div>
    </div>
    <!-- / wpf loader Two -->
    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->

    <?php include 'header.php' ?>
    <!-- / catg header banner section -->


    <!-- catg header banner section -->
    <!-- / catg header banner section -->

    <!-- product category -->
    <!-- Modal view content -->

    <center>
        <style>
        h2 {
            color: black;
            font-size: 30px;
            font-family: "Lato", sans-serif;
        }
        </style>
        <h2>My Order</h2>
    </center>
    <br><br>
    <center>

    </center>
    <section id="aa-product-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-product-details-area">
                        <div class="aa-product-details-content">
                            <div class="row">
                                <!-- Modal view slider -->
                                <br><br>
                                <form>
                                    <div class="form-group row">





                                        <div class="col-md-12">
                                            <div class="checkout-right">
                                                <h4>Order Summary</h4>
                                                <div class="aa-order-summary-area">
                                                    <table class="table table-responsive">
                                                        <thead>

                                                            <tr>
                                                                <th>Title Product</th>
                                                                <th>Status</th>
                                                                <th>Action</th>

                                                            </tr>

                                                        </thead>
                                                        <tbody>
                                                            <?php while ($row = mysqli_fetch_assoc($order_product)) : ?>
                                                            <tr>
                                                                <input type="hidden" name=""
                                                                    value="<?= $id_product =  $row['id_product']; ?> ">
                                                                <td>


                                                                    <?php
                            $product = mysqli_query($conn,"SELECT title FROM product WHERE id_product = $id_product");
                            $rows = mysqli_fetch_assoc($product);
                            $title =  $rows['title'];;
                          echo $title;

                           ?>

                                                                </td>
                                                                <td> <?php echo $row['status']; ?> </td>

                                                                <td>
                                                                    <a
                                                                        href="viewresult.php?id_order=<?php echo $row['id_order']; ?>">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16" fill="currentColor"
                                                                            class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                            <path
                                                                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                                        </svg></a> &nbsp;


                                                            </tr>
                                                            <?php endwhile; ?>
                                                            </tr>
                                                            </tfoot>
                                                    </table>
                                                </div>

                                            </div>


                                            </center>

                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br><br><br><br><br><br><br>



            <?php include "footer.php" ?>

            <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="js/bootstrap.js"></script>
            <!-- SmartMenus jQuery plugin -->
            <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
            <!-- SmartMenus jQuery Bootstrap Addon -->
            <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>
            <!-- To Slider JS -->
            <script src="js/sequence.js"></script>
            <script src="js/sequence-theme.modern-slide-in.js"></script>
            <!-- Product view slider -->
            <script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
            <script type="text/javascript" src="js/jquery.simpleLens.js"></script>
            <!-- slick slider -->
            <script type="text/javascript" src="js/slick.js"></script>
            <!-- Price picker slider -->
            <script type="text/javascript" src="js/nouislider.js"></script>
            <!-- Custom js -->
            <script src="js/custom.js"></script>

</body>

</html>