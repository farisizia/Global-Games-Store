<?php


require_once __DIR__ . "/vendor/autoload.php";

error_reporting(E_ALL && ~E_NOTICE);
session_start();
require "functions.php";
$id_product = $_GET["id_product"];


$product = mysqli_query($conn,"SELECT * FROM product WHERE id_product = $id_product ");

$row = mysqli_fetch_assoc($product);


$id_product = $row["id_product"];
$id_user = $row["id_user"];
$title = $row["title"];
$price = $row["price"];
$id_platforms = $row["id_platforms"];
$id_game = $row["id_game"];
$amount = $row["amount"];
$description = $row["description"];
$img1 = $row["img1"];
$img2 = $row["img2"];
$img3 = $row["img3"];
$img4 = $row["img4"];
$img5 = $row["img5"];


$plat = mysqli_query($conn,"SELECT * FROM platforms WHERE id_platforms= $id_platforms ");
$plats = mysqli_fetch_assoc($plat);
$name_platforms = $plats["platforms"];

$namegame = mysqli_query($conn,"SELECT * FROM game WHERE id_game = $id_game ");
$nameg = mysqli_fetch_assoc($namegame);
$name_game = $nameg["name_game"];

$seller = mysqli_query($conn,"SELECT * FROM user WHERE id = $id_user ");
$sellerr = mysqli_fetch_assoc($seller);
$username = $sellerr["username"];
$email = $sellerr["email"];

$order = mysqli_query($conn,"SELECT * FROM orderproduct WHERE id_product = $id_product ");

$order1 = mysqli_fetch_assoc($order);
$invoice = $order1["invoice"];
$time = $order1["date"];
$status = $order1["status"];




$mpdf = new \Mpdf\Mpdf();

$html = '
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />



    <!-- Font awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="css/jquery.simpleLens.css">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="css/theme-color/red-theme.css" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="css/style.css" rel="stylesheet">    

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">

 

  
    
   	
    <!-- menu -->
    
    <div class="container bootstrap snippets bootdeys">
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default invoice" id="invoice">
            <div class="panel-body">
              <div class="invoice-ribbon"><div class="ribbon-inner">PAID</div></div>
              <div class="row">
                <div class="col-sm-6 top-left">
                  <img src="img/logo.png">
                </div>

                <div class="col-sm-6 top-right">
                  <h3 class="marginright">#INVOICE-'. $invoice .'</h3>
                  <span class="marginright">' . $time . '</span>
                </div>
              </div>
              <hr />
              <div class="row">
                <div class="col-xs-4 from">
                  <p class="lead marginbottom">Seller : '. $username .'</p>
                  <p>' . $email . '</p>
                  
                </div>

                <div class="col-xs-4 to">
                  <p class="lead marginbottom">Buyer : ' . $_SESSION["username"] . '</p>
                  <p>' . $_SESSION["email"] . '</p>
                 
                </div>

                <div class="col-xs-4 text-right payment-details">
                  <p class="lead marginbottom payment-info">Payment details</p>
                  <p>Payment : Balance </p>
                  <p>Date: ' . $time . '</p>
                 
                  <p>Total Amount: $ ' . $price . '</p>
                  <p>Account Name: ' . $_SESSION["username"] . '</p>
                </div>
              </div>

              <div class="row table-row">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 5%">#</th>
                      <th style="width: 50%">Item</th>
                      <th class="text-right" style="width: 15%">Quantity</th>
                      <th class="text-right" style="width: 15%">Unit Price</th>
                      <th class="text-right" style="width: 15%">Total Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center">1</td>
                      <td>' . $title . '</td>
                      <td class="text-right">1</td>
                      <td class="text-right">$' . $price . '</td>
                      <td class="text-right">$' . $price . '</td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>

              <div class="row">
                <div class="col-xs-6 margintop">
                  <p class="lead marginbottom">THANK YOU!</p>

                  <a href="#" target="_blank" class="btn btn-success" id="invoice-print" ><i class="fa fa-print"></i> Invoice</a>
         
                </div>
                <div class="col-xs-6 text-right pull-right invoice-total">
                  <p>Subtotal : $' . $price . '</p>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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

  </body>';
$mpdf->WriteHTML($html);
$mpdf->Output();

?>

