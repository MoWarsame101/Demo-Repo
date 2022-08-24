<?php
include_once  "includes/security.php";
include_once  "../admindash/includes/process.php";
include_once "includes/db.php";
include_once  "../admindash/includes/functions.php";
include_once  "includes/header.php";
include_once  "includes/navbar.php";


?>
<div class="card border-left-success  ml-5 mr-5 p-5 shadow">
  <h5 class="card-header">Order New Item</h5>
  <div class="card-body ">
  <?php 
    if(isset($_SESSION['added']) && $_SESSION['added'] !='')
    {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        </strong> <?= $_SESSION['added']; ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
        
        <?php 
        unset($_SESSION['added']);
    }

?>
<form action="ordernewitem.php" method="POST">

  <div class="form-row">
    <div class="form-group col-md-10">
      <label for="inputEmail4">Description</label>
      <input type="text" name="Description" class="form-control" id="inputEmail4" placeholder="Description" onsubmit="return false">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Reason</label>
      <input type="text" name="reason" class="form-control" id="inputCity" placeholder="Reason">
    </div>

    <div class="form-group col-md-4">
      <label for="inputState">Type</label>
      <input type="text" name="Type" class="form-control" id="inputCity" placeholder="Type">
    </div>
    </div>
    <div class="form-row">
    <div class="form-group  col-md-6">
      <label for="inputZip">Account</label>
      <input type="text" name="account" class="form-control" id="inputZip" placeholder="Account">
    </div>
  <div class="form-group col-md-4">
      <label for="inputState">Class</label>
      <input type="text" name="Class" class="form-control" id="inputCity" placeholder="Class">
      </select>
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="periods">Select Your Department</label>
      <?php  populateDD("departments", "SELECT departments FROM `departments` order by departments", 0, "Select departments")
   ?>
    </div>
       <div class="form-group col-md-4">
       <label for="inputEmail4">Date</label>
      <input type="date" name="date" class="form-control" id="inputEmail4" placeholder="Date">
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Serial No</label>
      <input type="text" name="SerialNo" class="form-control" id="inputEmail4" placeholder="Description">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Location</label>
      <input type="text" name="location" class="form-control" id="inputAddress2" placeholder="Location">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="remark">Remarks</label>
      <?php  populateDD("remark", "SELECT remark FROM `remark` order by remark", 0, "Select Remarks of the Item")
   ?>
    </div>
    <div class="form-group col-md-5">
      <label for="inputState">Category</label>
      <?php  populateDD("category", "SELECT category FROM `category` order by category", 0, "Select category")
   ?>
    </div>
  </div>
  <div class="form-row">
  <table id="order-entry" class="form-group col-md-10">
    <thead>
        <tr>
            <th>Quantity</th>
            <th>Price</th>
            <th>Purchase Cost</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><input class="form-calc form-control form-qty mr-3" value="1" name="quantity"></td>
            <td><input class="form-calc form-control form-cost" value="0"  name="price"></td>
            <td><input class="form-line form-control" value="0" readonly onchange="this.value=addCommas(this.value);" name="purchaseCost"></td>
        </tr>
    </tbody>
</table>  
  </div>
  <button type="submit" name="order-asset" class="btn btn-primary mt-2">Order New Asset</button>
</form>
  </div>
</div>
</div>
<?php
include_once  "includes/script.php";
include_once  "includes/footer.php";
?>