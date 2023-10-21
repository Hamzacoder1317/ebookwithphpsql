<?php
include("shared/_navbar.php");

// Initialize error and message variables
$error = "";
$message = "";
$customerQuery = "SELECT * FROM `users`";
$customerResult = mysqli_query($conn, $customerQuery);

if(isset($_POST['submit']))
{
    $winUserID = $_POST['CustomerID'];
    $prize = $_POST['Prize'];
    
    $imagePath = ''; 

    if(isset($_FILES['Image']) && $_FILES['Image']['error'] === UPLOAD_ERR_OK)
    {
        $tempName = $_FILES['Image']['tmp_name'];
        $imageName = $_FILES['Image']['name'];

        // Generate a unique file name to prevent overwriting existing files
        $uniqueFileName = uniqid() . "_" . $imageName;

        $imagePath = $uniqueFileName;
        
        if(move_uploaded_file($tempName, $imagePath))
        {
            // File uploaded successfully
        }
        else
        {
            $error = "Error uploading the image.";
        }
    }
    else
    {
        $error = "No image file uploaded.";
    }

    // Insert the data into the database
    $query = "INSERT INTO `winners`( `win_user_id`, `Prize`, `WINNER_IMAGE`)  VALUES ('$winUserID', '$prize', '$imagePath')";
    $run = mysqli_query($conn, $query);

    if ($run) {
        $message = "Winner registered successfully!";
    } else {
        $error = "Error registering the winner: " . mysqli_error($conn);
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
                <h3 class="page-title">Winner Registration</h3>
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

                        <form class="forms-sample" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <select name="CustomerID" class="form-control" id="CustomerID" required placeholder="Winner_Name">
                                    <option value="">Select a Customer</option>
                                    <?php while ($customer = mysqli_fetch_assoc($customerResult)): ?>
                                        <option value="<?php echo $customer['user_id']; ?>"><?php echo $customer['user_name']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="Prize" class="form-control" id="Prize" placeholder="Prize" required>
                            </div>
                            <div class="form-group">
                                <input type="file" name="Image" class="form-control" id="Image">
                            </div>
                            <button type="submit" name="submit" class="btn btn-gradient-primary m-auto d-flex">Register Winner</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("shared/_footer.php"); ?>
