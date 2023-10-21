<?php
require("shared/config.php");

$deleteCategoryId = $_GET['deleteid'];
$queryDeleteCategory = "DELETE FROM `dealers` WHERE `DealerID` = '$deleteCategoryId'";

$resultDeleteCategory = mysqli_query($conn, $queryDeleteCategory);
if ($resultDeleteCategory) {
    header("location:dealers_diplay.php");
    exit(); 
}
?>