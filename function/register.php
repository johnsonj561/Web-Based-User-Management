<?php
require_once('connect.php');

//flag used to represent successful registration and valid username
$isValidPassword = false;
$isValidUsername = false;

//make sure username isn't already being used
//set $isValid to false if username is not valid
$username = strip_tags($_POST['username']);
if(validateUsername($username, $link)){
  $isValidUsername = true;
}

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
if($isValidUsername && $isValidPassword){
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

  //Add entry to Users table
  //We enter all users as standard 'users', Admin users must be entered into DB manually
  $query = "INSERT INTO Users
              (Username, UserType, Password) 
              VALUES
              ('$username', 'user', '$password1');";
  mysqli_query($link, $query);

  //get ID that was generated for this new user
  $query = "SELECT UserID FROM Users WHERE Username = '$username';";
  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_assoc($result);
  $userID = $row['UserID'];
  mysqli_free_result($result);

  //Add entry to UserInfo table
  $query = "INSERT INTO UserInfo
            (UserID, FirstName, LastName, Street, City, State, Zip, Telephone, Email)
            VALUES
            ('$userID', '$firstName', '$lastName', '$street', '$city', '$state', '$zip', '$telephone', '$email');";
  mysqli_query($link, $query);  
  //Add UserID:AvatarID pair to Avatars table
  $query = "INSERT INTO Avatars (UserID, AvatarID) values ('$userID', '$avatar');";
  mysqli_query($link, $query);
}


//create appropriate user message - dependant on registration status 
if(!$isValidUsername){
   echo "<meta http-equiv='refresh' content='0; url=/registration/?register=username-error'>";

}
else if(!$isValidPassword){
   echo "<meta http-equiv='refresh' content='0; url=/registration?register=password-error'>";
}
else{
  echo "<meta http-equiv='refresh' content='0; url=../index.php?register=success'>";
}

mysqli_close($link);


//returns true if username does not already exist
//queries database to determine if any rows exist with this username
function validateUsername($username, $link){
  $query = "SELECT UserID FROM Users WHERE Username = '$username'";
  $result = mysqli_query($link, $query);
  if(mysqli_num_rows($result) > 0){     //if row exists with user name, user must select new name
      return false;
    }
    else{                                //else username is valid
      return true;
    }
  mysqli_free_result($result);
}


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