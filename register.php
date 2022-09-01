<?php
include_once  "includes/process.php";
include_once "includes/db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Demo Application </title>
      <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="img/demologo.png" />
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-dark">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                    <img src="img/demoLogo.png" alt="Girl in a jacket" width="400" height="300">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form action="register.php" method="POST" enctype="multipart/form-data">
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
    <button type="submit" class="btn btn-primary btn-sm rounded" name="register">Add New User</button>

    </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="recover_psw.php">Forgot Password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function(){
        if(password.type === "password"){
            password.type = 'text';
        }else{
            password.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });
</script>

</body>

</html>


