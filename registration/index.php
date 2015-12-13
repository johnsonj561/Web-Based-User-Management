<?php
include_once("../function/connect.php");
$navbarOption = "";
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
        <form class="form-horizontal" role="form" method="post" action="../function/register.php">
          <div class="form-subject row">
            <div class="col-lg-2">
              <h3>New Member Registration</h3>
            </div>
            <div class="col-lg-8 form-subject-border">
              <div class="col-lg-6">
                <label class="pull-left">First Name</label>
                <input autofocus type="text" class="form-control" name = "firstName" id = "firstName" required>
              </div>
              <div class="col-lg-6">
                <label class="pull-left">Last Name</label>
                <input autofocus type="text" class="form-control" name = "lastName" id = "lastName" required>
              </div>
              <div class="col-lg-8">
                <label class="pull-left">Street Address</label>
                <input type="text" class="form-control" name = "street" id = "street" required>
              </div>
              <div class="col-lg-4">
                <label class="pull-left">Apt/Suite #</label>
                <input type="text" class="form-control" name = "apt" id = "apt">
              </div>
              <div class="col-lg-5">
                <label class="pull-left">City</label>
                <input type="text" class="form-control" name = "city" id = "city" required>
              </div>
              <div class="col-lg-3">
                <label class="pull-left">State</label>
                <input type="text" class="form-control" name = "state" id = "state" required>
              </div>
              <div class="col-lg-4">
                <label class="pull-left">Zip</label>
                <input type="text" class="form-control" name = "zip" id = "zip" required>
              </div>
              <div class="col-lg-6">
                <label class="pull-left">Primary Phone #</label>
                <input type="text" class="form-control" name = "telephone" id = "telephone">
              </div>
              <div class="col-lg-6">
                <label class="pull-left">Email Address</label>
                <input type="text" class="form-control" name = "email" id = "email" required>
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
                <input autofocus type="text" class="form-control" name = "username" id = "username" required>
              </div>
              <div class="col-lg-4">
                <label class="pull-left">Password</label>
                <input type="password" class="form-control" name = "password1" id = "password1" required>
              </div>
              <div class="col-lg-4">
                <label class="pull-left">Confirm Password</label>
                <input type="password" class="form-control" name = "password2" id = "password2" required>
              </div>
              <div class="col-lg-4"></div>
              <div class="col-lg-6 avatar-div">
                <label class="pull-left">Avatar</label>
                <input type="file" id="avatar" accept="image/*">
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
  </body>
</html>
