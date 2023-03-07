<?php
session_start();

require 'functions.php';




$platforms = mysqli_query($conn,"SELECT * FROM platforms");


$game = mysqli_query($conn,"SELECT * FROM game");



if( isset($_POST['listing'])){
    
  if( add_product($_POST) > 0 )  {
    echo "<script>
          alert('product successfully add')
          document.location.href = 'index.php';
         </script>";

  } else {
    echo mysqli_error($conn);
  }

}
?>
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
        <link href="css/style.css" rel="stylesheet">    

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
        <?php include "header.php" ?>
        <!-- / header section -->


        <!-- form-list -->
        <form action=" " method="POST" enctype="multipart/form-data">
        <section id="aa-product">
            <div class="container">
                <ul class="nav nav-tabs aa-products-tab">
                    <li class="active"><a href="#men" data-toggle="tab">Listening-Products</a></li>
                </ul>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Listening Title</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Please enter your listening title" name="title">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Price</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="$"  name="price">
                    <input type="hidden" class="form-control" id="exampleFormControlInput1"name="amount" value="1">
                </div>

                <div class="form-group">
                   
                      <div class="form-group">
    <label for="exampleFormControlSelect1">PLATFORMS</label>
    <select class="form-control" id="exampleFormControlSelect1" name="id_platforms">
         <?php while ($row = mysqli_fetch_assoc($platforms)) :?>
      <option value="<?= $row['id_platforms'] ?> "><?= $row['platforms'] ?></option>
      <?php endwhile; ?>
    </select>
    <input type="hidden" class="form-control" id="exampleFormControlInput1"name="id_user" value="<?= $_SESSION['id'] ?>">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlSelect1" >Name Game</label>
    <select class="form-control" id="exampleFormControlSelect1" name="id_game">
        <?php while ($rows = mysqli_fetch_assoc($game)) : ?>
      <option value="<?= $rows['id_game'] ?> "><?= $rows['name_game'] ?></option>
      <?php endwhile; ?>
    </select>
  </div>
                
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description </label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Include the most important information about your listing here" name="description"></textarea>
                </div></br>

                <div class="custom-file">
                    <label class="custom-file-label" for="customFile">Input Image <h6 style="color : red;">*input images as needed</h6></label>
                    <input type="file" class="custom-file-input form-control" id="customFile" class="form-control" name="img1"></br>
                    <input type="file" class="custom-file-input form-control" id="customFile" class="form-control" name="img2"></br>
                    <input type="file" class="custom-file-input form-control" id="customFile" class="form-control" name="img3"></br>
                    <input type="file" class="custom-file-input form-control" id="customFile" class="form-control" name="img4"></br>
                    <input type="file" class="custom-file-input form-control" id="customFile" class="form-control" name="img5"></br>
                </div>

                <div>
                   <button class="btn btn-success btn-lg"  role="button" name="listing">Publish Now</button>
                </div>
                
                <br>
                <br>
                <br>
                <br>
            </div>
        </section>
    </form>
        <!-- form-list -->

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
  