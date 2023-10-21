<?php
require("shared/config.php");

$deletewalarecord = $_GET ['deleteid1'];
$qureyy = "DELETE FROM `announcements` WHERE `AnnouncementID` = '$deletewalarecord'";

$result = mysqli_query($conn,$qureyy);
if($result)
{
    header("location:announcements-diplay.php");
}


?>