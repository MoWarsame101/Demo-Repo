<?php
include "includes/db.php";
ob_start();
if($link)
{
    //echo "Database Connected";
}
else
{
    echo "Database is Not Connected";
}

if(!$_SESSION['username'])
{
    header('Location: login.php');
}

ob_end_flush();
?>