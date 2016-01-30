<?php
//db connection parameters
$databaseName = "fau"; 
$databaseHostname = "localhost";
$username = "xxxxx"; 
$password = "xxxxxxxx";

$link = mysqli_connect($databaseHostname, $username, $password, $databaseName);

if(!$link){
  echo "Connection to database failed.";
  echo mysql_error($link);
}

session_start();

//if not already logged in
//initialize session variables to defaults
if(!isset($_SESSION['loggedIn'])){
  $_SESSION['loggedIn'] = false;
}
if(!isset($_SESSION['userID'])){
  $_SESSION['userID'] = -1;
}
if(!isset($_SESSION['username'])){
  $_SESSION['username'] = -1;
}


?>
