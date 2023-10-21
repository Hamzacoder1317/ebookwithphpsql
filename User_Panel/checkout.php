<?php
session_start();
require("Shared/config.php");
$id = $_SESSION['user_id'];
$price=$_GET['t'];
$currentDate = date('Y-m-d');
$q1 = "INSERT INTO `orders`(`Order_User_Id`,`Order_Price`,`OrderDate`) VALUES ('$id','$price','$currentDate')";
$res1 = mysqli_query($conn,$q1);
$or=mysqli_insert_id($conn);
    foreach($_SESSION["shopping_cart"] as $value)
    {
  $quan=$value['quantity'];
  $idd=$value['id'];
  $q="INSERT INTO `items`(`Item_Order_Id`, `Item_Book_Id`, `Quantity`)
  VALUES ('$or','$idd','$quan')";
  $res=mysqli_query($conn,$q);
    }
  session_destroy();
   echo "<script>alert('Your order has been Placed');
    window.location.href='cart.php'</script>";
?>