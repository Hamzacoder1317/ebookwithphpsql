<?php
require("shared/config.php");
include("shared/_navbar.php");

$updatehonywaaliId = $_GET['updateId'];
$selectt = "SELECT * FROM `books` WHERE `BookID` = '$updatehonywaaliId'";
$result = mysqli_query($conn, $selectt);
$record = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $title = $_POST['Title'];
    $authorID = $_POST['AuthorID'];
    $description = $_POST['Description'];
    $price = $_POST['Price'];
    $categoryID = $_POST['CategoryID'];

    $file = $_FILES['pro_image']['name'];
    $filetemp = $_FILES['pro_image']['tmp_name'];
    $filesize = $_FILES['pro_image']['size'];
    $filetype = $_FILES['pro_image']['type'];
    $folder = "";

    if (is_uploaded_file($_FILES['pro_image']['tmp_name'])) {
        if ($filetype == "image/jpeg" || $filetype == "image/jpg" || $filetype == "image/png") {
            if ($filesize <= 1000000) {
                $path = $folder . $file;
                $queryy = "UPDATE `books` SET `Title`='$title', `AuthorID`='$authorID', `Description`='$description', `Price`='$price', `CategoryID`='$categoryID', `ImageURL`='$file' WHERE `BookID` = '$updatehonywaaliId'";
                move_uploaded_file($filetemp, $path);
                $run = mysqli_query($conn, $queryy);
                if ($run) {
                    echo "<script>alert('Updated');</script>";
                } else {
                    echo mysqli_error($conn);
                }
            } else {
                echo "Size Error";
            }
        } else {
            echo "Filetype Not Correct";
        }
    } else {
        $queryy = "UPDATE `books` SET `Title`='$title', `AuthorID`='$authorID', `Description`='$description', `Price`='$price', `CategoryID`='$categoryID' WHERE `BookID` = '$updatehonywaaliId'";
        $run = mysqli_query($conn, $queryy);
        if ($run) {
            echo "<script>alert('Your Product Has Been Updated');</script>";
        } else {
            echo mysqli_error($conn);
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Update Product</title>
</head>
<body>
    <div class="container-fluid page-body-wrapper">
        <!-- Your sidebar code here -->
        <?php
            include("shared/_sidebar.php");
        ?>
        <!-- Main content -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">Update Form</h3>
                </div>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Product form</h4>
                               
                                <form class="forms-sample" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Product Name</label>
                                        <input type="text" class="form-control" id="exampleInputUsername1" value="<?php echo $record['Title']?>" name="Title" placeholder="Product Name">
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="exampleInputEmail1">Author Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $record['AuthorID']?>" name="AuthorID" placeholder="Product Description">
                                    </div> -->
                                    <div class="form-group">
    <label for="exampleInputEmail1">Author Name</label>
    <select class="form-control" id="exampleInputEmail1" name="AuthorID">
        <?php
        $authorQuery = "SELECT `AuthorID`, `AuthorName` FROM `authors`";
        $authorResult = mysqli_query($conn, $authorQuery);
        while ($authorRow = mysqli_fetch_assoc($authorResult)) {
            $selected = ($authorRow['AuthorID'] == $record['AuthorID']) ? "selected" : "";
            echo "<option value='{$authorRow['AuthorID']}' $selected>{$authorRow['AuthorName']}</option>";
        }
        ?>
    </select>
</div>

                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Description</label>
                                        <input type="text" class="form-control" id="exampleInputUsername1" value="<?php echo $record['Description']?>" name="Description" placeholder="Product Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Price</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $record['Price']?>" name="Price" placeholder="Product Description">
                                    </div>
                                 
                                    <div class="form-group">
    <label for="exampleInputConfirmPassword1">Category Name</label>
    <select class="form-control" id="exampleInputConfirmPassword1" name="CategoryID">
        <?php
        $categoryQuery = "SELECT `CategoryID`, `CategoryName` FROM `categories`";
        $categoryResult = mysqli_query($conn, $categoryQuery);
        while ($categoryRow = mysqli_fetch_assoc($categoryResult)) {
            $selected = ($categoryRow['CategoryID'] == $record['CategoryID']) ? "selected" : "";
            echo "<option value='{$categoryRow['CategoryID']}' $selected>{$categoryRow['CategoryName']}</option>";
        }
        ?>
    </select>
</div>

                                    <div class="form-group">
                                        
                                        <img src="<?php echo $record['ImageURL']?>"  width="300px" alt="">
                                        <input type="file" class="form-control" id="exampleInputPassword1" name="pro_image" placeholder="Product Image">
                                    </div>
                        
                                    <button name="submit" type="submit" class="btn btn-gradient-primary d-flex m-auto">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Your footer code here -->
        <?php
            include("shared/_footer.php");
        ?>
    </div>
</body>
</html>
