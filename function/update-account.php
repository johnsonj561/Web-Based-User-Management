<?php
require_once('connect.php');

//flag used to represent successful registration and valid username
$isValidPassword = false;

//get userID from session
$userID = $_SESSION['userID'];

//crypt password to create hash for safe DB storage
$salt = "X1K$6B8";
$password1 = strip_tags($_POST['password1']);
$password2 = strip_tags($_POST['password2']);
$password1 = crypt($password1, $salt);
$password2 = crypt($password2, $salt);

//make sure passwords match
if(validatePasswords($password1, $password2)){
  $isValidPassword = true;
}

//If username is valid and passwords match - update database!
if($isValidPassword){
  //collect user info
  $firstName = strip_tags($_POST['firstName']);
  $lastName = strip_tags($_POST['lastName']);
  $street = strip_tags($_POST['street']);
  $city = strip_tags($_POST['city']);
  $state = strip_tags($_POST['state']);
  $zip = strip_tags($_POST['zip']);
  $telephone = strip_tags($_POST['telephone']);
  $email = strip_tags($_POST['email']);
  ///get user's Avatar selection
  $avatar = strip_tags($_POST['avatar-dropdown']);

  //Update UserInfo table with new user information
  $query = "UPDATE UserInfo SET 
          FirstName = '$firstName',
          LastName = '$lastName',
          Street = '$street',
          City = '$city',
          State = '$state',
          Zip = '$zip',
          Telephone = '$telephone',
          Email = '$email'
          WHERE UserID = '$userID';";
  $result1 = mysqli_query($link, $query);

  //Update User table with new password
  $query = "UPDATE Users SET
          Password = '$password1'
          WHERE UserID = '$userID';";
  $result2 = mysqli_query($link, $query);

  //Update Avatars table with new UserID:Avatar pair
  $query = "UPDATE Avatars SET
            AvatarID = '$avatar'
            WHERE UserID = '$userID';";
  $result3 = mysqli_query($link, $query);

}

//create appropriate user message - dependant on registration status 
if(!$isValidPassword){
  echo "<meta http-equiv='refresh' content='0; url=/registration/edit-account.php?account-update=password-error'>";
}
else if(!$result1 || !$result2 || !$result3){
  echo "<meta http-equiv='refresh' content='0; url=../index.php?account-update=db-error'>";
}
else{
  echo "<meta http-equiv='refresh' content='0; url=../index.php?account-update=success'>";
}

mysqli_close($link);



//returns true if both passwords match
function validatePasswords($password1, $password2){
  if($password1 == $password2){
    return true;
  }
  else{
    return false;
  }
}
?>