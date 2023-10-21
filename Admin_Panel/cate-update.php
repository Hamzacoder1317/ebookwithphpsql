<?php
require("shared/config.php");
include "shared/_navbar.php";
$updateCategoryId = $_GET['updateId'];

if(isset($_POST['submit']))
{
  $categoryName = $_POST['CategoryName'];

  $queryCategory = "UPDATE `categories` SET `CategoryName`='$categoryName' WHERE `CategoryID`='$updateCategoryId'";

  $runCategory = mysqli_query($conn, $queryCategory);

  if($runCategory)
  {
      echo "<script>alert('Category Updated');</script>";
  }
  else
  {
      echo mysqli_error($conn);
  }

 
}

$selectCategory = "SELECT * FROM `categories` WHERE `CategoryID` = '$updateCategoryId'";
$resultCategory = mysqli_query($conn, $selectCategory);
$recordCategory = mysqli_fetch_assoc($resultCategory);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Category</title>
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
                    <h3 class="page-title">Update Category Form</h3>
                </div>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Category form</h4>
                                <form class="forms-sample" method="POST">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Category Name</label>
                                        <input type="text" class="form-control" id="exampleInputUsername1" value="<?php echo $recordCategory['CategoryName']?>" name="CategoryName" placeholder="Category Name">
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
