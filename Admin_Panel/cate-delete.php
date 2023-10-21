<?php
require("shared/config.php");

$deleteCategoryId = $_GET['deleteid'];
$queryDeleteCategory = "DELETE FROM `categories` WHERE `CategoryID` = '$deleteCategoryId'";

$resultDeleteCategory = mysqli_query($conn, $queryDeleteCategory);
if ($resultDeleteCategory) {
    header("location:category-diplay.php");
    exit(); 
}
?>