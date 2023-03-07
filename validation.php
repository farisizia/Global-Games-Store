<?php
//error_reporting(E_ALL && ~E_NOTICE);
 
session_start();
require 'functions.php';


$id_order = $_GET["id_order"];


$product_view_order = mysqli_query($conn,"SELECT * FROM orderproduct WHERE id_order = $id_order ");
$row_order = mysqli_fetch_assoc($product_view_order);
$status = $row_order['status'];
$id_product = $row_order['id_product'];


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


if( isset($_POST['validation'])){

  if( validation_account($_POST) > 0 )  {
    echo "<script>
          alert('Thank You For Your Submit')
          document.location.href = 'validation-process.php?id_order=$id_order';

         </script>";
  } else {
    echo mysqli_error($conn);
  }
}

if (($status) != 'process') {
      echo "<script>
          alert('You have submited data')
          document.location.href = 'validation-process.php?id_order=$id_order';

         </script>";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
     h2{
       color: black;
      font-size: 30px;
      font-family: "Lato", sans-serif;
     }
   </style>
  <h2>Please Input Your Game Account Data</h2>
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
<form action=" " method="POST"> 
                <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Username Game" aria-label="Username" aria-describedby="basic-addon1" name="username">
</div>

<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Email Game" aria-label="Recipient's username" aria-describedby="basic-addon2" name="email">
  <span class="input-group-text" id="basic-addon2">@example.com</span>
</div>
<input type="hidden" name="id_order" value="<?= $id_order ?> ">
<input type="hidden" name="id_user" value="<?= $_SESSION['id'] ?> ">

<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Password Email" aria-label="Password_email" aria-describedby="basic-addon1" name="password">
</div>
<div class="input-group">
  <textarea name="detail" class="form-control" style="width: 100px; height: 100px;" placeholder="If There Is Incomplete Data, Please Input Another Data" aria-label="With textarea"></textarea>
</div>
<br><br><br><br><br><br><br><br>

<button class="btn btn-success btn-lg" style="width: 1100px; height: 35px; font-size: 15px;" role="button" name="validation">Submit</button> 
</center><br><br><br><br><br><br><br>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</section>



<!-- footer -->  
  <?php include "footer.php" ?>
  <!-- / footer -->

  <!-- Login Modal -->  
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login or Register</h4>
          <form class="aa-login-form" action="">
            <label for="">Username or Email address<span>*</span></label>
            <input type="text" placeholder="Username or email">
            <label for="">Password<span>*</span></label>
            <input type="password" placeholder="Password">
            <button class="aa-browse-btn" type="submit">Login</button>
            <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
            <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
            <div class="aa-register-now">
              Don't have an account?<a href="account.html">Register now!</a>
            </div>
          </form>
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>    

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