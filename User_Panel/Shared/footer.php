<?php

$querya = "SELECT * FROM `categories` ";
$runa = mysqli_query($conn, $querya);
$query = "SELECT * FROM `authors` ";
$run = mysqli_query($conn, $query);
?>


<footer>
<div class="footer-wrappper section-bg">
<div class="footer-area footer-padding">
<div class="container">
<div class="row justify-content-between">
<div class="col-xl-3 col-lg-5 col-md-4 col-sm-6">
<div class="single-footer-caption mb-50">
<div class="single-footer-caption mb-30">

<div class="footer-logo mb-25">
<a href="index.php"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
</div>
<div class="footer-tittle">
<div class="footer-pera">
<p>Get the breathing space now, and we’ll extend your term at the other end year for go.</p>
</div>
</div>

<div class="footer-social">
<a href="https://bit.ly/sai4ull"><i class="fab fa-facebook"></i></a>
<a href="#"><i class="fab fa-instagram"></i></a>
<a href="#"><i class="fab fa-linkedin-in"></i></a>
<a href="#"><i class="fab fa-youtube"></i></a>
</div>
</div>
</div>
</div>
<div class="col-xl-2 col-lg-3 col-md-4 col-sm-5">
<div class="single-footer-caption mb-50">
<div class="footer-tittle">
<h4>Book Category</h4>
<ul>
  <?php
while ($dataa = mysqli_fetch_assoc($runa)) {
    ?>
   <li><a href="#"> <?php echo $dataa['CategoryName'] ?></a></li>
        
        
    <?php
}
?>
       
</ul>
</div>
</div>
</div>
<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
<div class="single-footer-caption mb-50">
<div class="footer-tittle">
<h4>Auther</h4>
<ul>
<?php
while ($data = mysqli_fetch_assoc($run)) {
    ?>
   <li><a href="#"> <?php echo $data['AuthorName'] ?></a></li>
        
        
    <?php
}
?>

</ul>
</div>
</div>
</div>
<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
<div class="single-footer-caption mb-50">
<div class="footer-tittle">
<h4>Site Map</h4>
<ul class="mb-20">
<li><a href="index.php">Home</a></li>
<li><a href="about.php">About Us</a></li>

<li><a href="categories.php">categories</a></li>
<li><a href="contact.php">Contact</a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="footer-bottom-area">
<div class="container">
<div class="footer-border">
<div class="row d-flex align-items-center">
<div class="col-xl-12 ">
<div class="footer-copy-right text-center">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</footer>

<div id="back-top">
<a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>


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

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854" integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg==" data-cf-beacon='{"rayId":"7fb20a7eecc321ee","version":"2023.8.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script>
</body>
</html>