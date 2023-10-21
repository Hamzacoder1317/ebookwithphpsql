<?php
require ("config.php");
session_start();
// <!-- Count of cart -->
if(isset($_SESSION["shopping_cart"])) 
{
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
$_SESSION["count_cart"] = $cart_count;
}
else
{
    $cart_count=0 ;
}
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Book Shop</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="shortcut icon" type="image/x-icon" href="assets/img/icon/logo-mini.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="assets/css/slicknav.css">
<link rel="stylesheet" href="assets/css/animate.min.css">
<link rel="stylesheet" href="assets/css/price_rangs.css">
<link rel="stylesheet" href="assets/css/magnific-popup.css">
<link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
<link rel="stylesheet" href="assets/css/themify-icons.css">
<link rel="stylesheet" href="assets/css/slick.css">
<link rel="stylesheet" href="assets/css/nice-select.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
<header>
<div class="header-area">
<div class="main-header ">
<div class="header-top ">
<div class="container">
<div class="row">
<div class="col-xl-12">
<div class="d-flex justify-content-between align-items-center flex-sm">
<div class="header-info-left d-flex align-items-center">

<div class="logo">
 <a href="index.php"><img src="assets/img/logo/logo.png"  width="250px"></a> 
</div>

</div>
<div class="header-info-right d-flex align-items-center">
<ul>

<li><a href="#">Track Order</a></li>
<li>
<!-- <a href="cart.php"><i class="bi bi-cart-plus fs-2 text-dark"></i><sup><span class="fs-4 text-danger"><?php echo $_SESSION["count_cart"];?></span></sup></a> -->
</li>
<?php 
if(!isset($_SESSION['user_name']))
{
?>
<li><a href="login.php" class="btn header-btn">Login</a></li>
<?php } else { ?>
    <li><a href="#" class="text-danger fw-bold"><?php echo $_SESSION['user_name']?></a></li>
    <li><a href="logout.php" class="btn header-btn">Logout</a></li>
    <?php } ?>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="header-bottom  header-sticky">
<div class="container">
<div class="row align-items-center">
<div class="col-xl-12">

<div class="logo2">
<a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
</div>

<div class="main-menu text-center d-none d-lg-block">
<nav>
<ul id="navigation">
<li><a href="index.php">Home</a></li>
<li><a href="categories.php">Categories</a></li>
<li><a href="about.php">About</a></li>

 <li><a href="categories copy.php">Products</a></li>

<li><a href="contact.php">Contact</a></li>
</ul>
</nav>
</div>
</div>
