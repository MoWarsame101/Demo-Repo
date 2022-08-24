<?php
include_once  "includes/security.php";
include_once  "includes/header.php";
include_once  "includes/navbar.php";
?>

<div class="card border-left-success ">
  <h5 class="card-header">Update Asset</h5>
  <div class="card-body">
  <?php

if(isset($_POST['update_asset']))
{
    $id = $_POST['update_id'];
    
    $query = "SELECT * FROM registerasset WHERE id='$id' ";
    $query_run = mysqli_query($link, $query);

    foreach($query_run as $row)
    {
        ?>
  <form action="updateasset.php" method="POST">
  <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="description">Description</label>
      <input type="text" name="edit_Description" value="<?php echo $row['Description'] ?>" class="form-control"  placeholder="description"  >
    </div>
    <div class="form-group col-md-6">
      <label for="serialnumber">Serial No</label>
      <input type="text" name="edit_SerialNo" value="<?php echo $row['SerialNo'] ?>" class="form-control"  placeholder="Serial Number" >
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="PO">PO</label>
      <input type="text" name="edit_PO" value="<?php echo $row['PO'] ?>" class="form-control"  placeholder="PO" >
    </div>
    <div class="form-group col-md-6">
      <label for="Class">Class</label>
      <input type="text" name="edit_Class" value="<?php echo $row['Class'] ?>" class="form-control"  placeholder="Class" >
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="type">Type</label>
      <input type="text" name="edit_Type"  value="<?php echo $row['Type'] ?>" class="form-control" placeholder="type">
    </div>
    <div class="form-group col-md-6">
      <label for="AccountNo">Accoun No</label>
      <input type="text" name="edit_AccountNo"  value="<?php echo $row['AccountNo'] ?>" class="form-control"  placeholder="AccountNo">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="quantity">Quantity</label>
      <input type="number" name="edit_quantity" value="<?php echo $row['quantity'] ?>" class="form-control"  placeholder="Quantity" >
    </div>
    <div class="form-group col-md-6">
      <label for="purchaseCost">Purchase Cost</label>
      <input type="number" name="edit_purchaseCost" value="<?php echo $row['purchaseCost'] ?>" class="form-control" placeholder="Purchase Cost" >
    </div>
  </div>
  <div class="form-group">
    <label for="location">Location</label>
    <input type="text" name="edit_location"  value="<?php echo $row['location'] ?>" class="form-control"  placeholder="location">
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="periods">Period (Years) of date</label>
      <input type="number" name="edit_periods"  value="<?php echo $row['periods'] ?>" class="form-control" placeholder="periods">
    </div>
 
  </div>
  <div class="form-row ">

    <div class="form-group col-md-4">
      <label for="inputState">Remark</label>
      <select id="inputState" name="edit_remark"  value="<?php echo $row['remark'] ?>" class="form-control">
        <option selected>New</option>
        <option>Scrap</option>
        <option>Ok</option>
        <option>Need Maintanance</option>
      </select>
    </div>

  </div>

  <div>
 <button type="submit" class="btn btn-primary" name="updatebtn">Update Asset</button>
  </div>
   
   
   
 
</form>
<?php
                }
            }
        ?>
  </div>
  </div>
  </div>
           



<?php
include_once  "includes/script.php";
include_once  "includes/footer.php";
?>