<?php
include_once("../function/connect.php");
include_once("../function/generate-navbar-options.php");
require_once('../function/generate-feedback.php');
//$username = $_SESSION['username'];
//$userID = $_SESSION['userID'];        these are pulled from generate-navbar-options.php
//$avatarID = $row[0];

//get UserInfo from database
$query = "SELECT * FROM UserInfo WHERE UserID = '$userID';";
$result = mysqli_query($link, $query);
$userInfo = mysqli_fetch_assoc($result);
mysqli_free_result($result);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Embedded Systems of S FL</title>
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/blog-post.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Embedded Systems | South Florida</a>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li>
              <a href="#">About</a>
            </li>
            <li>
              <a href="#">Services</a>
            </li>
            <li>
              <a href="#">Contact</a>
            </li>
          </ul>
          <!-- display appropriate info to user - log in option vs log out option -->
          <?php echo $navbarOption; ?>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>
    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <?php echo $feedback; ?>
        <form class="form-horizontal" id="registrationForm" role="form" method="post" action="../function/update-account.php">
          <div class="form-subject row">
            <div class="col-lg-2">
              <h3>Personal Information</h3>
            </div>
            <div class="col-lg-8 form-subject-border">
              <div class="col-lg-6">
                <label class="pull-left">First Name</label>
                <input type="text" class="form-control" name = "firstName" id = "firstName" required
                       value = "<?php echo $userInfo['FirstName']?>"/>
              </div>
              <div class="col-lg-6">
                <label class="pull-left">Last Name</label>
                <input autofocus type="text" class="form-control" name = "lastName" id = "lastName" required
                       value = "<?php echo $userInfo['LastName']?>"/>
              </div>
              <div class="col-lg-8">
                <label class="pull-left">Street Address</label>
                <input type="text" class="form-control" name = "street" id = "street" required
                       value = "<?php echo $userInfo['Street']?>"/>
              </div>
              <div class="col-lg-5">
                <label class="pull-left">City</label>
                <input type="text" class="form-control" name = "city" id = "city" required
                       value = "<?php echo $userInfo['City']?>"/>
              </div>
              <div class="col-lg-3">
                <label class="pull-left">State</label>
                <input type="text" class="form-control" name = "state" id = "state" required
                       value = "<?php echo $userInfo['State']?>"/>
              </div>
              <div class="col-lg-4">
                <label class="pull-left">Zip</label>
                <input type="text" class="form-control" name = "zip" id = "zip" required
                       value = "<?php echo $userInfo['Zip']?>"/>
              </div>
              <div class="col-lg-6">
                <label class="pull-left">Primary Phone #</label>
                <input type="text" class="form-control" name = "telephone" id = "telephone"
                       value = "<?php echo $userInfo['Telephone']?>"/>
              </div>
              <div class="col-lg-6">
                <label class="pull-left">Email Address</label>
                <input type="text" class="form-control" name = "email" id = "email" required
                       value = "<?php echo $userInfo['Email']?>"/>
              </div>
            </div>
          </div>
          <div class="form-subject row">
            <div class="col-lg-2">
              <h3>Login Information</h3>
            </div>
            <div class="col-lg-8 form-subject-border">
              <div class="col-lg-12">
                <label class="pull-left">Username</label>
                <span class="navbar-username"><?php echo $username?></span>
              </div>
              <div class="col-lg-4">
                <label class="pull-left">Password</label>
                <input type="password" class="form-control" name = "password1" id = "password1" required>
              </div>
              <div class="col-lg-4">
                <label class="pull-left">Confirm Password</label>
                <input type="password" class="form-control" name = "password2" id = "password2" required>
              </div>
            </div>
          </div>
          <div class="form-subject row">
            <div class="col-lg-2">
              <h3>Select Avatar</h3>
            </div>
            <div class="col-lg-2 form-subject-border">
              <div class="col-lg-12">
                <div id="avatar-dropdown"></div>
              </div>
            </div>
          </div>
          <div class="text-center col-lg-12 submit-button">
            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-send"></span> Submit</button>
          </div>
        </form>
    </div>
    <hr>
    <footer>
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright &copy; Your Website 2014</p>
        </div>
      </div>
    </footer>
    </div>
  <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/ddslick.min.js"></script>
  <script src="../js/avatar-data.js"></script>
  <script type="text/javascript">
    $('#avatar-dropdown').ddslick({
      data: avatarData,
      height: 200,
      width: 150,
      onSelected: function(data){
        $('<input />').attr('type', 'hidden')
        .attr('name', 'avatar-dropdown')
        .attr('value', data.selectedData.value)
        .appendTo('#registrationForm');
      }   
    });
  </script>
  </body>
</html>
