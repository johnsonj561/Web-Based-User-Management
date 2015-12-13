<?php
require_once("connect.php");

//if already logged in, re-direct to home page
//we assume that user arrived at this page by mistake if already signed in 
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']){
  echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
}
//else, attemp to log in user
else{
  $username = strip_tags($_POST['username']);
  $password = strip_tags($_POST['password1']);
  $salt = "X1K$6B8";
  $query = "SELECT * FROM Users where Username = '$username';";
  $result = mysqli_query($link, $query);

  //if we have a match, Check the passwords
  if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
    //get hashed value of password to check against database password
    $password = crypt($password, $salt);
    //if passwords match
    if($password == $row['Password']){
      //store user info in SESSION variables
      $_SESSION['userID'] = $row['UserID'];
      $_SESSION['loggedIn'] = true;
      $_SESSION['username'] = $username;
      $_SESSION['userType'] = $row['UserType'];

      //re-direct to home page with successful log in feedback
      echo "<meta http-equiv='refresh' content='0; url=../index.php?login=success'>";
    }

    else{ //else passwords do not match, return to home page with failed log in feedback
      echo"<meta http-equiv='refresh' content='0; url=../index.php?login=bad-password'>";
    }

    mysqli_free_result($result);
  }
  //else username does not exist - return user to home screen
  else{ 
    echo"<meta http-equiv='refresh' content='0; url=../index.php?login=bad-username'>";
  }
}
?>