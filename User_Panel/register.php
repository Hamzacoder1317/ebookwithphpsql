<?php
require("shared/config.php");


if(isset($_POST['submit']))
{
    
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
 
    $query = "INSERT INTO `users`(`user_name`, `user_email`, `user_pasword`) 
    VALUES ('$name','$email','$password')";
    $run = mysqli_query($conn, $query);

    if($run)
    {
        echo"<script>alert('User has Been Registered!')
        window.location.href='login.php'</script>";
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

<div class="register-form-area">
<div class="register-form text-center">

<div class="register-heading">
<form method="POST">
<span>Sign Up</span>
<p>Create your account to get full access</p>
</div>

<div class="input-box">
<div class="single-input-fields">
<label>Full name</label>
<input type="text" name="Name" placeholder="Enter full name">
</div>
<div class="single-input-fields">
<label>Email Address</label>
<input type="email" name="Email" placeholder="Enter email address">
</div>
<div class="single-input-fields">
<label>Password</label>
<input type="password" name="Password" placeholder="Enter Password">
</div>

<div class="single-input-fields">
<label>Gender</label>
<input type="text" name="Gender" placeholder="Enter your Gender">
</div>

</div>

<div class="register-footer">
<p> Already have an account? <a href="login.php"> Login</a> here</p>
<button class="submit-btn3" type="submit" name="submit">Sign Up</button>
</div>
</form>
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
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854" integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg==" data-cf-beacon='{"rayId":"7fb20b85ee3521ee","version":"2023.8.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script>
</body>
</html>