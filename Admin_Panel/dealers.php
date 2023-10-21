<?php
include("shared/_navbar.php");

// Initialize error and message variables
$error = "";
$message = "";

if(isset($_POST['submit']))
{
    // Ensure you have a database connection here, e.g., $conn

    // Validate dealer details
    $name = $_POST['Name'];
    $location = $_POST['Location'];
    $contactInfo = $_POST['ContactInfo'];

    // Insert the data into the database
    $query = "INSERT INTO `dealers`(`Name`, `Location`, `ContactInfo`) VALUES ('$name','$location','$contactInfo')";
    $run = mysqli_query($conn, $query);

    if ($run) {
        $message = "Dealer registered successfully!";
    } else {
        $error = "Error registering the dealer.";
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
                <h3 class="page-title">Dealer Registration</h3>
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
                                <label for="Name">Dealer Name</label>
                                <input type="text" name="Name" class="form-control" id="Name" placeholder="Dealer Name" required>
                            </div>
                            <div class="form-group">
                                <label for="Location">Location</label>
                                <input type="text" name="Location" class="form-control" id="Location" placeholder="Location" required>
                            </div>
                            <div class="form-group">
                                <label for="ContactInfo">Contact Info</label>
                                <textarea class="form-control" name="ContactInfo" id="ContactInfo" rows="4" placeholder="Contact Info"></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-gradient-primary m-auto d-flex">Register Dealer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("shared/_footer.php"); ?>
