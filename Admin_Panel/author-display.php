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
            
              <nav aria-label="breadcrumb">
                
                 
                  <h3 class="breadcrumb-item active" aria-current="page">Authors details</h3>
               
              </nav>
            </div>
            <div class="row">
              <div class="col  stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Authors</h4>
                
                    </p>
                    <table class="table ">
                      <thead>
                        <tr>
                          
                          <th>Name</th>
             
                          <th>Website</th>
                          <th>Email</th>
                          <th>ImageURL</th>
    
                         <th>Update</th>
                         <th>Delete</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $qureyy = "SELECT * FROM `authors` ";
                        $run = mysqli_query($conn,$qureyy);
                        while($data = mysqli_fetch_assoc($run))
                        {
                        ?>
                        
                        <tr>
                        
                          <td> <?php echo $data['AuthorName'] ?></td>
                     
                          <td> <?php echo $data['Website'] ?></td>
                          <td> <?php echo $data['Email'] ?></td>
                          <td><img src="<?php echo $data['ImageURL'] ?>" > </td>
                        
                          <td> <a href="author-update.php?updateId=<?php echo $data['AuthorID']?>" class="btn btn-danger">update</a></td>
                          <td> <a href="author-delete.php?deleteid=<?php echo $data['AuthorID']?>" class="btn btn-danger">Delete</a></td>
                          
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