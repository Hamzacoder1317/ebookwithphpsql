<?php 
include("Shared/nav.php");
require("shared/config.php");

if (isset($_GET['ORDERId'])) {
    $ORDERId = $_GET['ORDERId'];

    $selectQuery = "SELECT 
        categories.CategoryName, authors.AuthorName, books.Title, books.Price, books.ImageURL, books.Description
    FROM ((books
    INNER JOIN Categories ON books.CategoryID = categories.CategoryID)
    INNER JOIN authors ON books.AuthorID = authors.AuthorID)
    WHERE books.BookID = '$ORDERId'";
    

    $result = mysqli_query($conn, $selectQuery);
    

    if ($result && mysqli_num_rows($result) > 0) {
        $record = mysqli_fetch_assoc($result);
    } else {
      
        echo "Book not found";
    }
} else {

    echo "Invalid request";
}
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

<div class="services-area2">
<div class="container">
<div class="row">
<div class="col-xl-12">
<div class="row">
<div class="col-xl-12">

<div class="single-services d-flex align-items-center mb-0">
<div class="features-img">
<img src="img/<?php echo $record['ImageURL'];?>" height="400px">
</div>
<div class="features-caption">
<h3> <?php echo $record['Title']; ?></h3>
<p class="fw-bolder"> <?php echo $record['AuthorName']; ?></p>
<div class="price">
 <p><?php echo $record['Price']; ?></p>
</div>
<div class="review">
<div class="rating">
</div>
<p>(120 Review)</p>
</div>
<!-- <form action="" method="POST">
        <input type="hidden"  name="prod_id" value="<?php echo $data['BookID']?>">
        <button type="submit" name="submit" class="btn btn-secondary d-flex m-auto text-dark outline-success">Add to Cart</button>
      </form> -->
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<section class="our-client section-padding best-selling">
<div class="container">
<div class="row">
<div class="offset-xl-1 col-xl-10">
<div class="nav-button f-left">

<nav>
<div class="nav nav-tabs " id="nav-tab" role="tablist">
<a class="nav-link active" id="nav-one-tab" data-bs-toggle="tab" href="#nav-one" role="tab" aria-controls="nav-one" aria-selected="true">Description</a>

</div>
</nav>

</div>
</div>
</div>
</div>
<div class="container">

<div class="tab-content" id="nav-tabContent">
<div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">

<div class="row">
<div class="offset-xl-1 col-lg-9">
<p><?php echo $record['Description']; ?></p>

</div>
</div>
</div>


</div>
</div>
</div>
</section>

<?php
include("Shared/footer.php");
?>
