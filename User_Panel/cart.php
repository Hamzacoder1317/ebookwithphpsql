<?php
include("Shared/nav.php");
require("shared/config.php");
// session_start();
//Removing
if (isset($_POST['remove']))
{
foreach($_SESSION["shopping_cart"] as &$value)
{
          if($value['id'] === $_POST["id"]){
            $key=$value['name'];
            unset($_SESSION["shopping_cart"][$key]);
            echo "<script>alert('Item Removed')</script>";
            if(!isset($_SESSION["shopping_cart"]))
                unset($_SESSION["shopping_cart"]);
            break; // Stop the loop after we've found the product
                    }		
                }
        
}
//Plus
if (isset($_POST['add_quantity']))
{
    foreach($_SESSION["shopping_cart"] as &$value)
    {
      if($value['id'] === $_POST["id"])
      {
          $value['quantity'] +=1;
          break; // Stop the loop after we've found the product
      }
  }
}
//Minus
if (isset($_POST['sub_quantity'])){
 
    foreach($_SESSION["shopping_cart"] as &$value)
    {
        if($value['quantity']>1){
            if($value['id'] === $_POST["id"])
            {
                $value['quantity'] -=1;
                break; // Stop the loop after we've found the product
            }
        }
        if($value['quantity']==1)
        {
          if($value['id'] === $_POST["id"])
          {
            $key=$value['name'];
            unset($_SESSION["shopping_cart"][$key]);
            echo "<script>alert('Item Removed')</script>";
            if(empty($_SESSION["shopping_cart"]))
            {
                unset($_SESSION["shopping_cart"]);
            break;
        } // Stop the loop after we've found the product
        }
         }		
        }
}   
?>

<div class="col-xl-12">
<div class="mobile_menu d-block d-lg-none"></div>
</div>
</div>
</div>
</div>
</div>
</div>
</header>
<main>

<div class="container">
<div class="row">
<div class="col-xl-12">
<div class="slider-area">
<div class="slider-height2 slider-bg5 d-flex align-items-center justify-content-center">
<div class="hero-caption hero-caption2">
<h2>Cart</h2>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="container">
        <h2 class="text-center text-light mt-4">Shopping Cart</h2>
        
        <?php
if(isset($_SESSION["shopping_cart"]))
{
    $total_price = 0;
?>
  <table class="table table-light mt-4">
  <thead>
    <tr>
    <th>Product Image</th>
    <th>Product Name</th>
    <th>Add Quantity</th>
    <th>Product Quantity</th>
    <th>Product Unit Price</th>
    <th>Total Items Amount</th>
    <th>Remove Item</th>
    </tr>
  </thead>
  <tbody>
                <?php		
foreach($_SESSION["shopping_cart"] as $product)
{ 
?>
                <tr>
                    <td><img src="img/<?php echo $product['image'];?>" width="70" height="70"/></td>
                    <td>
                        <?php echo $product["name"];?><br /> 
                    </td>
                    <td>
                        <form method="POST">
                            <input type='hidden' name='id' value="<?php echo $product["id"];?>" />
                            <button class="btn btn-dark" type='submit' name="add_quantity">+</button>
                            <button class="btn btn-dark" type='submit' name="sub_quantity">-</button>
                        </form>
                    </td>
                    <td>
                        <?php echo $product["quantity"]; ?>
                    </td>
                    <td>
                        <?php echo "$".$product["price"]; ?>
                    </td>
                    <td>
                        <?php echo "$".$product["price"]*$product["quantity"]; ?>
                    </td>
                           <!-- Removing -->
        <td>
         <form method="POST">
            <input type='hidden' name='id' value="<?php echo $product["id"]; ?>"/>
            <button class="btn btn-dark fw-bold" type='submit' name="remove">Remove Item</button>
        </form>
        </td>
        <!-- Removing -->
                </tr>
                <tr class="mt-5 ms-5 d-flex m-auto text-center">
                    <td>
                       <?php
                       $total_price =$total_price+ ($product["price"]*$product["quantity"]);
                       } //Loop Ended
                       ?>
                        <h5 class = "mt-3">Total Amount:<?php echo "$".$total_price; ?></h5>
                        <a href="checkout.php?t=<?php echo $total_price?>" class="btn btn-dark">Checkout</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php
} //If Ended
   else
    {
	echo "<h3 class='text-light text-center mt-3'>Your Cart is Empty!</h3>";
	}
?>
    </div>

</main>
<?php
include("Shared/footer.php");
?>

