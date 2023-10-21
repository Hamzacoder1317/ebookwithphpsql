<?php
require("shared/config.php");
include("shared/_navbar.php");

$updateAuthorId = $_GET['updateId'];
$selectAuthor = "SELECT * FROM `authors` WHERE `AuthorID` = '$updateAuthorId'";
$resultAuthor = mysqli_query($conn, $selectAuthor);
$recordAuthor = mysqli_fetch_assoc($resultAuthor);

if (isset($_POST['submit'])) {
    $authorName = $_POST['AuthorName'];

    $website = $_POST['Website'];
    $email = $_POST['Email'];

    $newAuthorImage = $_FILES['author_image']['name'];
    $newAuthorImageTemp = $_FILES['author_image']['tmp_name'];
    $filetype = $_FILES['author_image']['type'];
    $filesize = $_FILES['author_image']['size'];
    $folder = "";

    if (is_uploaded_file($_FILES['author_image']['tmp_name'])) {
        if ($filetype == "image/jpeg" || $filetype == "image/jpg" || $filetype == "image/png") {
            if ($filesize <= 1000000) {
                $path = $folder . $newAuthorImage;
                move_uploaded_file($newAuthorImageTemp, $path);

                $queryAuthor = "UPDATE `authors` SET 
                    `AuthorName`='$authorName',
              
                    `Website`='$website',
                    `Email`='$email',
                    `ImageURL`='$path' 
                    WHERE `AuthorID`='$updateAuthorId'";

                $runAuthor = mysqli_query($conn, $queryAuthor);

                if ($runAuthor) {
                    echo "<script>alert('Author Updated');</script>";
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
        // If no new image is uploaded, update other author details without changing the image
        $queryAuthor = "UPDATE `authors` SET 
            `AuthorName`='$authorName',
            `Biography`='$biography',
            `Website`='$website',
            `Email`='$email'
            WHERE `AuthorID`='$updateAuthorId'";

        $runAuthor = mysqli_query($conn, $queryAuthor);

        if ($runAuthor) {
            echo "<script>alert('Author Updated');</script>";
        } else {
            echo mysqli_error($conn);
        }
    }
};

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Author</title>
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
                    <h3 class="page-title">Update Author Form</h3>
                </div>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Author form</h4>
                               
                                <form class="forms-sample" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Author Name</label>
                                        <input type="text" class="form-control" id="exampleInputUsername1" value="<?php echo $recordAuthor['AuthorName']?>" name="AuthorName" placeholder="Author Name">
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Website</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $recordAuthor['Website']?>" name="Website" placeholder="Author Website">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputConfirmPassword1">Email</label>
                                        <input type="email" class="form-control" id="exampleInputConfirmPassword1" value="<?php echo $recordAuthor['Email']?>" name="Email" placeholder="Author Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputConfirmPassword1">Image</label>
                                        <?php
                                        $authorImageURL = $recordAuthor['ImageURL'];
                                        if (!empty($authorImageURL) && file_exists($authorImageURL)) {
                                            echo "<img src='$authorImageURL' alt='Author Image' width='300px'>";
                                        } else {
                                            // Show a default placeholder image if the URL is empty or invalid
                                            echo "<img src='path_to_default_image_placeholder.jpg' alt='Default Image' class='img-fluid'>";
                                        }
                                        ?>
                                        <input type="file" name="author_image" class="form-control">
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
