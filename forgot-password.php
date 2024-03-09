<?php
session_start();
// Connect to the database
require_once('connect.php');

if (isset($_POST['change_password_btn'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $newPassword = mysqli_real_escape_string($db, $_POST['new_password']);
    $confirmPassword = mysqli_real_escape_string($db, $_POST['confirm_password']);

    // Check if the username exists
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($db, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        if ($newPassword == $confirmPassword) {
            // Update the password
            $newPasswordHash = md5($newPassword); // Hash the new password
            $updateQuery = "UPDATE users SET password = '$newPasswordHash' WHERE username = '$username'";
            mysqli_query($db, $updateQuery);
            $affectedRows = mysqli_affected_rows($db);
            if ($affectedRows > 0) {
                $_SESSION['message'] = "Password updated successfully";
                $_SESSION['username']=$username;
                header("location:index.php"); // Redirect to the home page
                exit; // Add this line to ensure the script stops executing after redirection
            } else {
                $_SESSION['message'] = "Failed to update password";
            }
        } else {
            $_SESSION['message'] = "The new passwords do not match";
        }
    } else {
        $_SESSION['message'] = "Username does not exist";
    }
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Forgot Password</title>
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
    <a href="index.php"><span class="brand-text font-weight-light" style = "font-family: 'Alkatra', cursive ; font-size: 19px;">E-GRAB TO CART </span></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

      <?php
        if(isset($_SESSION['message']))
        {
            echo "<div id='error_msg'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
        }
      ?>
      <form action="recover-password.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-warning btn-block">Request new password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="login.php">Login</a>
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
