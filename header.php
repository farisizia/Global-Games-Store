<?php
error_reporting(E_ALL && ~E_NOTICE);


session_start();
if(isset($_SESSION['login'])) {
  if($_SESSION['email_verified_at'] == NULL) {
    header("Location: account/verify-email/verify-email.php");
    exit;
  }
}

$id = $_SESSION['id'];
$product = mysqli_query($conn,"SELECT * FROM product WHERE id_user = $id ");
$row = mysqli_fetch_assoc($product);

$id_product_notif = $row['id_product'];
$id_user_notif = $row['id_user'];
$title_notif = $row['title'];
$price_notif = $row['price'];

$img1_notif = $row['img1'];


$order = mysqli_query($conn,"SELECT * FROM orderproduct WHERE id_product = $id_product_notif ");

$numorder = mysqli_num_rows($order);
$id_product_seller = $numorder['id_product'];



 
  $mobile = mysqli_query($conn,"SELECT * FROM game WHERE id_platforms = 1");
  $pc = mysqli_query($conn,"SELECT * FROM game WHERE id_platforms = 2");

   $conn = mysqli_connect("localhost", "root", "", "global");
   
   $product_view_order = mysqli_query($conn,"SELECT * FROM orderproduct WHERE id_order = $id_order ");
$row_order = mysqli_fetch_assoc($product_view_order);
$status = $row_order['status'];



?>
<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="2a191fa9-3a2c-459c-8d34-606e1b09159b";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
<header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start language -->
                <div class="aa-language">
                  <div class="dropdown">
                    <p>-</p>
                  </div>
                </div>
                <!-- / language -->

                <!-- start currency -->
                  <?php if( isset($_SESSION['login'])){ ?>

                <div class="aa-currency">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
                      <i class="fa fa-usd" style="color : green"><?= $_SESSION['balance_avail'] ?></i> Balance avail 
                    </a>
                  </div>
                </div>
                <div class="aa-currency">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <i class="fa fa-usd" style="color:red"><?= $_SESSION['balance_panding'] ?></i>  Balance Pending
                    </a>
                  </div>
                </div>
                  <?php  } ?>
                <!-- / currency -->
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                 
                   <?php if( isset($_SESSION['login'])){ ?>
                    <li><select name="profile" onchange="location = this.value;">
                                       <option value="#">My Account</option>
                                      <option value="account.php">Profile</option>
                                      <option value="wdbank.php?id=<?= $_SESSION['id'] ?>">Withdraw</option>
                                       <option value="bank.php">Reload Balance</option>
                                      </select></li>
                    <?php  } ?>
                    <?php if(($_SESSION['level']) == 'admin'){ ?>
                    <li><a href="admin/dashboard.php">Admin Page</a></li>
                    <?php  } ?>
                 
                  <li class="hidden-xs"><a href="cart.php">My Cart</a></li>
           

                  <?php if( !isset($_SESSION['level']) ){ ?>
                  <li><a href="account/login/login.php">Login</a></li>
                <?php  } ?>
                 <?php if( isset($_SESSION['login']) == 'user'){ ?>
                  <li><a href="logout.php">Logout</a></li>
                <?php  } ?>

                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <!-- <a href="index.php">
                  <span class="fa fa-shopping-cart"></span>
                  <p>daily<strong>Shop</strong> <span>Your Shopping Partner</span></p>
                </a> -->
                <!-- img based logo -->
                <a href="index.php"><img src="img/logo.png" style="width: 67%;" alt="logo img"></a> <br><br>
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
                  <span class="aa-cart-notify"></span>
                <a class="aa-cart-link" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-controller" viewBox="0 0 16 16">
  <path d="M11.5 6.027a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm2.5-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm-6.5-3h1v1h1v1h-1v1h-1v-1h-1v-1h1v-1z"/>
  <path d="M3.051 3.26a.5.5 0 0 1 .354-.613l1.932-.518a.5.5 0 0 1 .62.39c.655-.079 1.35-.117 2.043-.117.72 0 1.443.041 2.12.126a.5.5 0 0 1 .622-.399l1.932.518a.5.5 0 0 1 .306.729c.14.09.266.19.373.297.408.408.78 1.05 1.095 1.772.32.733.599 1.591.805 2.466.206.875.34 1.78.364 2.606.024.816-.059 1.602-.328 2.21a1.42 1.42 0 0 1-1.445.83c-.636-.067-1.115-.394-1.513-.773-.245-.232-.496-.526-.739-.808-.126-.148-.25-.292-.368-.423-.728-.804-1.597-1.527-3.224-1.527-1.627 0-2.496.723-3.224 1.527-.119.131-.242.275-.368.423-.243.282-.494.575-.739.808-.398.38-.877.706-1.513.773a1.42 1.42 0 0 1-1.445-.83c-.27-.608-.352-1.395-.329-2.21.024-.826.16-1.73.365-2.606.206-.875.486-1.733.805-2.466.315-.722.687-1.364 1.094-1.772a2.34 2.34 0 0 1 .433-.335.504.504 0 0 1-.028-.079zm2.036.412c-.877.185-1.469.443-1.733.708-.276.276-.587.783-.885 1.465a13.748 13.748 0 0 0-.748 2.295 12.351 12.351 0 0 0-.339 2.406c-.022.755.062 1.368.243 1.776a.42.42 0 0 0 .426.24c.327-.034.61-.199.929-.502.212-.202.4-.423.615-.674.133-.156.276-.323.44-.504C4.861 9.969 5.978 9.027 8 9.027s3.139.942 3.965 1.855c.164.181.307.348.44.504.214.251.403.472.615.674.318.303.601.468.929.503a.42.42 0 0 0 .426-.241c.18-.408.265-1.02.243-1.776a12.354 12.354 0 0 0-.339-2.406 13.753 13.753 0 0 0-.748-2.295c-.298-.682-.61-1.19-.885-1.465-.264-.265-.856-.523-1.733-.708-.85-.179-1.877-.27-2.913-.27-1.036 0-2.063.091-2.913.27z"/>
