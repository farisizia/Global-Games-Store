<?php

session_start();

if (! isset($_SESSION['login']) || ($_SESSION['level'] != "admin")) {
  header("Location: ../account/login/login.php");
  exit;
} else if($_SESSION['email_verified_at'] == NULL) {
  header("Location: ../account/verify-email/verify-email.php");
  exit;
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Material Dashboard Dark Edition by Creative Tim
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="dark-edition">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="black" data-image="assets/img/sidebar-2.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo"><a href="../index.php" class="simple-text logo-normal">
                    Global Games
                </a></div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item active  ">
                        <a class="nav-link" href="./dashboard.php">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./user.php">
                            <i class="material-icons">person</i>
                            <p>Profile</p>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="./edituser.php">
                            <i class="material-icons">perm_identity</i>
                            <p>User List</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./adduser.php">
                            <i class="material-icons">person_add_alt</i>
                            <p>Add User</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./product.php">
                            <i class="material-icons">local_mall</i>
                            <p>Product</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./games-list.php">
                            <i class="material-icons">sports_esports</i>
                            <p>Game List</p>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="./order.php">
                            <i class="material-icons">notifications</i>
                            <p>Order</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./topup.php">
                            <i class="material-icons">money</i>
                            <p>Topup</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./result.php">
                            <i class="material-icons">done</i>
                            <p>Result</p>
                        </a>
                    </li>
                    <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.php">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <form class="navbar-form">
                            <div class="input-group no-border">

                                </button>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0)">

                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">


                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="javascript:void(0)">Mike John responded to your
                                        email</a>
                                    <a class="dropdown-item" href="javascript:void(0)">You have 5 new tasks</a>
                                    <a class="dropdown-item" href="javascript:void(0)">You're now friend with Andrew</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Another Notification</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Another One</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0)">
                                    <i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">
                                        Account
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>