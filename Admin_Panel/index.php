<?php
require "shared/config.php";
include "shared/_navbar.php";
?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <?php
include "shared/_sidebar.php";
?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Product Details </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
      
            
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Product_Table</h4>
                
                    </p>
                    <table class="table">
                      <thead>
                        <tr>
                        <th>Title</th>
                          <th>Author</th>
                          
                         
                          <th>Price</th>
                          <th>Category</th>
                          <th>ImageURL</th>
                         <th>Update</th>
                         <th>Delete</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $qureyy = "SELECT categories.CategoryName, AUTHORS.AuthorName , BOOKS.Title, BOOKS.ImageURL,BOOKS.BookID ,BOOKS.Price  FROM 
                        ((books
                        INNER JOIN Categories ON books.CategoryID = categories.CategoryID)
                        INNER JOIN authors ON books.AuthorID = authors.AuthorID)";
                        $run = mysqli_query($conn,$qureyy);
                        while($data = mysqli_fetch_assoc($run))
                        {
                        ?>
                        
                        <tr>
                          <td> <?php echo $data['Title'] ?></td>
                          <td> <?php echo $data['AuthorName'] ?></td>
                          <td> <?php echo $data['Price'] ?></td>
                          <td> <?php echo $data['CategoryName'] ?></td>
                          <td><img src="<?php echo $data['ImageURL']?>" ></td>
                          <td> <a href="pro_update.php?updateId=<?php echo $data['BookID']?>" class="btn btn-danger">Update</a> </td>
                          <td> <a href="del-pro.php?deleteid=<?php echo $data['BookID']?>" class="btn btn-danger">Delete</a></td>
                          
                        </tr>
<?php
}?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>



        </div>
          </div>
        </div>
          <!-- content-wrapper ends -->

          <?php
include "shared/_footer.php";
?>-