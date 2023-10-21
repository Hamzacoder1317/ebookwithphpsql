<?php
include("Shared/nav.php");
require("Shared/config.php");
if(isset($_POST['submit']))
{	
$prodId = $_POST['prod_id'];
$queryy = "SELECT * FROM `books` WHERE BookID = '$prodId'";
$run = mysqli_query($conn,$queryy);
$data = mysqli_fetch_assoc($run);
$id = $data['BookID'];
$name = $data['Title'];
$price = $data['Price'];
$image = $data['ImageURL'];

$cartArray = array(
	 'product'=>array(
	'name'=>$name,
	'id'=>$id,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);

if(!isset($_SESSION["shopping_cart"])) 
{
	$_SESSION["shopping_cart"] = $cartArray;
	echo "<script>alert('Product is Added to your Cart!')</script>";
}
// array_keys()
else
{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($name,$array_keys)) 
    {
		foreach($_SESSION["shopping_cart"] as &$value)
        {
            if($value['id'] === $_POST["prod_id"])
            {
                $value['quantity']=$value['quantity']+1;
                echo "<script>alert('Quanity of this Product in your Cart is ".$value['quantity']."')</script>";
                break; // Stop the loop after we've found the product
            }
        }
	}
	else
    {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	echo "<script>alert('Another Product is Added to your Cart!')</script>";
	}
	}
}
$querys = "SELECT categories.CategoryName, authors.AuthorName, books.Title, books.Price , books.ImageURL , books.BookID
FROM ((books INNER JOIN Categories ON books.CategoryID = categories.CategoryID) INNER JOIN authors ON books.AuthorID = authors.AuthorID)";
$runs = mysqli_query($conn, $querys);
$query = "SELECT * FROM `authors` ";
$run = mysqli_query($conn, $query);
$querya = "SELECT * FROM `categories` ";
$runa = mysqli_query($conn, $querya);
?>
<!-- <div class="col-xl-12">
    <div class="mobile_menu d-block d-lg-none"></div>
</div> -->
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

                                    


                                        </div>
                                    </div>

                                </div>


                    <div class="best-selling p-0 ">
                        <div class="row">

                            <?php
             while ($datas = mysqli_fetch_assoc($runs)) {
                ?>
                            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-12 col-sm-6">
                                <div class="properties pb-30">
                                    <div class="properties-card">
                                        <div class="properties-img">

                                            <a href="#?ORDERId=<?php echo $datas['BookID']?>">
                                                <img src="../Admin_Panel/<?php echo $datas['ImageURL'];?>" height="20%"></a>
                                        </div>
                                        <div class="properties-caption properties-caption2">
                                            <h3> <a href="#?ORDERId=<?php echo $datas['BookID']?>">
                                                    <?php echo $datas['Title'];?>"
                                                </a></h3>
                                            <h6>
                                                <?php echo $datas['AuthorName'];?>
                                            </h6>
                                            <h6>
                                                <?php echo $datas['Price'];?>
                                            </h6>
                                            <div
                                                class="properties-footer d-flex justify-content-between align-items-center">
                                                <div class="review">
                                                    <div class="rating">
                                                    </div>
                                                    <h6>
                                                        <?php echo $datas['CategoryName'];?>
                                                    </h6>
                                                </div>
                                                <div class="price">
                                                    <form action="" method="POST">
                                                        <input type="hidden" name="prod_id"
                                                            value="<?php echo $datas['BookID']?>">
                                                        <button type="submit" name="submit"
                                                            class="btn btn-secondary d-flex  text-dark outline-success"
                                                            style="margin-bottom:2rem">Add to Cart</button>
                                                    </form>

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