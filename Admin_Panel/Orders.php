<?php
include("shared/_navbar.php");

// Initialize error and message variables
$error = "";
$message = "";

// Ensure you have a database connection here, e.g., $conn

// Fetch books from the database for the book dropdown
$bookQuery = "SELECT * FROM `books`";
$bookResult = mysqli_query($conn, $bookQuery);


$customersQuery = "SELECT * FROM `customers`";
$customersResult = mysqli_query($conn, $customersQuery);


if(isset($_POST['submit']))
{
    // Validate order details
    $customerID = $_POST['CustomerID'];
    $bookID = $_POST['BookID'];
    $orderDate = $_POST['OrderDate'];
    $status =  $_POST['status']; 
    $PaymentStatus =  $_POST['PaymentStatus'];// Set the status to "Pending" by default

    // Insert the data into the database
    $query = "INSERT INTO `orders`(`CustomerID`, `BookID`, `OrderDate`, `Status`, `PaymentStatus`) VALUES 
                                   ('$customerID','$bookID','$orderDate','$status' ,'$PaymentStatus' )";
    $run = mysqli_query($conn, $query);

    if ($run) {
        $message = "Order placed successfully!";
    } else {
        $error = "Error placing the order.";
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
                <h3 class="page-title">Order Form</h3>
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
                                <label for="CustomerID">Customer</label>
                                <select name="CustomerID" class="form-control" id="Customer ID" required>
                                    <option value="">Select a Customer ID</option>
                                    <?php while ($customers = mysqli_fetch_assoc($customersResult)): ?>
                                        <option value="<?php echo $customers['CustomerID']; ?>"><?php echo $customers['CustomerID']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="BookID">Select Book</label>
                                <select name="BookID" class="form-control" id="BookID" required>
                                    <option value="">Select a Book</option>
                                    <?php while ($book = mysqli_fetch_assoc($bookResult)): ?>
                                        <option value="<?php echo $book['BookID']; ?>"><?php echo $book['Title']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="OrderDate">Order Date</label>
                                <input type="date" name="OrderDate" class="form-control" id="OrderDate" required>
                            </div>
                            <div class="form-group">
                            <label for="status">Status</label>
                           <select class="form-control" name="status" id="status">
                            <option>Confirme</option>
                           <option>	Pending</option>
                           <option>Delivered</option>
                       
                           </select>
                     </div>

                     <div class="form-group">
                            <label for="PaymentStatus">PaymentStatus</label>
                           <select class="form-control" name="PaymentStatus" id="PaymentStatus">
                            <option>Received</option>
                           <option>Pending</option>
                         
                       
                           </select>
                     </div>
                            <button type="submit" name="submit" class="btn btn-gradient-primary m-auto d-flex">Place Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("shared/_footer.php"); ?>
