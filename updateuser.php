<?php
include_once "includes/security.php";
include "includes/header.php";
include "includes/navbar.php";
?>
<div class="card border-left-success ">
  <h5 class="card-header">Update User</h5>
  <div class="card-body">
  <?php

if(isset($_POST['edit_user_btn']))
{
    $id = $_POST['edit_user_id'];
    
    $query = "SELECT * FROM register WHERE id='$id' ";
    $query_run = mysqli_query($link, $query);

    foreach($query_run as $row)
    {
        ?>
  <form action="updateuser.php" method="POST">
  <input type="hidden" name="edit_id"  value="<?php echo $row['id'] ?>" >
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="description">Username</label>
      <input type="text" name="edit_username" value="<?php echo $row['username'] ?>" class="form-control" id="description" placeholder="description">
    </div>
    <div class="form-group col-md-6">
      <label for="serialnumber">First Name</label>
      <input type="text" name="edit_fname" value="<?php echo $row['fname'] ?>" class="form-control" id="serialno" placeholder="Serial Number">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="PO">Last Name</label>
      <input type="text" name="edit_lname" value="<?php echo $row['lname'] ?>" class="form-control" id="PO" placeholder="PO">
    </div>
    <div class="form-group col-md-6">
      <label for="Class">Email</label>
      <input type="email" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control" id="Class" placeholder="Class">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="type">Password</label>
      <input type="text" name="edit_password" value="<?php echo $row['password'] ?>" class="form-control" id="type" placeholder="type">
    </div>
    <div class="form-group col-md-6">
      <label for="AccountNo">Confirm Password</label>
      <input type="text" name="edit_repassword" value="<?php echo $row['repassword'] ?>" class="form-control" id="AccountNo" placeholder="AccountNo">
    </div>
  </div>
  <div class="form-group col-md-6">
      <label for="periods">Select Your Department</label>
      <?php  populateDD("departments", "SELECT departments FROM `departments` order by departments", 0, "Select departments")
   ?>
    </div>

 

  <div class="form-row">
  <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="usertype" class="form-group">Select a usertype</label>
                                   <select name="usertype" value="<?php echo $row['usertype'] ?>" id="" placeholder="usertype" class="form-control">
                                       <option value="admin">Admin</option>
                                       <option value="user">User</option>
                                   </select>
                                    </div>
               
    </div>
    <button type="submit" class="btn btn-primary" name="update-user">Update User</button>
  </div>
</form>
<?php
                }
            }
        ?>
  </div>

           


<?php
include "includes/script.php";
include "includes/footer.php";
?>