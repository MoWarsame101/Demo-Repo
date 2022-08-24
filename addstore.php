<?php
include_once  "includes/security.php";
include_once "includes/db.php";
include_once  "includes/header.php";
include_once  "includes/navbar.php";
include_once  "includes/process.php";
?>

<div class="card border-left-success  m-5">
  <h5 class="card-header">Add New Warehouse</h5>
  <div class="card-body">
  <form action="addnewdept.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="description">Add new Warehouse</label>
      <input type="text" name="warehouse" class="form-control" id="description" placeholder="New Warehouse">
    </div>
    <div class="form-group col-md-6">
      <label for="serialnumber">Add new location</label>
      <input type="text" name="location" class="form-control" id="serialno" placeholder="New Location">
    </div>
  </div>

  <div class="form-row">

    <button type="submit" class="btn btn-primary btn-sm rounded" name="warehouse-location">Add New Warehouse</button>
  </div>
  
  </div>

   
   

</form>

  </div>
  </div>

<?php
include_once  "includes/script.php";
include_once  "includes/footer.php";
?>