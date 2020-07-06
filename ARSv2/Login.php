<?php
session_start();

require("config.php");

$err_msg="";
  if(count($_POST)>0) {
    $password = md5($_POST['password']);
    $username = $_POST['username'];
    $result = mysqli_query($link,"SELECT * FROM it_personnel WHERE username='" . $username. "' and password = '". $password."'");
    $row  = mysqli_fetch_array($result);
  if(is_array($row)) {
    $_SESSION["id"] = $row['id'];
    $_SESSION["username"] = $row['username'];
      } else {
      $err_msg = "Invalid Username or Password!";
            }
}

  if(isset($_SESSION["id"])) {
    header("Location:Home");
  }
?>
<!DOCTYPE html>
<html>

<head>
<link rel="icon" href="favicon.ico">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">

    <style>
form{
  background-color: rgb(25,35,72);
}

    </style>
</head>

<body>
    <div class="login-dark" style="background-color:#5673e1; padding-top: 20px;">
        <form method="post" autocomplete="off">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><!--i class="icon ion-ios-locked-outline"></i--><img src="MNWD.jpg" style="width: 130px; height: 90px;"/></div>
            <p>Assistance Recording System v2</p>
            <div class="form-group"><input class="form-control" type="username" name="username" placeholder="Username"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <span style="color:red;"><?php echo $err_msg; ?></span>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color:rgb(56,76,152);">Log In</button></div><a href="Register.php" class="forgot">Not yet registered?</a></form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<!-- © 2020 | Francis Joachim P. Santy-->