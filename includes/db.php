<?php
session_start();
$hostName = "localhost";
$userName = "root";
$password = "";
$databaseName = "somtelasset";
 $link = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($link->connect_error) {
  die("Connection failed: " . $link->connect_error);
}
?>