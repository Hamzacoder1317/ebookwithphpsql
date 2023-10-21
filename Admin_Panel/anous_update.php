<?php
require("shared/config.php");
include("shared/_navbar.php");

$updateAnnouncementId = $_GET['updateId'];
$selectAnnouncement = "SELECT * FROM `announcements` WHERE `AnnouncementID` = '$updateAnnouncementId'";
$resultAnnouncement = mysqli_query($conn, $selectAnnouncement);
$recordAnnouncement = mysqli_fetch_assoc($resultAnnouncement);

if(isset($_POST['submit']))
{
  $type = $_POST['Type'];
  $content = $_POST['Content'];
  $announcementDate = $_POST['AnnouncementDate'];

  $queryAnnouncement = "UPDATE `announcements` SET `Type`='$type', `Content`='$content', `AnnouncementDate`='$announcementDate' WHERE `AnnouncementID`='$updateAnnouncementId'";

  $runAnnouncement = mysqli_query($conn, $queryAnnouncement);

  if($runAnnouncement)
  {
      echo "<script>alert('Announcement Updated');</script>";
  }
  else
  {
      echo mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Announcement</title>
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
                    <h3 class="page-title">Update Announcement Form</h3>
                </div>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Announcement form</h4>
                                <p class="card-description">Basic form layout</p>
                                <form class="forms-sample" method="POST">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Type</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $recordAnnouncement['Type']?>" name="Type" placeholder="Announcement Type">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Content</label>
                                        <textarea class="form-control" id="exampleInputPassword1" name="Content" placeholder="Announcement Content"><?php echo $recordAnnouncement['Content']?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputConfirmPassword1">Announcement Date</label>
                                        <input type="text" class="form-control" id="exampleInputConfirmPassword1" value="<?php echo $recordAnnouncement['AnnouncementDate']?>" name="AnnouncementDate" placeholder="Announcement Date">
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
