<?php 
error_reporting(E_ALL && ~E_NOTICE);
require 'functions.php';


$id = $_GET["id"];

if( isset($_POST['wdbank'])){
    
  if( wdbank_func($_POST) > 0 )  {
    echo "<script>
          alert('Your Withdraw has been process')
          document.location.href = 'wd-process.php';
         </script>";

  } else {
    echo "<script>
          alert('You dont have balance avail')
          document.location.href = 'index.php';
         </script>";
  }

}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <title>Daily Shop | Home</title>
        
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
        <link href="css/stylepayments1.css" rel="stylesheet">    

        <!-- Google Font -->
        <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
        

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    

    </head>
    <body>

    <style>
        input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        }

        button[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }

        input[type=submit]:hover {
        background-color: #45a049;
        }

        .div-input {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
        }
    </style>

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

        <!-- Start header section -->
        <?php include "headerpayments.php" ?>
        <!-- / header section -->

        <!-- Products section -->
        <section id="aa-product">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="aa-product-area">
                            <div class="aa-product-inner">
                            <!-- Bank -->
                                <ul class="nav nav-tabs aa-products-tab">
                                    <li class="active"><a href="#men" data-toggle="tab">BANK</a></li>
                                </ul>
                            <!-- /Bank -->

                            <!--bank-form-->
                            <div class="div-input">
                                <form action=" " method="post">
                                    <label for="fname">Bank or Cradit Union</label>
                                    <input type="text" id="fname" name="firstname" placeholder="Bank or Cradit Union..">

                                    <label for="lname">Domestic ABA Routing Number</label>
                                    <input type="text" id="lname" name="lastname" placeholder="Domestic ABA Routing Number..">

                                    <label for="country">Account Number</label>
                                    <input type="text" id="lname" name="lastname" placeholder="Account Number..">

                                    <input type="hidden" id="lname" name="balance_avail" value="<?= $balance_avail?>" >
                                      <input type="hidden" id="lname" name="id" value="<?= $id?>" >

                                    <label for="country">Account Type</label>
                                    <select id="country" name="country">
                                        <option value="australia">MasterCart</option>
                                        <option value="usa">Maestro</option>
                                        <option value="canada">Visa</option>
                                        <option value="usa">VisaElectron</option>
                                        <option value="usa">Cirrus</option>
                                        <option value="usa">Sage</option>
                                        <option value="usa">Jcb</option>
                                        <option value="usa">Amazon</option>
                                        <option value="usa">AmericanExpress</option>
                                        <option value="usa">Worldpay</option>
                                        <option value="usa">SkrillMoneybookers</option>
                                        <option value="usa">DinnersClubInternational</option>
                                    </select>
                                
                                    <button type="submit" value="Withdraw" name="wdbank">Withdraw</button>
                                </form>
                            </div>
                            <!--bank-form-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </section>

        <?php include "bankbrands.php" ?>
        <!-- / Products section -->
        
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
        <!-- /Custom js -->
    </body>
</html>