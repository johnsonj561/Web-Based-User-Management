<?php
$feedback = "";

if(isset($_GET['account-update'])){
  switch($_GET['account-update']){
    case 'password-error':
      $feedback .= "<p class='user-feedback text-center'>Passwords do not match. Please try again.</p>";
      break;
    case 'db-error':
      $feedback .= "<p class='user-feedback text-center'>An error occurred while updating database. Please try again.</p>";
      break;
    case 'success':
      $feedback .= "<p class='user-feedback blue text-center'>Your account has been updated. Thank you.</p>";
      break;
    default:
  }
}

if(isset($_GET['register'])){
  switch($_GET['register']){
    case 'username-error':
      $feedback .= "<p class='user-feedback text-center'>The username you entered is already in use. Please choose a new username.</p>";
      break;
    case 'password-error':
      $feedback .= "<p class='user-feedback text-center'>Passwors do not match. Please try again.</p>";
      break;
    case 'success':
      $feedback .= "<p class='user-feedback blue text-center'>Registration successful. Log in above to begin.</p>";
      break;
    default:
  }
}

if(isset($_GET['login'])){
  switch($_GET['login']){
    case 'username-error':
      $feedback .= "<p class='user-feedback text-center'>The username you entered was not valid, Please try again.</p>";
      break;
    case 'password-error':
      $feedback .= "<p class='user-feedback text-center'>The password you enetered was not valid, Please try again.</p>";
      break;
    default:
  }
}

?>