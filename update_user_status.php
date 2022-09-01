<?php
include_once "includes/db.php";
$uid=$_SESSION['UID'];
$time=time()+10;
$res=mysqli_query($link,"UPDATE login SET last_login=$time where id=$uid");
?>