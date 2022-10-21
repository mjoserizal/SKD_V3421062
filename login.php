<?php

error_reporting(E_ERROR | E_PARSE);
session_start();

include("php/db.php");
include "php/caesar.php";

if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = md5('asdfghkl' . $_POST['password']);

  $sql = ("SELECT * FROM user WHERE email='$email' AND password='$password'");

  if ($conn->query($sql)->num_rows > 0) {
    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = $conn->query($sql)->fetch_assoc();
    session_start();

    $_SESSION['rule']=$result['rule'];
    $_SESSION['password']=$result['password'];
    $_SESSION['username']=$result['username']; ?>

    <script>
    alert("Login success")
    window.location="dashboard.php"
    </script> <?php
  }else{
    $error = true;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    h1{
      position: absolute;
			left: 140px;
			top: 60px;
			color: white;
      font-size:80px;
    }
  </style>
</head>
<body">

  <!-- content -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-5 mt-5 pt-5">
        
        <div class="card" >
          <img src="img/login.jpg" class="card-img-top" alt="..." style="width:100%; height:13rem; opacity:0.8;">
          <h1>LOGIN</h1>
          <div class="card-body">
            <form method="post">
              <div class="mb-3">
                <label class="form-label">Email address</label>
                <?php if(isset($error)){ ?>
                  <span><i style="color:red; float:right;">email or password wrong</i></span>
                <?php } ?>
                <input type="email" class="form-control" name="email">
              </div>
              <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
              </div>
              <div class="mb-3 form-check text-center">
                <span>Don't have an account. <a class="text-decoration-none" href="register.php"><b>Create account</b></a>.</span>
              </div>
              <div class="col" style="float:right;">
                <a href="index.php" class="btn btn-danger" style="width:8rem;">Cancel</a>
                <button name="login" class="btn btn-warning" style="width:8rem;">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /content -->
</body>
</html>