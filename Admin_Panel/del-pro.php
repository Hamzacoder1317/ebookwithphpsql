<?php
require("shared/config.php");

$deletewalarecord = $_GET ['deleteid'];
$qureyya = "DELETE FROM `books` WHERE `BookID` = '$deletewalarecord'";

$resulta = mysqli_query($conn,$qureyya);
if($resulta)
{
    header("location:index.php");
}


?>