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
              <h3 class="page-title"> Basic Tables </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Dealers</h4>
                
                    </p>
                    <table class="table">
                   <thead>
                        <tr>
                          
                          <th>Name</th>
                          
                          <th>location</th>
                          
                          <th>Contact info</th>
                        
    
                         <th>Update</th>
                         <th>Delete</th>

                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $qureyy = "SELECT `DealerID`, `Name`, `Location`, `ContactInfo` FROM `dealers`";
                        $run = mysqli_query($conn,$qureyy);
                        while($data = mysqli_fetch_assoc($run))
                        {
                        ?>
                        
                        <tr>
                        
                          <td> <?php echo $data['Name'] ?></td>
                          <td> <?php echo $data['Location'] ?></td>
                          <td> <?php echo $data['ContactInfo'] ?></td>
          
                          <td> <a href="deler-update.php?updateId=<?php echo $data['DealerID']?>" class="btn btn-danger">Update</a></td>
                          <td> <a href="deler-delete.php?deleteid=<?php echo $data['DealerID']?>" class="btn btn-danger">Delete</a></td>
                          
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



