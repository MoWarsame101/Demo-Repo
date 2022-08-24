<?php
include_once  "includes/security.php";
include_once  "includes/process.php";
include_once "includes/db.php";
include_once  "includes/header.php";
include_once  "includes/navbar.php";
if(!isset($_SESSION['username']) || $_SESSION['username'] == ""){
  header('Location: index.php');
}else {
  $user = $_SESSION['username'];
}
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
<div class="row">
<div class="card border-left-success ml-5 shadow col-5">
  <h5 class="card-header m-0"> Your Profile</h5>
  <div class="card-body">
  <form action="myprofile.php" method="POST" enctype="multipart/form-data">
  <?php 

$checkUser = "SELECT * FROM `register` WHERE `email` = '$user'";
$result = mysqli_query($link, $checkUser);
$counUser = mysqli_num_rows($result) > 0;
if(!$counUser){
    echo "<script>alert('Please login first')</script>";
    echo "<script>window.location.assign('./')</script>";
}

if($counUser){
    while($row = mysqli_fetch_assoc($result)){

?>
  <div class="form-row col-12">
  <?php	echo "<img src='img/".$row['pic']."' height = 100px width = 100px>"?>
    <div class="form-group col-md-12 p-0">
      <button type="button" class="btn btn-primary btn-sm mt-5" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Change Pic</button>

      <hr>
<!-- Modal -->
<div class="modal" id="staticBackdrop" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Change Profile <Picture></Picture></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
      <div class="container">
    <div class="avatar-upload">
        <div class="avatar-edit">
            <input type='file' name="edit_picture" id="imageUpload" />
            <label for="imageUpload"></label>
        </div>
        <div class="avatar-preview">
            <div id="imagePreview" style="background-image: url(' https://www.business2community.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640.png');">
            </div>
        </div>
    </div>
</div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="change-profile">Change Profile</button>

    
      </div>
    </div>
  </div>
</div>
      <h6 class="font-bold"><?php echo $row['username'];?></h6>
      <hr>
      <h6><?php echo $row['email'];?></h6>
      <hr>
      <h6><?php echo $row['usertype'];?></h6>
      <hr>
      </div>
  </div>
  
</form>
<div class="form-row">
  <div class="form-group col-md-6">
  <form action="updateprofile.php" method="post" >
                                        <input type="hidden" name="edit_user_id" value="<?php echo $row['id']; ?>">
                                       <button class="btn btn-primary" type="submit" name="edit_profile_btn" data-toggle="tooltip" data-placement="top" title="Edit">Update Profile</button>
                                       
               
                                    </form>
  </div>
  </div>
<?php
    }
}
?>
  </div>
  </div>
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
      <input type="text" name="email" class="form-control" id="Class" placeholder="email ">
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
  <?php if($_SESSION['ROLE'] == 1){?>
  <div class="row">
  <div class="card shadow border-left-success col-11 m-5">
    <div class="card-header">
    <h5>List of users  </h5>
    </div>
  

  <div class="card-body">


  <table id="datatablesSimple" class="table  " style="width:100%">
  <?php
                $query = "SELECT * FROM register";
                $query_run = mysqli_query($link, $query);
            ?>
        <thead>
            <tr>
                
                <th>ID</th>
                <th>Image</th>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>department</th>
                <th>Usertype</th>
                <th>Change Usertype</th>

            </tr>
        </thead>
        <tbody>
        <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                            <tr>
                               
                                <td><?php  echo $row['id']; ?></td>
                                <td><?php	echo "<img src='img/".$row['pic']."' height = 30px width = 30px>"?></td>
                                <td><?php  echo $row['username']; ?></td>
                                <td><?php  echo $row['fname']; ?></td>
                                <td><?php  echo $row['lname']; ?></td>
                                <td><?php  echo $row['email']; ?></td>
                                <td><?php  echo $row['departments']; ?></td>
                                <td><?php  echo $row['usertype']; ?></td>
                            
                <td> 
         
                <form action="myprofile.php" method="POST" class="form-inline" onsubmit="openModal()" id="myForm">    
                <input type="hidden" name="edit_user_id" value="<?php echo $row['id'] ?>">
<button class="btn btn-success btn-sm rounded-0 m-1" name="admin-user" type="submit"><i class="fa fa-user"></i>Admin</button>
<button class="btn btn-secondary btn-sm rounded-0 m-1" name="normal-user" type="submit"><i class="fa fa-user"></i>User</button>
<button class="btn btn-danger btn-sm rounded-0 m-1" name="delete-user" type="submit"><i class="fa fa-trash"></i></button>
<button type="button" class="btn btn-primary btn-sm rounded-0 m-1 editbtn"> <i class="fa fa-print"></i> </button>
    </form>

                                </td>
          
            <?php
                            }
                        }
            ?>
             </tr>
            
    </table>
   <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal" id="editmodal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editmodal"> Edit User Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

          

                    <div class="modal-body">

                    <form action="users.php" method="POST" id="form-user">
                        <input type="hidden" name="col0" id="update_id">

                        <div class="form-group">
                            <label> First Name </label>
                            <input type="text" name="fname" id="col1" class="form-control"
                                placeholder="Enter First Name">
                        </div>

                        <div class="form-group">
                            <label> Last Name </label>
                            <input type="text" name="lname" id="col2" class="form-control"
                                placeholder="Enter Last Name">
                        </div>

                        <div class="form-group">
                            <label> Course </label>
                            <input type="text" name="course" id="col3" class="form-control"
                                placeholder="Enter Course">
                        </div>

                        <div class="form-group">
                            <label> Phone Number </label>
                            <input type="text" name="contact" id="col4" class="form-control"
                                placeholder="Enter Phone Number">
                        </div>
                    </div>
                    </form>
                    <div class="modal-footer">
                        <button class="btn btn-success btn-sm  ml-5" onclick="printContent('form-user')">Print Content</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
              

            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            <?php
  }
            ?>
  </div>
           


<?php
include "includes/script.php";
include "includes/footer.php";
?>