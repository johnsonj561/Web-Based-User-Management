<?php
$loggedIn = false;
/*check to see if logged in and store SESSION variabeles*/
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
  $loggedIn = true;
  $username = $_SESSION['username'];
  $userID = $_SESSION['userID'];

  //get avatar id
  $query = "SELECT AvatarID FROM Avatars WHERE UserID = '$userID';";
  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_row($result);
  $avatarID = $row[0];
}

/*if logged in, set navbar to display username and logout option*/
if($loggedIn){
  $navbarOption = "<form class='navbar-form navbar-right' action='/function/logout.php' method='post'>
            <div class='form-group'>
              <label class='navbar-username'>$username</label>
            </div>
            <img src='/img/avatars/avt-$avatarID.png' class='avatar-img'/>
            <a class='btn btn-sm btn-warning' href='registration/edit-account.php'>Edit</a>
            <button type='submit' class='btn btn-sm btn-warning'>Sign Out</button>
          </form>";
}
/*else not logged in, set navbar to display log in options*/
else{
  $navbarOption = "<form class='navbar-form navbar-right' action='/function/sign-in.php' method='post'>
            <div class='form-group'>
              <input type='text' class='form-control input-sm' placeholder='Username' name='username' id='username'/>
            </div>
            <div class='form-group'>
              <input type='password' class='form-control input-sm' placeholder='Password' name='password1' id='password1'/>
            </div>
            <button type='submit' class='btn btn-sm btn-primary navbar-btn'>Sign In</button>
            <a class='btn btn-sm btn-primary navbar-btn' href='registration/'>Register</a>
          </form>";
}
?>