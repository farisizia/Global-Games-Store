<?php 
require 'functions.php';

session_start();

$id = $_SESSION['id'];

$result = mysqli_query($conn,"SELECT * FROM user WHERE id = $id ");

$row = mysqli_fetch_assoc($result);
$username = $row['username'];
$email = $row['email'];
$balance_panding = $row['balance_panding'];
$balance_avail = $row['balance_avail'];

 



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
        <h2>My Account</h2>
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
                                        <label for="staticEmail" class="col-sm-2 col-form-label-lg">Username</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                                value="<?= $username?>">
                                        </div>



                                        <label for="staticEmail" class="col-sm-2 col-form-label-lg">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                                value="<?= $email?>">
                                        </div>

                                        <label for="staticEmail" class="col-sm-2 col-form-label-lg">Balance</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                                value="$<?= $balance_avail?>">
                                        </div>
                                        <label for="staticEmail" class="col-sm-2 col-form-label-lg">Balance
                                            Pending</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                                value="$<?= $balance_panding?>">
                                        </div>

                                    </div>

                                    <a class="btn btn-primary btn-lg"
                                        style="width: 1100px; height: 35px; font-size: 15px;" href="edit-account.php"
                                        role="button">Edit profile</a>
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