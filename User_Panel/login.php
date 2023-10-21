<?php
require("Shared/config.php");
session_start();

if(isset($_SESSION['user_name']))
{
	header("location:index.php");
}

if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $pass=$_POST['pass'];

    $sql = "SELECT * FROM `admin` where `admin_email`='$email' AND `admin_pasword`='$pass'";
    $result=mysqli_query($conn,$sql);
	 if(mysqli_num_rows($result)>0)
     {
			$row=mysqli_fetch_array($result);
			$_SESSION['admin_id']=$row['admin_id'];
			$_SESSION['admin_name']=$row['admin_name'];
			header("location:../Admin_Panel/index.php");
	}  
        
    else 
        {
		$sql1 = "SELECT * FROM `users`  where `user_email`='$email' AND `user_pasword`='$pass'";
						$result=mysqli_query($conn,$sql1);
							if(mysqli_num_rows($result)>0)
                            {
								$row=mysqli_fetch_array($result);
								$_SESSION['user_id']=$row['user_id'];
								$_SESSION['user_name']=$row['user_name'];
								header("location:index.php");
							} 
					}
					
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
<link rel="shortcut icon" type="image/x-icon" href="assets/img/icon/favicon.png">

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
</head>
<body>
<main class="login-bg">

<div class="login-form-area">
<div class="login-form">

<div class="login-heading">
<span>Login</span>
<p>Enter Login details to get access</p>
</div>

<div class="input-box">
<div class="single-input-fields">
	<form method="POST">

<label>Username or Email Address</label>
<input type="text" name="email" placeholder="User Email address">
</div>
<div class="single-input-fields">
<label>Password</label>
<input type="password" name="pass" placeholder="Enter Password">
</div>
<div class="single-input-fields login-check">
<input type="checkbox" id="fruit1" name="keep-log">
<label for="fruit1">Keep me logged in</label>
<a href="#" class="f-right">Forgot Password?</a>
</div>
</div>

<div class="login-footer">
<p>Don’t have an account? <a href="register.php">Sign Up</a> here</p>
<button class="submit-btn3" type="submit" name="submit">Login</button>
</form>
</div>
</div>
</div>

</main>


<script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>

<script src="./assets/js/owl.carousel.min.js"></script>
<script src="./assets/js/slick.min.js"></script>
<script src="./assets/js/jquery.slicknav.min.js"></script>

<script src="./assets/js/wow.min.js"></script>
<script src="./assets/js/jquery.magnific-popup.js"></script>
<script src="./assets/js/jquery.nice-select.min.js"></script>
<script src="./assets/js/jquery.counterup.min.js"></script>
<script src="./assets/js/waypoints.min.js"></script>
<script src="./assets/js/price_rangs.js"></script>

<script src="./assets/js/contact.js"></script>
<script src="./assets/js/jquery.form.js"></script>
<script src="./assets/js/jquery.validate.min.js"></script>
<script src="./assets/js/mail-script.js"></script>
<script src="./assets/js/jquery.ajaxchimp.min.js"></script>

<script src="./assets/js/plugins.js"></script>
<script src="./assets/js/main.js"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854" integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg==" data-cf-beacon='{"rayId":"7fb20a894acd21ee","version":"2023.8.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script>
</body>
</html>