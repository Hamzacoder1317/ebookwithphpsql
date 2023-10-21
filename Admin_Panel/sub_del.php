<?php
require("shared/config.php");

$deletewalarecord = $_GET ['deleteid'];
$qureyya = "DELETE FROM `subscriptions` WHERE `sub_id` = '$deletewalarecord'";

$resulta = mysqli_query($conn,$qureyya);
if($resulta)
{
    header("location:subscriptions_display.php");
}


?>