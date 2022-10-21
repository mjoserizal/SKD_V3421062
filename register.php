<?php


error_reporting(E_ERROR | E_PARSE);
session_start();

require "php/caesar.php";
require "php/db.php";

if(isset($_POST['register'])){
  $name = preg_replace("/[^A-Za-z\ ]/", "", $_POST['name']);
  $username = strtolower(preg_replace("/[^A-Za-z\ ]/", "", $_POST['username']));
  $email = $_POST['email'];
  $password = md5('asdfghkl' . $_POST['password']);
  $confirmPassword = md5('asdfghkl' . $_POST['confirmPassword']);

  if($password != $confirmPassword){
    $error=true;
  }else{
    $sql = "INSERT INTO user (name, username, email, password)
    VALUES ('$name', '$username', '$email', '$password')";
  
    if ($conn->query($sql) === TRUE) { ?>
      <script>
      alert("Register success")
      window.location="login.php"
      </script>
      <?php
    }
  }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REGISTER</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    h1{
      position: absolute;
			left: 90px;
			top: 30px;
			color: white;
      font-size:80px;
    }
  </style>
</head>
<body">

  <!-- content -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-5 mt-4">
        
        <div class="card" >
          <img src="img/login.jpg" class="card-img-top" alt="..." style="width:100%; height:10rem; opacity:0.8;">
          <h1>REGISTER</h1>
          <div class="card-body">
            <form method="post">
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Confirm password</label>
                <?php if(isset($error)){ ?>
                  <span><i style="color:red; float:right;">different password confirmation</i></span>
                <?php } ?>
                <input type="password" class="form-control" name="confirmPassword" required>
              </div>
              <div class="mb-3 form-check text-center">
                <span>Already have an account. <a class="text-decoration-none" href="login.php"><b>Login</b></a>.</span>
              </div>
              <div class="col" style="float:right;">
                <a href="login.php" class="btn btn-danger" style="width:8rem;">Cancel</a>
                <button name="register" class="btn btn-warning" style="width:8rem;">Register</button>
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