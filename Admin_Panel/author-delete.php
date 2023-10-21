<?php
require("shared/config.php");

$deleteAuthorId = $_GET['deleteid'];
$queryDelete = "DELETE FROM `authors` WHERE `AuthorID` = '$deleteAuthorId'";

$resultDelete = mysqli_query($conn, $queryDelete);
if ($resultDelete) {
    header("location:author-display.php");
    exit();
}
?>
