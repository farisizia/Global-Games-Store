<?php
error_reporting(E_ALL && ~E_NOTICE);
require 'functions.php';
session_start();

$id_product = $_GET["id_product"];


$product_view = mysqli_query($conn,"SELECT * FROM product WHERE id_product = $id_product ");
$rows_view = mysqli_fetch_assoc($product_view);

$id_product = $rows_view['id_product'];
$id_user = $rows_view['id_user'];
$title = $rows_view['title'];
$price = $rows_view['price'];
$id_platforms = $rows_view['id_platforms'];
$id_game = $rows_view['id_game'];
$amount = $rows_view['amount'];
$description = $rows_view['description'];
$img1 = $rows_view['img1'];
$img2 = $rows_view['img2'];
$img3 = $rows_view['img3'];
$img4 = $rows_view['img4'];
$img5 = $rows_view['img5'];



$plat = mysqli_query($conn,"SELECT * FROM platforms WHERE id_platforms= $id_platforms ");
$plats = mysqli_fetch_assoc($plat);
$name_platforms = $plats['platforms'];

$namegame = mysqli_query($conn,"SELECT * FROM game WHERE id_game = $id_game ");
$nameg = mysqli_fetch_assoc($namegame);
$name_game = $nameg['name_game'];

$user = mysqli_query($conn,"SELECT * FROM user WHERE id = $id_user ");
$user1 = mysqli_fetch_assoc($user);
$balance_panding = $user1['balance_panding'];


if( isset($_POST['checkout'])){
    $checkout = checkout($_POST);
  if( $checkout )  {
    echo "<script>
              alert('Terima kasih, silahkan ikuti langkah selanjutnya')
              document.location.href = 'invoice.php?invoice=".$checkout."';
        </script>";
  } else {
    echo mysqli_error($conn);
  }
}



$balancee = $_SESSION['balance_avail'];

$balance = $balancee - $price ;


$balanceseller = $balance_panding + $price ;

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
            font-size: 40px;
            font-family: "Lato", sans-serif;
        }
        </style>
        <h2>Images</h2>
    </center>
    <br><br>
    <center>
        <form action="" method="POST">
            <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-inner">

                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img_product/<?= $img1 ?>" class="d-block w-75" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img_product/<?= $img2 ?>" class="d-block w-75" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img_product/<?= $img3 ?>" class="d-block w-75" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img_product/<?= $img4 ?>" class="d-block w-75" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img_product/<?= $img5 ?>" class="d-block w-75" alt="...">
                            </div>

                        </div>
                        <div class="item">
                            <img src="img_product/<?= $img4 ?>" alt="" style="width:50%;">
                            <div class="carousel-caption">
                            </div>
                        </div>


                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
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

                                <table class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col"><?= $title ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <th scope="col">Platforms</th>
                                            <th scope="col"><?= $name_platforms ?></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Names Games</th>
                                            <th scope="col"><?= $name_game ?></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Price</th>
                                            <th scope="col">$<?= $price ?></th>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th scope="col"><textarea disabled
                                                    style="width: 1000px; height: 200px;"><?= $description ?></textarea>
                                                </>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <center>
                    <?php if ($amount > '0') { ?>
                    <?php if ($_SESSION['balance_avail'] > $price) { ?>
                    <button name="checkout" class="btn btn-success btn-lg"
                        style="width: 150px; height: 45px; font-size: 20px; " role="button">BUY NOW</button>
                    <?php } ?>
                    <?php if ($_SESSION['balance_avail'] <= $price) { ?>
                    <a href="topup.php" class="btn btn-danger btn-lg"
                        style="width: 150px; height: 45px; font-size: 20px;" role="button">Reload Balance</a> &nbsp;
                    &nbsp;<button class="btn btn-success btn-lg" role="button" disabled>BUY</button><br> <a
                        style="color: red;">*you balance is not enough<a>
                            <?php } ?>
                            <?php } ?>


                            <?php if ($amount <= 0 ) { ?>
                            <a class="btn btn-danger btn-lg" style="width: 150px; height: 45px; font-size: 20px;"
                                role="button" disabled>Sold</a>
                            <?php } ?>

                            <input type="hidden" name="id_seller" value="<?= $id_user ?>">
                            <input type="hidden" name="id_product" value="<?= $id_product ?>">
                            <input type="hidden" name="id_user" value="<?= $_SESSION['id'] ?>">
                            <input type="hidden" name="balance" value="<?= $balance ?>">
                            <input type="hidden" name="balance_seller" value="<?= $balanceseller ?>">

                            </form>
                </center>


                <br><br><br><br><br><br><br>


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