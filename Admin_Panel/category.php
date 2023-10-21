<?php
include("shared/_navbar.php");

// Initialize error and message variables
$error = "";
$message = "";

if(isset($_POST['submit']))
{
    // Ensure you have a database connection here, e.g., $conn

    // Validate Category Name (non-empty)
    $categoryName = $_POST['CategoryName'];

    if(empty($categoryName)) {
        $error = "Category Name is required.";
    } else {
        // Insert the data into the database
        $query = "INSERT INTO `categories`(`CategoryName`) VALUES ('$categoryName')";
        $run = mysqli_query($conn, $query);

        if ($run) {
            $message = "Category added successfully!";
        } else {
            $error = "Error adding the category to the database.";
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
                <h3 class="page-title">Category Form</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Forms</a></li>
                    </ol>
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

                        <form class="forms-sample" method="POST">
                            <div class="form-group">
                                <label for="CategoryName">Category Name</label>
                                <input type="text" name="CategoryName" class="form-control" id="CategoryName" placeholder="Category Name" required>
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
