<?php 
error_reporting(E_ALL && ~E_NOTICE);

$id = $_GET["id"];


$balance = mysqli_query($conn,"SELECT * FROM user WHERE id = $id");
$row = mysqli_fetch_assoc($balance);
$balance_avail = $row['balance_avail'];
$balance_panding = $row['balance_panding'];




 ?>

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
                            </div>
                            <!-- / language -->

                            
                            <!-- / cellphone -->
                        </div>
                        <!-- / header top left -->
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
                            <!-- img based logo -->
                            <a href="index.php"><img src="img/logo.png" style="width: 67%;" alt="logo img"></a>
                        </div>
                        <!-- / logo  -->
                        <!-- start currency -->
                        <div class="aa-currency">
                            <div class="dropdown">
                                <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="fa fa-usd"><?=  $balance_avail ?></i>  Balance Avail
                                </a>
                            </div>
                        </div>
                            <div class="aa-currency">
                                <div class="dropdown">
                                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <i class="fa fa-usd"><?=  $balance_panding ?></i>  Balance Pending
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- / currency -->         
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
                    
                    <li><a href="#">RELOAD BALANCE<span class="caret"></span></a>
                        <ul class="dropdown-menu">                
                            <li><a href="bank.php">Bank</a></li>
                            <li><a href="card.php">Carts</a></li>                                          
                        </ul>
                    </li>

                    <li><a href="#">WITHDRAW BALANCE<span class="caret"></span></a>
                        <ul class="dropdown-menu">                
                            <li><a href="wdbank.php">Bank</a></li>
                            <li><a href="wdpaypal.php">Paypal</a></li>
                            <li><a href="wdwesternunion.php">Western union</a></li>
                        </ul>
                    </li>

                
                </ul>
            </div><!--/.nav-collapse -->
            </div>
        </div>       
    </div>
  </section>
  <!-- / menu -->