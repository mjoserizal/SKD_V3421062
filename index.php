<?php

error_reporting(E_ERROR | E_PARSE);
session_start();

include("php/db.php");
include "php/caesar.php";

if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$password = md5('asdfghkl' . $_POST['password']);

	$sql = ("SELECT * FROM user WHERE email='$email' AND password='$password'");

	if ($conn->query($sql)->num_rows > 0) {
		$sql = "SELECT * FROM user WHERE email='$email'";
		$result = $conn->query($sql)->fetch_assoc();
		session_start();

		$_SESSION['rule'] = $result['rule'];
		$_SESSION['password'] = $result['password'];
		$_SESSION['username'] = $result['username']; ?>

		<script>
			alert("Login success")
			window.location = "dashboard.php"
		</script> <?php
				} else {
					$error = true;
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
						<form method="post">
							<div class="mb-3">
								<label class="form-label">Email address</label>
								<?php if (isset($error)) { ?>
									<span><i style="color:red; float:right;">email or password wrong</i></span>
								<?php } ?>
								<input type="email" class="form-control" name="email" required>
							</div>
							<div class="mb-3">
								<label class="form-label">Password</label>
								<input type="password" class="form-control" name="password">
							</div>
							<div class="mb-3 form-check text-center">
								<span>Don't have an account. <a class="text-decoration-none" href="register.php"><b>Create account</b></a>.</span>
							</div>
							<div class="col" style="float:center;">
								<button name="login" class="btn btn-primary rounded submit p-3 px-5" style="width:8rem;">Login</button>
							</div>
					</div>
				</div>
			</div>
		</div>
		</div>
</body>