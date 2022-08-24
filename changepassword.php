<?php
include_once "includes/security.php";
include_once "includes/header.php";
include_once "includes/navbar.php";
?>
<div class="row justify-content-center">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">

          <form action="update_password.php" method="post">
            <div class="form-group">
              <label for="exampleInputPassword1" style="">Old Password</label>
              <input type="password" class="form-control" name="old_pass" id="exampleInputPassword1" placeholder="Old Password...">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1" style="">New Password</label>
              <input type="password" class="form-control" name="new_pass" id="exampleInputPassword1" placeholder="New Password...">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1" style="">Re-Type New Password</label>
              <input type="password" class="form-control" name="re_pass" id="exampleInputPassword1" placeholder="Re-Type New Password...">
            </div>
            <button type="submit" name="re_password" class="btn btn-primary">Submit</button>
          </form>

          </div>
          </div>
          </div>
          </div>
    </div>
    <?php
include "includes/script.php";
include "includes/footer.php";
?>