<?php
require("shared/config.php");

$deletewalarecord = $_GET ['deleteid'];
$qureyya = "DELETE FROM `users` WHERE `user_id` = '$deletewalarecord'";

$resulta = mysqli_query($conn,$qureyya);
if($resulta)
{
    header("location:customers-diplay.php");
}


?>