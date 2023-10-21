<?php
include("shared/_navbar.php");

// Initialize error and message variables
$error = "";
$message = "";

// Ensure you have a database connection here, e.g., $conn

// Fetch customers and books from the database for the dropdowns
$customerQuery = "SELECT * FROM `users`";
$customerResult = mysqli_query($conn, $customerQuery);


if(isset($_POST['submit']))
{
    // Validate subscription details
    $userID = $_POST['CustomerID'];
  
    $startDate = $_POST['StartDate'];
    $endDate = $_POST['EndDate'];

    // Insert the data into the database
    $query = "INSERT INTO `subscriptions`(`sub_user_id`, `StartDate`, `EndDate`) VALUES ('$userID','$startDate','$endDate ')";
    $run = mysqli_query($conn, $query);

    if ($run) {
        $message = "Subscription added successfully!";
    } else {
        $error = "Error adding the subscription.";
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
                <h3 class="page-title">Subscription Form</h3>
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
                                
                                <select name="CustomerID" class="form-control" id="CustomerID" required placeholder="User Name">
                                    <option value="">Select a Customer</option>
                                    <?php while ($customer = mysqli_fetch_assoc($customerResult)): ?>
                                        <option value="<?php echo $customer['user_id']; ?>"><?php echo $customer['user_name']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                          
                            <div class="form-group">
                                <input type="date" name="StartDate" class="form-control" id="StartDate" required  placeholder="Start Date">
                            </div>
                            <div class="form-group">
                               
                                <input type="date" name="EndDate" class="form-control" id="EndDate" required  placeholder="End Date">
                            </div>
                            <button type="submit" name="submit" class="btn btn-gradient-primary m-auto d-flex">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("shared/_footer.php"); ?>
