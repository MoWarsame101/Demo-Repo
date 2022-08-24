<?php
include "includes/db.php";
if(isset($_POST['logout_btn']))
{
    session_destroy();
    unset($_SESSION['username']);
    header('Location: login.php');
    exit();
}
?>
?>

