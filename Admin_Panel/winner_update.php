<?php
require("shared/config.php");
include("shared/_navbar.php");

$updateWinnerId = $_GET['updateId'];
$selectWinnerQuery = "SELECT * FROM `winners` WHERE `WinnerID` = '$updateWinnerId'";
$resultWinner = mysqli_query($conn, $selectWinnerQuery);
$recordWinner = mysqli_fetch_assoc($resultWinner);

if(isset($_POST['submit']))
{
    $winUserId = $_POST['win_user_id'];
    $prize = $_POST['Prize'];
    
    $imagePath = $recordWinner['WINNER_IMAGE']; // Preserve the existing image if not updated

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
            echo "Error uploading the image.";
            exit; // Stop execution if there's an error
        }
    }

    // Update the data in the database
    $query = "UPDATE `winners` SET `win_user_id`='$winUserId', `Prize`='$prize', `WINNER_IMAGE`='$imagePath' WHERE `WinnerID`='$updateWinnerId'";
    $run = mysqli_query($conn, $query);

    if ($run) {
        echo "<script>alert('Winner updated successfully');</script>";
    } else {
        echo "Error updating the winner: " . mysqli_error($conn);
    }
}
// Get a list of users for the dynamic dropdown
$userQuery = "SELECT `user_id`, `user_name` FROM `users`";
$resultUser = mysqli_query($conn, $userQuery);
?>

<!-- HTML form -->
<!DOCTYPE html>
<html>
<head>
    <title>Update Winner</title>
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
                    <h3 class="page-title">Update Winner Form</h3>
                </div>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Winner form</h4>
                                <form class="forms-sample" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="win_user_id">Winner User ID</label>
                                        <select class="form-control" id="win_user_id" name="win_user_id">
                                            <?php while ($userRow = mysqli_fetch_assoc($resultUser)): ?>
                                                <option value="<?php echo $userRow['user_id']; ?>" <?php echo ($userRow['user_id'] == $recordWinner['win_user_id']) ? 'selected' : ''; ?>><?php echo $userRow['user_name']; ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Prize">Prize</label>
                                        <input type="text" class="form-control" id="Prize" value="<?php echo $recordWinner['Prize']; ?>" name="Prize" placeholder="Prize">
                                    </div>
                                    <div class="form-group">
                                        
                                        <img src="<?php echo $recordWinner['WINNER_IMAGE']; ?>" width="300px" alt="Winner Image">
                                        <input type="file" name="Image" class="form-control" id="Image">
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
