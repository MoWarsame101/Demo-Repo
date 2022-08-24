<?php
include_once "includes/security.php";
include "includes/header.php";
include "includes/navbar.php";
?>
<div class="card border-left-success  m-5">
  <h5 class="card-header">Add New Department</h5>
  <div class="card-body">
  <form action="addnewdept.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="description">Add new Department</label>
      <input type="text" name="departments" class="form-control" id="description" placeholder="Department">
    </div>
    <div class="form-group col-md-6">
      <label for="serialnumber">Add new Company</label>
      <input type="text" name="company" class="form-control" id="serialno" placeholder="Company">
    </div>
  </div>

  <div class="form-row">

    <button type="submit" class="btn btn-primary btn-sm rounded" name="new-depart">Add New department</button>
  </div>
  
  </div>

   
   

</form>

  </div>
  </div>
           


<?php
include "includes/script.php";
include "includes/footer.php";
?>