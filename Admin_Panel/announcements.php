<?php
include("shared/_navbar.php");

if(isset($_POST['submit']))
{
   

    
    $a = $_POST['Type'];
    $b = $_POST['Content'];

    if(empty($a) || empty($b)) {
        $error = "Type and Content are required fields.";
    } else {
     
        $rawDate = $_POST['AnnouncementDate'];
        $dateParts = explode('-', $rawDate);

        if(count($dateParts) === 3 && checkdate($dateParts[1], $dateParts[2], $dateParts[0])) {
       
            $c = $dateParts[0] . '-' . $dateParts[1] . '-' . $dateParts[2];

            // Insert the data into the database
            $query = "INSERT INTO `announcements`(`Type`, `Content`, `AnnouncementDate`) VALUES ('$a','$b','$c')";
            $run = mysqli_query($conn, $query);

            if ($run) {
                $message = "Announcement added successfully!";
            } else {
                $error = "Error adding the announcement.";
            }
        } else {
            $error = "Invalid date format. Please use YYYY-MM-DD.";
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
                <h3 class="page-title">Announcement Form</h3>
                <nav aria-label="breadcrumb">
                  
                </nav>
            </div>
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST">
                            <div class="form-group">
                                <label for="exampleInputName1">Announcement</label>
                                <input type="text" name="Type" class="form-control" id="exampleInputName1" placeholder="Type" required>
                                <input type="text" name="Content" class="form-control mt-3" id="exampleInputName1" placeholder="Content" required>
                                <input type="date" name="AnnouncementDate" class="form-control mt-3" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-gradient-primary m-auto d-flex">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Display success or error message if applicable -->
            <?php if(isset($message)): ?>
                <div class="alert alert-success">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            <?php if(isset($error)): ?>
                <div class="alert alert-danger">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include("shared/_footer.php"); ?>
