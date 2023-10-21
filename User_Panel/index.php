<?php
include ("Shared/nav.php");



$querys = "SELECT categories.CategoryName, authors.AuthorName, books.Title, books.Price , books.ImageURL , books.BookID , books.LastRevisionDate
    FROM ((books
    INNER JOIN Categories ON books.CategoryID = categories.CategoryID)
    INNER JOIN authors ON books.AuthorID = authors.AuthorID)
   ";
$run = mysqli_query($conn,$querys);
$datas = mysqli_fetch_assoc($run)
?>

<div class="col-xl-12">
<div class="mobile_menu d-block d-lg-none"></div>
</div>
</div>
</div>
</div>
</div>
</div>
</header>
<main>

<div class="slider-area">
<div class="container">
<div class="row">
<div class="col-xl-12">
<div class="slider-active dot-style">

<div class="single-slider slider-height  d-flex align-items-center"  style="background-image: url(assets/img/gallery/carousal1.jpg); background-position : cover">
<div class="container">
<div class="row justify-content-center">
<div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-7">
<div class="hero-caption text-center">
<span data-animation="fadeInUp" data-delay=".2s">Discover our new eBook!</span>
<h1 data-animation="fadeInUp" data-delay=".4s">Discover Exclusive eBook</h1> 

</div>
</div>
</div>
</div>
</div>

<div class="single-slider slider-height d-flex align-items-center" style="background-image: url(assets/img/gallery/carousal2.jpg); background-position : cover">
<div class="container">
<div class="row justify-content-center">
<div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-7">
<div class="hero-caption text-center">
<span data-animation="fadeInUp" data-delay=".2s">"Discover our new eBook!"</span>
<h1 data-animation="fadeInUp" data-delay=".4s">Read, Learn, Enjoy</h1>

</div>
</div>
</div>
</div>
</div>

<div class="single-slider slider-height slider-bg3 d-flex align-items-center">
<div class="container">
<div class="row justify-content-center">
<div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-7">
<div class="hero-caption text-center">
<span data-animation="fadeInUp" data-delay=".2s">Discover our new eBook!</span>
<h1 data-animation="fadeInUp" data-delay=".4s">Elevate with Our eBook</h1>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Cards -->
<div class="best-selling section-bg">
<div class="container">
<div class="row justify-content-center">
<div class="col-xl-7 col-lg-8">
<div class="section-tittle text-center mb-55">
<h2>Best Selling Books Ever</h2>
</div>
</div>
</div>





<div class="row">
<div class="col-xl-12">
<div class="selling-active">

<?php
             while ($data = mysqli_fetch_assoc($run)) {
                ?>
                <div class="properties pb-20">
                    <div class="properties-card">
                        <div class="properties-img">
                    
                            <a href="book-details.php?ORDERId=<?php echo $data['BookID']?>"><img src="../Admin_Panel/<?php echo $data['ImageURL'];?>" height="300px" ></a>
                        </div>
                        <div class="properties-caption">
                            <h3> <a href="book-details.php?ORDERId=<?php echo $data['BookID']?>"> <?php echo $data['Title']; ?></a></h3>
                            <h6><?php echo $data['AuthorName'];?></h6>
                            <div class="properties-footer d-flex justify-content-between align-items-center">
                            <h6><?php echo $data['Price'];?></h6>
                            </div>
                            <div>
                            <p> <strong>Release </strong><span class="text-muted"><?php echo $data['LastRevisionDate'];?></span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            
          
            ?>
            
</div>
</div>
</div> 
</div>
</div>


<div class="services-area2 top-padding">
<div class="container">
<div class="row">
<div class="col-xl-9 col-lg-9 col-md-8">
<div class="row">

<div class="col-xl-12">
<div class="section-tittle d-flex justify-content-between align-items-center mb-40">
<h2 class="mb-0">Featured This Week</h2>
<a href="#" class="browse-btn">View All</a>
</div>
</div>
</div>
<div class="row">

<div class="col-xl-12">
<div class="services-active">
    


<div class="single-services d-flex align-items-center">
<div class="features-img">
<a href="#?ORDERId=<?php echo $data['BookID']?>"><img src="img/<?php echo $datas['ImageURL'];?>" width="320px" ></a>
</div>
<div class="features-caption">
<img src="assets/img/icon/logo.svg" alt="">
<h3> <?php echo $datas['Title']; ?></h3>
<p>By Evan Winter</p>
<p> <?php echo $datas['AuthorName']; ?><p>
<div class="price">
<p><?php echo $datas['Price'];?></p>
</div>
<div class="review">
<div class="rating">
<p> <strong>Release </strong><span class="text-muted"><?php echo $datas['LastRevisionDate'];?></span></p>
</div>

</div>

</div>
</div>

</div>
</div>

</div>
</div>
<div class="col-xl-3 col-lg-3 col-md-4 col-sm-9">

<div class="google-add">
<img src="assets/img/gallery/ad.jpg" alt="" class="w-100">
</div>
</div>
</div>
</div>
</div>

           <!-- working -->


<section class="our-client section-padding best-selling">
<div class="container">
<div class="row justify-content-between">
<div class="col-xl-5 col-lg-5 col-md-12">

</section>





<section class="subscribe-area">
<div class="container">
<div class="subscribe-caption text-center  subscribe-padding section-img2-bg"  style="background-image: url(assets/img/gallery/section.jpg); background-position : cover">
<div class="row justify-content-center">
<div class="col-xl-6 col-lg-8 col-md-9">
<h3>Join Newsletter</h3>
<p>We're thrilled to introduce our latest product, [Product Name]. It's designed to [briefly describe its main features and benefits]. Be among the first to get your hands on it by visiting our website.</p>
<form action="#">
<input type="text" placeholder="Enter your email">
<button class="subscribe-btn">Subscribe</button>
</form>
</div>
</div>
</div>
</div>
</section>
<?php
include("Shared/footer.php");
?>
</main>

