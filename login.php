<?php
session_start();

if (isset($_SESSION['username'])) {
  header("location: index.php");
  die();
}

// Connect to the database
require_once('connect.php');


if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['login_btn'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $password=md5($password); //Remember we hashed password before storing last time
  $hashedPassword = md5($password); // Hash the password for comparison
  $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $sql);
  
  if ($result) {
    if (mysqli_num_rows($result) == 1) {
      $_SESSION['message'] = "You are now Logged In";
      $_SESSION['username'] = $username;
      header("location: index.php");
      exit();
    } else {
      $_SESSION['message'] = "Username and Password combination is incorrect";
    }
  } else {
    die("Query failed: " . mysqli_error($conn));
  }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Admin | Log in</title>
  <link rel="icon" type="image/x-icon" href="images/favicon.ico">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href="https://fonts.googleapis.com/css2?family=Alkatra:wght@600&display=swap" rel="stylesheet">
 

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte.min.css">
  <link rel="stylesheet" href="font/font.css">
</head>
<body class="hold-transition login-page" style="font-family: 'shopee_2021extra_bold'; background-color:#FFFDD0 ; font-size:medium">
  <img src="images/transparent_shopicon.png" alt="logo" style="width:142px;height:142px;">
<div class="login-box">
  <div class="login-logo">
    <a href="index.html"><span class="brand-text font-weight-light" style = "font-family: 'Alkatra', cursive ; font-size: 19px;">E-GRAB TO CART </span></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

    <?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
    ?>

      <form method="post" action="login.php" >
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" id="username" name="username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
          <input type="submit" class="btn btn-warning btn-block" name = "login_btn" value="Sign In" id="login_btn">
          </div>
          <!-- /.col -->
        </div>
      </form>

    
      <p class="mb-1">
        <a href="forgot-password.php">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
