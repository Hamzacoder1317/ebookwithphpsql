<?php
include("Shared/nav.php");



$categoryFilter = "";
$authorFilter = "";

if (isset($_GET['categoryId'])) {
    $categoryFilter = "AND books.CategoryID = " . $_GET['categoryId'];
}

if (isset($_GET['aauthorID'])) {
    $authorFilter = "AND books.AuthorID = " . $_GET['aauthorID'];
}

$query = "SELECT categories.CategoryName, authors.AuthorName, books.Title, books.Price, books.ImageURL, books.BookID
          FROM books
          INNER JOIN Categories ON books.CategoryID = categories.CategoryID
          INNER JOIN authors ON books.AuthorID = authors.AuthorID
          WHERE 1 $categoryFilter $authorFilter";

$runs = mysqli_query($conn, $query);

if (!$runs) {
    die("Query execution failed: " . mysqli_error($conn));
}







$query = "SELECT * FROM `authors` ";
$run = mysqli_query($conn, $query);


$querya = "SELECT * FROM `categories` ";
$runa = mysqli_query($conn, $querya);
?>

-

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

                        <div class="single-slider slider-height  d-flex align-items-center"
                            style="background-image: url(assets/img/gallery/carousal1.jpg); background-position : cover">
                            <div class="container">
                                <div class="row justify-content-center">

                                    <div class="hero-caption text-center">
                                        <span data-animation="fadeInUp" data-delay=".2s">Science Fiction</span>
                                        <h1 data-animation="fadeInUp" data-delay=".4s">The History<br> of Phipino</h1>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="listing-area pt-50 pb-50">
                        <div class="container">
                            <div class="row">

                                <div class="col-xl-4 col-lg-4 col-md-6">

                                    <div class="category-listing mb-50">

                                        <div class="single-listing">

                                            <div class="select-Categories pb-30">
                                                <div class="small-tittle mb-20">
                                                    <h4>Filter by Categories</h4>
                                                </div>
                                                <?php
while ($dataa = mysqli_fetch_assoc($runa)) {
    ?>
                                                <label class="container ">
                                                    <a class="text-dark fw-bolder"
                                                        href="?categoryId=<?php echo $dataa['CategoryID'] ?>">
                                                        <p class="text-dark ">
                                                            <?php echo $dataa['CategoryName'] ?>
                                                        </p>
                                                    </a>
                                                </label>
                                                <?php
}
?>
                                            </div>









                                            <div class="select-Categories">
                                                <div class="small-tittle mb-20">
                                                    <h4>Filter by Author Name</h4>
                                                </div>
                                                <?php
while ($dataa = mysqli_fetch_assoc($run)) {
    ?>
                                                <label class="container ">
                                                    <a class="text-dark fw-bolder"
                                                        href="?aauthorID=<?php echo $dataa['AuthorID'] ?>">
                                                        <p class="text-dark ">
                                                            <?php echo $dataa['AuthorName'] ?>
                                                        </p>
                                                    </a>
                                                </label>
                                                <?php
}
?>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-8 col-lg-8 col-md-6">
                                    <div class="row justify-content-end">
                                        <div class="col-xl-4">
                                            <div class="product_page_tittle">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="best-selling p-0">
                                        <div class="row">

                                            <?php
          
while ($datas = mysqli_fetch_assoc($runs)) {
    

                ?>
                                            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-12 col-sm-6">
                                                <div class="properties pb-30">
                                                    <div class="properties-card">
                                                        <div class="properties-img">
                                                            <a
                                                                href="book-details.php?ORDERId=<?php echo $datas['BookID']?>"><img
                                                                    src="img/<?php echo $datas['ImageURL'];?>"
                                                                    height="300px"></a>
                                                        </div>
                                                        <div class="properties-caption properties-caption2">
                                                            <h3> <a
                                                                    href="book-details.php?ORDERId=<?php echo $datas['BookID']?>">
                                                                    <?php echo $datas['Title'];?>"
                                                                </a></h3>
                                                            <p>
                                                                <?php echo $datas['AuthorName'];?>
                                                            </p>
                                                            <div
                                                                class="properties-footer d-flex justify-content-between align-items-center">
                                                                <div class="review">
                                                                    <div class="rating">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                    </div>
                                                                    <p>
                                                                        <?php echo $datas['CategoryName'];?>
                                                                    </p>
                                                                </div>
                                                                <div class="price">
                                                                    <P>
                                                                        <?php echo $datas['Price'];?>
                                                                    </P>
                                                                </div>
                                                            </div>
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



</main>
<?php
include("Shared/footer.php");
?>
<!-- data-background="assets/img/gallery/section-bg1.jpg" -->