<?php 
session_start();
require 'functions.php';

$id = $_SESSION['id'];

$result = mysqli_query($conn,"SELECT * FROM user WHERE id = $id ");

$row = mysqli_fetch_assoc($result);



if ( isset($_POST['accountupdate']) AND $_POST['password'] == null ) {
   echo "<script>
          alert('Input your new password OR old password')
         </script>";
}

if ( isset($_POST['accountupdate']) AND $_POST['password'] != null ) {

 
  if( update_admin($_POST) > 0 )  {
    echo "<script>
          alert('account successfully updated')
         </script>";
  } else {
    echo mysqli_error($conn);
  }

}
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
  <h2>Edit Profile</h2>
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
  <input type="text" class="form-control" disabled placeholder="Username Game" aria-label="Username" aria-describedby="basic-addon1" name="username" value="<?= $_SESSION['username'] ?>">
</div>

<div class="input-group mb-3">
  <input type="text" class="form-control" disabled placeholder="Email Game" aria-label="Recipient's username" aria-describedby="basic-addon2" name="email" value="<?= $_SESSION['email'] ?>">
  <span class="input-group-text" id="basic-addon2">@example.com</span>
</div>
<input type="hidden" name="id_order" value="<?= $id_order ?> ">
<input type="hidden" name="id_user" value="<?= $_SESSION['id'] ?> ">

<div class="input-group mb-3">
  <input type="password" class="form-control" placeholder="Password" aria-label="Password_email" aria-describedby="basic-addon1" name="password">
</div>

<br><br><br><br><br><br><br><br>

<button class="btn btn-primary btn-lg" style="width: 1100px; height: 35px; font-size: 15px;" role="button" name="accountupdate">Update</button> 
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