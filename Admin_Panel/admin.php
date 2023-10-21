<?php
include("shared/_navbar.php");
// Fetch categories from the database for the category dropdown
$roleQuery = "SELECT * FROM `role`";
$roleResult = mysqli_query($conn, $roleQuery);
if(isset($_POST['submit']))
{

$a = $_POST['name'];
$b = $_POST['email'];
$c = $_POST['password'];


$query ="INSERT INTO `admin`(`admin_name`, `admin_email`, `admin_pasword`) VALUES ('$a','$b','$c')";
$run = mysqli_query($conn, $query);


}


?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <?php
             include("shared/_sidebar.php");
         ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Admin Form  </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                 
                </ol>
              </nav>
            </div>
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" method="POST">
                      <div class="form-group">
                        <label for="exampleInputName1">ADMIN</label>
                        <input type="text" name="name" class="form-control mt-2" id="exampleInputName1" placeholder="Admin user ">
                        <input type="text" name="email" class="form-control mt-2" id="exampleInputName1" placeholder="Admin Email ">
                        <input type="password" name="password" class="form-control mt-2" id="exampleInputName1" placeholder="Admin Password ">
                      
                       
                        
                      </div>
                      <button type="submit" name="submit" class="btn btn-gradient-primary m-auto d-flex">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>

          <?php
          include("shared/_footer.php");
          ?>