</svg>
                  <span class="aa-cart-title"><a href="newlisting.php">New Listening +</a></span>
                  
                </a>
                
              </div>
              <div>


                  <div class="aa-cartbox">
                 
                <a class="aa-cart-link" href="#">
                 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
</svg>         
                  <span class="aa-cart-title">Manage</span>
              
              
                </a>
                <div class="aa-cartbox-summary">
                  
                  <ul>

                    <li>
                    
                      <div class="aa-cartbox-info">
                     
                       
                          <h4> <a tyle="color : black;"> Manage Your Selling </a> <br> <a> <style="color : blue;><a href="selling.php"> Click here </a><br>
                       
                       
                        <h4></h4>
                      </div>
                      
                    </li>
                      <li>
                    
                      <div class="aa-cartbox-info">
                     
                       
                          <h4> <a tyle="color : black;"> Manage Your Order </a> <br> <a> <style="color : blue;><a href="order.php"> Click here </a><br>
                       
                       
                        <h4></h4>
                      </div>
                      
                    </li>
                    
                                   
                    <li>
                      
                    </li>
                  </ul>
                 
                </div>
              </div>


                
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form action="index.php" method="get">
                  <input type="text" name="keyword" id="" placeholder="Search here ex. 'pubgm' ">
                  <button><span class="fa fa-search"></span></button>
                                         <?php 
                        if(isset($_GET['cari'])){
                         $cari = $_GET['cari'];
                          echo "<b>Hasil pencarian : ".$cari."</b>";
                        }
                        ?>
                </form>
              </div>
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>

  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="index.php">HOME</a></li>

              <li><a href="#">MOBILE<span class="caret"></span></a>
                <ul class="dropdown-menu">         
                <?php while ($row = mysqli_fetch_assoc($mobile)) : ?>       
                  <li><a href="view-game.php?id_game=<?= $row['id_game'] ?>"><?= $row['name_game'] ?></a></li>
                  
                     <?php endwhile; ?>
                </ul>
              </li>
              <li><a href="#">PC<span class="caret"></span></a>
                <ul class="dropdown-menu">  
                  <?php while ($row = mysqli_fetch_assoc($pc)) : ?> 
                   <li><a href="view-game.php?id_game=<?= $row['id_game'] ?>"><?= $row['name_game'] ?></a></li>                                                          
                  <?php endwhile; ?>
                </ul>
              </li>
              
              <li><a href="about.php">ABOUT</a></li>
              
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->