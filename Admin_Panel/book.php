<?php
include("shared/_navbar.php");
include("shared/config.php");

$error = "";
$message = "";

$authorQuery = "SELECT * FROM `authors`";
$authorResult = mysqli_query($conn, $authorQuery);

$categoryQuery = "SELECT * FROM `categories`";
$categoryResult = mysqli_query($conn, $categoryQuery);

if (isset($_POST['submit'])) {
    $title = $_POST['Title'];
    $authorID = $_POST['AuthorID'];
    $description = $_POST['Description'];
    $price = $_POST['Price'];
    $lastRevisionDate = $_POST['LastRevisionDate'];
    $categoryID = $_POST['CategoryID']; // Newly added category field


    if (isset($_FILES['BookImage']) && $_FILES['BookImage']['error'] === UPLOAD_ERR_OK) {
        $tempName = $_FILES['BookImage']['tmp_name'];
        $imagePath = '' . $_FILES['BookImage']['name']; // Use the original image name
    
        if (move_uploaded_file($tempName, $imagePath)) {
            // File uploaded successfully
        } else {
            $error = "Error uploading the image.";
        }
    }

    // Use prepared statements to insert data into the books table
    $query = "INSERT INTO `books`(`Title`, `AuthorID`, `Description`, `Price`, `LastRevisionDate`, `ImageURL`, `CategoryID`) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssss", $title, $authorID, $description, $price, $lastRevisionDate, $imagePath, $categoryID);

        if (mysqli_stmt_execute($stmt)) {
            $message = "Book added successfully!";
        } else {
            $error = "Error adding the book to the database: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        $error = "Error preparing the statement: " . mysqli_error($conn);
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
                <h3 class="page-title">Book Form</h3>
                <nav aria-label="breadcrumb">
                </nav>
            </div>
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <?php if (!empty($error)): ?>
                            <div class="alert alert-danger">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($message)): ?>
                            <div class="alert alert-success">
                                <?php echo $message; ?>
                            </div>
                        <?php endif; ?>

                        <form class="forms-sample" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                                <label for="Title">Book Title</label>
                                <input type="text" name="Title" class="form-control" id="Title" placeholder="Book Title" required>
                            </div>
                            <div class="form-group">
                                <label for="AuthorID">Author</label>
                                <select name="AuthorID" class="form-control" id="AuthorID" required>
                                    <option value="">Select an Author</option>
                                    <?php while ($author = mysqli_fetch_assoc($authorResult)): ?>
                                        <option value="<?php echo $author['AuthorID']; ?>"><?php echo $author['AuthorName']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Description">Description</label>
                                <textarea class="form-control" name="Description" id="Description" rows="4" placeholder="Description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="CategoryID">Category</label>
                                <select name="CategoryID" class="form-control" id="CategoryID" required>
                                    <option value="">Select a Category</option>
                                    <?php while ($category = mysqli_fetch_assoc($categoryResult)): ?>
                                        <option value="<?php echo $category['CategoryID']; ?>"><?php echo $category['CategoryName']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Price">Price</label>
                                <input type="text" name="Price" class="form-control" id="Price" placeholder="Price" required>
                            </div>
               
                            <div class="form-group">
                                <label for="LastRevisionDate">Last Revision Date</label>
                                <input type="date" name="LastRevisionDate" class="form-control" id="LastRevisionDate" required>
                            </div>
                            <div class="form-group">
    <label for="BookImage">Book Image</label>
    <input type="file" name="BookImage" class="form-control" id="BookImage" accept=".jpg, .jpeg, .png" required>
    <small class="form-text text-muted">Accepted formats: JPG, JPEG, PNG</small>
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
