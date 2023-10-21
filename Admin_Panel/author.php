<?php
include("shared/_navbar.php");

$error = "";
$message = "";

if(isset($_POST['submit']))
{

    $authorName = $_POST['AuthorName'];

    if(empty($authorName)) {
        $error = "Author Name is required.";
    } else {

      
        $website = $_POST['Website'];
        $email = $_POST['Email'];

        // Process and validate the image upload
        $imagePath = ''; // Initialize the image path
        if ($_FILES['AuthorImage']['error'] == 0) {
            $imageFileName = $_FILES['AuthorImage']['name'];
            $imageFileType = pathinfo($imageFileName, PATHINFO_EXTENSION);

            // Check if the file is an image
            $validImageTypes = array('jpg', 'jpeg', 'png', 'gif');
            if (in_array(strtolower($imageFileType), $validImageTypes)) {
                $uploadDirectory = 'image/author_images/'; // Specify the directory where you want to store author images
                $targetFilePath = $uploadDirectory . $imageFileName;
                
                if (move_uploaded_file($_FILES['AuthorImage']['tmp_name'], $targetFilePath)) {
                    $imagePath = $targetFilePath;
                } else {
                    $error = "Error uploading the author image.";
                }
            } else {
                $error = "Invalid image file type. Supported types: jpg, jpeg, png, gif.";
            }
        }

        if (empty($error)) {
            // Insert the data into the database along with the image path
            $query = "INSERT INTO `authors`(`AuthorName`,  `Website`, `Email`, `ImageURL`) VALUES ('$authorName','$website','$email','$imagePath')";
            $run = mysqli_query($conn, $query);

            if ($run) {
                $message = "Author added successfully!";
            } else {
                $error = "Error adding the author to the database.";
            }
        }
    }
}
?>

<!-- HTML form -->
<div class="container-fluid page-body-wrapper">
    <!-- Sidebar -->
    <?php include("shared/_sidebar.php"); ?>
    <!-- Main content -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Author Form</h3>
                <nav aria-label="breadcrumb">
                
                </nav>
            </div>
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <?php if(!empty($error)): ?>
                            <div class="alert alert-danger">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>

                        <?php if(!empty($message)): ?>
                            <div class="alert alert-success">
                                <?php echo $message; ?>
                            </div>
                        <?php endif; ?>

                        <form class="forms-sample" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputName1">Author Name</label>
                                <input type="text" name="AuthorName" class="form-control" id="exampleInputName1" placeholder="Author Name" required>
                            </div>
                           
                            <div class="form-group">
                                <label for="exampleInputName2">Website</label>
                                <input type="text" name="Website" class="form-control" id="exampleInputName2" placeholder="Website">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName3">Email</label>
                                <input type="email" name="Email" class="form-control" id="exampleInputName3" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="AuthorImage">Author Image</label>
                                <input type="file" name="AuthorImage" class="form-control" id="AuthorImage">
                            </div>
                            <button type="submit" name="submit" class="btn btn-gradient-primary m-auto d-flex">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("shared/_footer.php"); ?>
