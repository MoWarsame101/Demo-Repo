<?php
include_once  "includes/security.php";
include_once  "includes/process.php";
include_once "includes/db.php";
include_once  "includes/header.php";
include_once  "includes/navbar.php";
?>

<div class="card border-left-success m-5 shadow">
  <h5 class="card-header">Request Asset</h5>
  <div class="card-body">
  <?php

if(isset($_POST['request_btn']))
{
    $id = $_POST['request_id'];
    
    $query = "SELECT id,username,Description, department, PO, Type, quantity, purchaseCost, remaining, price, requested FROM `registerasset` WHERE id='$id' ";
    $query_run = mysqli_query($link, $query);

    foreach($query_run as $row)
    {
        ?>
<form action="requestasset.php" method="POST">
  <input type="hidden" name="request_id"  value="<?php echo $row['id'] ?>" >

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="description">Description</label>
      <input type="text" name="Description" value="<?php echo $row['Description'];?>" class="form-control"  readonly >
    </div>
    <div class="form-group col-md-6">
      <label for="serialnumber">Department</label>
      <input type="text" name="department" value="<?php echo $row['department'] ?>" class="form-control"   readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="PO">PO</label>
      <input type="text" name="PO" value="<?php echo $row['PO'] ?>" class="form-control" readonly >
    </div>
    <div class="form-group col-md-6">
      <label for="Class">Type</label>
      <input type="text" name="Type" value="<?php echo $row['Type'] ?>" class="form-control"  readonly >
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="quantity">Price</label>
      <input type="text" name="price" value="<?php echo $row['price']?>" class="form-control" readonly >
    </div>
    <div class="form-group col-md-6">
      <label for="AccountNo">Purchase Cost</label>
      <input type="number" name="purchaseCost"  value="<?php echo $row['purchaseCost'] ?>" class="form-control"  readonly>
    </div>
  </div>
  <div class="form-row col-md-12">
    <table id="order-sub">
    <thead>
        <tr>
            <th>Quantity</th>
            <th>Requested</th>
            <th>remaining</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><input type="number" name="quantity"  value="<?php echo $row['quantity']?>" class="form-calc form-qty form-control" readonly></td>
            <td><input type="number" name="requested"  value="<?php echo $row['requested']?>" class="form-calc form-req form-control" ></td>
            <td><input type="number" name="remaining"  value="<?php echo $row['remaining']?>" class="form-calc form-rem form-control" readonly></td>
        </tr>
    </tbody>
</table>  
  </div>

  <div>
 <button type="submit" class="btn btn-primary" name="request-order">Request Asset</button>
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
include_once "includes/script.php";
include_once  "includes/footer.php";
?>