<?php
include("shared/_navbar.php");
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
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputName1">Quantity</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Quantity">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Item Order</label>
                        <select class="form-control" id="exampleSelectGender">
                          <option>1</option>
                          <option>2</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Item Product</label>
                        <select class="form-control" id="exampleSelectGender">
                          <option>1</option>
                          <option>2</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-gradient-primary m-auto d-flex">Submit</button>
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