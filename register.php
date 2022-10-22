<?php


error_reporting(E_ERROR | E_PARSE);
session_start();

require "php/caesar.php";
require "php/db.php";

if (isset($_POST['register'])) {
  $name = preg_replace("/[^A-Za-z\ ]/", "", $_POST['name']);
  $username = strtolower(preg_replace("/[^A-Za-z\ ]/", "", $_POST['username']));
  $email = $_POST['email'];
  $password = md5('asdfghkl' . $_POST['password']);
  $confirmPassword = md5('asdfghkl' . $_POST['confirmPassword']);

  if ($password != $confirmPassword) {
    $error = true;
  } else {
    $sql = "INSERT INTO user (name, username, email, password)
    VALUES ('$name', '$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) { ?>
      <script>
        alert("Register success")
        window.location = "index.php"
      </script>
<?php
    }
  }
}

?>
<!doctype html>
<html lang="en">

<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.min.css">

  <link rel="stylesheet" href="css/stail.css">

</head>

<body>
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
          <h2 class="heading-section">Login</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
          <div class="login-wrap p-4 p-md-5">
            <div class="icon d-flex align-items-center justify-content-center">
              <span class="fa-solid fa-user"></span>
            </div>
            <div class="col-md-6 col-lg-5">
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
                  <label class="form-label">Confirm Password</label>
                  <?php if (isset($error)) { ?>
                    <span><i style="color:red; float:right;">different password confirmation</i></span>
                  <?php } ?>
                  <input type="password" class="form-control" name="confirmPassword" required>
                </div>
                <div class="mb-3 form-check text-center">
                  <span>Do you have an account. <a class="text-decoration-none" href="login.php"><b>Login</b></a>.</span>
                </div>
                <div class="form-group">
                  <button name="register" class="btn btn-primary rounded submit p-3 px-5" style="width:8rem;">Register</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  </section>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/mein.js"></script>

</body>

</html>