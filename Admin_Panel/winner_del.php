<?php
require("shared/config.php");

$deletewalarecord = $_GET ['deleteid'];
$qureyya = "DELETE FROM `Winners` WHERE `WinnerID` = '$deletewalarecord'";

$resulta = mysqli_query($conn,$qureyya);
if($resulta)
{
    header("location:winner_display.php");
}


?>