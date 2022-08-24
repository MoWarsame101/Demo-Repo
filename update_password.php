<?php
include_once  "includes/security.php";
include_once  "includes/process.php";
  if(isset($_POST['re_password']))
  {
  $old_pass=$_POST['old_pass'];
  $new_pass=$_POST['new_pass'];
  $re_pass=$_POST['re_pass'];
  $chg_pwd=mysqli_query($link,"select * from register WHERE id=".$_SESSION['UID']);
  $chg_pwd1=mysqli_fetch_array($chg_pwd);
  $data_pwd=$chg_pwd1['password'];
  if($data_pwd==$old_pass){
  if($new_pass==$re_pass){
    $update_pwd=mysqli_query($link,"update register set password='$new_pass',repassword='$re_pass' WHERE id=".$_SESSION['UID']);
    echo "<script>alert('Update Sucessfully'); window.location='index.php'</script>";
  }
  else{
    echo "<script>alert('Your new and Retype Password is not match'); window.location='changepassword.php'</script>";
  }

  }
  else
  {
  echo "<script>alert('Your old password is wrong'); window.location='changepassword.php'</script>";
  }}
?>
