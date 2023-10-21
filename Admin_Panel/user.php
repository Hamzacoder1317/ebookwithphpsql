<?php
include("shared/_navbar.php");

if(isset($_POST['submit']))
{

$a = $_POST['uname'];
$b = $_POST['email'];
$c = $_POST['pass'];
$d = $_POST['urole'];

$query = "INSERT INTO `users`(`User_Name`, `User_Email`, `User_Password`, `User_Role_Id`)
 VALUES ('$a','$b','$c','$d')";
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
              <h3 class="page-title"> Form elements </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
              </nav>
            </div>
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" method="post">
                      <div class="form-group">
                        <label for="exampleInputName1">User Name</label>
                        <input type="text" class="form-control" name="uname" id="exampleInputName1" placeholder="User Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">User Email</label>
                        <input type="text" class="form-control" name="email" id="exampleInputName1" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">User Password</label>
                        <input type="text" class="form-control" name="pass" id="exampleInputCity1" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">User Role</label>
                        <select class="form-control" name="urole" id="exampleSelectGender">
                          <option>1</option>
                          <option>2</option>
                        </select>
                      </div>
                      <button name="submit" type="submit" class="btn btn-gradient-primary m-auto d-flex">Submit</button>
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