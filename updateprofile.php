<?php
include_once "includes/security.php";
include_once  "../admindash/includes/header.php";
include_once  "includes/navbar.php";
?>


<div class="card border-left-success  ml-5 mb-5 mr-5 p-5 shadow">
  <h5 class="card-header">Update Your Profile</h5>
  <div class="card-body">
  <?php

if(isset($_POST['edit_profile_btn']))
{
    $id = $_POST['edit_user_id'];
    
    $query = "SELECT * FROM register WHERE id='$id' ";
    $query_run = mysqli_query($link, $query);

    foreach($query_run as $row)
    {
        ?>
  <form action="updateprofile.php" method="POST">
  <input type="hidden" name="edit_id"  value="<?php echo $row['id'] ?>" >
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="description">Username</label>
      <input type="text" name="edit_username" value="<?php echo $row['username'];?>" class="form-control"   >
    </div>
    <div class="form-group col-md-6">
      <label for="serialnumber">First Name</label>
      <input type="text" name="edit_lname" value="<?php echo $row['fname'] ?>" class="form-control"   >
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="PO">Last Name</label>
      <input type="text" name="edit_fname" value="<?php echo $row['lname'] ?>" class="form-control"  >
    </div>
    <div class="form-group col-md-6">
      <label for="Class">Email</label>
      <input type="text" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control"   >
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="type">Password</label>
      <input type="password" name="edit_password"  value="<?php echo $row['password'] ?>" class="form-control">
    </div>
    <div class="form-group col-md-6">
      <label for="AccountNo">Confirm Password</label>
      <input type="password" name="edit_repassword"  value="<?php echo $row['repassword'] ?>" class="form-control"  >
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="quantity">Departments</label>
      <input type="text" name="edit_departments" value="<?php echo $row['departments'] ?>" class="form-control"  readonly >
    </div>
    <div class="form-group col-md-6">
      <label for="quantity">User Type</label>
      <input type="text" name="edit_usertype" value="<?php echo $row['usertype']?>" class="form-control" readonly >
    </div>

  </div>

  <div>
 <button type="submit" class="btn btn-primary" name="update-user">Update Profile</button>
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