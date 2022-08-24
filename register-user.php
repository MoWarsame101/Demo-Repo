<?php
include_once  "includes/security.php";
include_once  "includes/header.php";
include_once  "includes/navbar.php";
?>
<style>

span #alertclass {
   width: 100%;
   display: flex;
   margin: 20px 0px 0px 0px;
   font-family: 'Poppins';
   font-weight: 400;
   text-transform: uppercase;
   font-size: 12px;
   letter-spacing: 2px;
   display: flex;
   align-items: center
}

i, .far {
   margin-right: 15px
}

.avatar-upload {
  position: relative;
  max-width: 205px;
  margin: 50px auto;
}
.avatar-upload .avatar-edit {
  position: absolute;
  right: 12px;
  z-index: 1;
  top: 10px;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}
.avatar-upload .avatar-edit input + label:after {
  content: "\f040";
  font-family: 'FontAwesome';
  color: #757575;
  position: absolute;
  top: 10px;
  left: 0;
  right: 0;
  text-align: center;
  margin: auto;
}
.avatar-upload .avatar-preview {
  width: 192px;
  height: 192px;
  position: relative;
  border-radius: 100%;
  border: 6px solid #F8F8F8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;
  border-radius: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}
/* Progress bar */
.progress .bar {
  display: block;
  height: 20px;
}
.error-list {
  display: none;
}
.progress.progress-danger .bar {
  background-color: #c13333;
}
.progress.progress-warning .bar {
  background-color: #c1bf33;
}
.progress.progress-success .bar {
  background-color: #33c133;
}

.login-form {
  margin-top: 100px;
}
</style>

<?php if($_SESSION['ROLE'] == 1){?>
  <div class="card border-left-success shadow ml-5 col-5">
  <h5 class="card-header">Add New User</h5>
  <div class="card-body">
  <form action="myprofile.php" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="role" value="1">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="description">Username</label>
      <input type="text" name="username" class="form-control" id="description" placeholder="username">
    </div>
    <div class="form-group col-md-6">
      <label for="serialnumber">First Name</label>
      <input type="text" name="fname" class="form-control" id="serialno" placeholder="First Name">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="PO">Last Name</label>
      <input type="text" name="lname" class="form-control" id="PO" placeholder="Last Name">
    </div>
    <div class="form-group col-md-6">
      <label for="Class">email </label>
      <input type="text" name="email" class="form-control" id="email" placeholder="email ">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Password</label>
      <input type="password" class="form-control required" name="password" id="password" placeholder="Enter user's password">
    </div>
    <div class="form-group col-md-6">
      <label for="quantity">Confirm Password</label>
      <input type="password" name="repassword" class="form-control" id="checkPassword" placeholder="Confirm Password" onkeyup='check()'>
      <p id="alertPassword"></p>
      <input type="hidden" name="pic" value="https://www.business2community.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640.png" class="form-control">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="periods">Select Your Department</label>
      <?php  populateDD("departments", "SELECT departments FROM `departments` order by departments", 0, "Select departments")
   ?>
    </div>
    <div class="form-group col-md-6">
      <label for="purchaseCost">User Type</label>
      <select name="usertype" value="<?php echo $row['usertype'] ?>" id="" placeholder="User Type" class="form-control">
                                       <option value="superadmin">Super Admin</option>
                                       <option value="admin">Admin</option>
                                       <option value="user">User</option>
                                   </select>
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label>Image</label>
      <input type="file" name="picture" class="form-control">

    </div>
    </div>
    <button type="submit" class="btn btn-primary btn-sm rounded" name="register-btn">Add New User</button>

    </form>
  </div>
  </div>
  <?php
}
  ?>
  </div>
  <?php
include_once  "includes/script.php";
include_once  "includes/footer.php";
?>