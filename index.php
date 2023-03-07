<?php
error_reporting(E_ALL && ~E_NOTICE);

$game = $_GET['keyword'];


require 'functions.php';

$search_game = mysqli_query ($conn,"SELECT  * FROM  game  WHERE name_game = '$game' ");
$search = mysqli_fetch_assoc($search_game);
$id_game = $search['id_game'];



$product_banner = mysqli_query($conn,"SELECT * FROM product");

$search_hasil = mysqli_query($conn,"SELECT * FROM product WHERE id_game = '$id_game' ");


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
  
  <!-- Start slider -->
  <section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="img/slide4.png" alt="Men slide img" />
              </div>
            </li>

            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="img/slider/slide2.png" alt="Wristwatch slide img" />
              </div>
            </li>

            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="img/slider/slide3.png" alt="Women Jeans slide img" />
              </div>
            </li>
          </ul>
        </div>

        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>

  <!-- / slider -->
  <!-- Start Promo section -->
  <section id="aa-promo">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-promo-area">
            <div class="row">
              <!-- promo left -->
              <!-- <div class="col-md-5 no-padding">                
                <div class="aa-promo-left">
                  <div class="aa-promo-banner">                    
                    <img src="img/promo-banner-1.jpg" alt="img">                    
                    <div class="aa-prom-content">
                      <span>75% Off</span>
                      <h4><a href="#">For Women</a></h4>                      
                    </div>
                  </div>
                </div>
              </div> -->
                                                        <!-- promo right -->
              <!-- <div class="col-md-7 no-padding">
                <div class="aa-promo-right">
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="img/promo-banner-3.jpg" alt="img">                      
                      <div class="aa-prom-content">
                        <span>Exclusive Item</span>
                        <h4><a href="#">For Men</a></h4>                        
                      </div>
                    </div>
                  </div>
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="img/promo-banner-2.jpg" alt="img">                      
                      <div class="aa-prom-content">
                        <span>Sale Off</span>
                        <h4><a href="#">On Shoes</a></h4>                        
                      </div>
                    </div>
                  </div>
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="img/promo-banner-4.jpg" alt="img">                      
                      <div class="aa-prom-content">
                        <span>New Arrivals</span>
                        <h4><a href="#">For Kids</a></h4>                        
                      </div>
                    </div>
                  </div>
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="img/promo-banner-5.jpg" alt="img">                      
                      <div class="aa-prom-content">
                        <span>25% Off</span>
                        <h4><a href="#">For Bags</a></h4>                        
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Promo section -->
  <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
               
                  <!-- Tab panes -->
                  <?php if(($game) == null) {?>
                  <div class="tab-content">
                    <!-- Start men product category -->
                    <div>
                    <h2 align="center">New Product</h2><br><br><br>
                    </div>
                      <ul class="aa-product-catg">
                        <!-- start single product item -->
                            <?php while ($row = mysqli_fetch_assoc($product_banner)) : ?>
                        <li>
                          <figure>
                            <a class="aa-product-img" href="#"><img src="img_product/<?= $row['img1'] ?>" alt="polo shirt img" height="75%" width="75%"></a>
                           <a class="aa-add-card-btn"href="view-detail.php?id_product=<?= $row['id_product'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
</svg>View Detail</a>
                              <figcaption>
                              <h4 class="aa-product-title"><a href="#"><?= $row['title'] ?></a></h4>
                              <span class="aa-product-price"><?= $row['price'] ?></span>
                            </figcaption>
                          </figure>                        
                          <div class="aa-product-hvr-content">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                            <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                          
                          </div>
                          <!-- product badge -->


                            <?php endwhile ?>


                            <?php } ?>


                              <?php if(($game) != null) {?>
                  <div class="tab-content">
                    <!-- Start men product category -->
                    <div>
                    <h2 align="center">Search for <?= $game ?></h2><br><br><br>
                    </div>
                      <ul class="aa-product-catg">
                        <!-- start single product item -->
                            <?php while ($row = mysqli_fetch_assoc($search_hasil)) : ?>
                        <li>
                          <figure>
                            <a class="aa-product-img" href="#"><img src="img_product/<?= $row['img1'] ?>" alt="polo shirt img" height="75%" width="75%"></a>
                            <a class="aa-add-card-btn"href="view-detail.php?id_product=<?= $row['id_product'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                            </svg>View Detail</a>
                            
                              <figcaption>
                              <h4 class="aa-product-title"><a href="#"><?= $row['title'] ?></a></h4>
                              <span class="aa-product-price"><?= $row['price'] ?></span>
                            </figcaption>
                          </figure>                        
                          <div class="aa-product-hvr-content">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                            <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                          
                          </div>
                          <!-- product badge -->


                            <?php endwhile ?>


                            <?php } ?>

                    <!-- / men product category -->
                    <!-- start women product category -->
            
                  <!-- quick view modal -->                  
                 <!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- / quick view modal -->              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Products section -->
  <!-- banner section -->
  
  <!-- popular section -->
  
  <!-- / popular section -->
  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
     
    </div>
  </section>
  <!-- / Support section -->

  <!-- Testimonial -->
  <!-- / Testimonial -->

  <!-- Latest Blog -->
  <!-- / Latest Blog -->

  <!-- Client Brand -->
  <section id="aa-client-brand">
    <div class="container">
      
    </div>
  </section>
  <!-- / Client Brand -->

  <!-- Subscribe section -->
  <!-- Testimonial -->
  <section id="aa-testimonial">  
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-testimonial-area">
            <ul class="aa-testimonial-slider">
              <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="img/1.jpg" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>shopping here is very good and great</p>
                  <div class="aa-testimonial-info">
                    <p>Abizard</p>
                    <span>PUBGM</span>
                    
                  </div>
                </div>
              </li>
              <!-- single slide -->
              <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="img/2.jpg" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>I sell my stuff here, and everything is safe. I really like the features presented by global games.</p>
                  <div class="aa-testimonial-info">
                    <p>Deniz</p>
                    <span>PUBGM</span>
                  </div>
                </div>
              </li>
              <!-- single slide -->
              <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="img/3.jpg" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>as a businessman, I can calmly sell my game account here.</p>
                  <div class="aa-testimonial-info">
                    <p>Aysun</p>
                    <span>PUBGM</span>
                  </div>
                </div>
              </li>
              <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="img/2.jpg" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>the withdrawal feature is very fast in processing, and the admin really takes care of our security and comfort.</p>
                  <div class="aa-testimonial-info">
                    <p>Kevin Mayer</p>
                    <span>Gamer</span>
                  </div>
                </div>
              </li>
               <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="img/3.jpg" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>I really enjoy shopping at Global Games, everything is very cheap and the service is fast in the process. i love global games.</p>
                  <div class="aa-testimonial-info">
                    <p>Mishel angela</p>
                    <span>Gamers</span>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section><br>
  <!-- / Testimonial -->
  <!-- / Subscribe section -->

  <!-- bankbrands-logo -->
  <?php include "bankbrands.php" ?>
  <!-- / bankbrands-logo -->
  

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