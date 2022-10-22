<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

require "php/caesar.php";

$token = enkripsi(preg_replace("/[^A-Za-z]/", "", $_SESSION['password']), 5);

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-6.1.1-web/css/all.min.css">
    <title>SKD</title>
  </head>
  <body>
    <?php if($_SESSION['rule']){ ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Welcome <?= $_SESSION['rule'] ?> | <b>Universitas Sebelas Maret</b></a>
          
          <form class="form-inline my-2 my-lg-0 ml-auto">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <?php if($_SESSION['rule']){?>
                <a class="btn btn-outline-success my-2 my-sm-0" href="php/logout.php">Logout</a>
            <?php } ?>
          </form>
            <div class="icon ml-4">
                <i class="fa-solid fa-envelope mr-3" data-toggle="tooltip" title="Surat Masuk"></i>
                <i class="fa-solid fa-bell mr-3" data-toggle="tooltip" title="Notifikasi"></i>
            </div>
        </div>
    </nav>
    <?php } ?>
    <?php if($_SESSION['rule']){ ?>
      <?php if($_SESSION['rule'] == 'user'){ ?>
          <div class="row no-gutters mt-5">
          <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
            <ul class="nav flex-column ml-3 mb-5">
                <li class="nav-item">
                  <a class="nav-link active text-white" href="#"><i class="fa-solid fa-align-justify mr-2"></i>Dashboard</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#"><i class="fa-solid fa-user"></i>Absen</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#"><i class="fa-solid fa-calendar-days"></i>Mata Kuliah</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#"><i class="fa-regular fa-clock"></i>Jadwal Kuliah</a><hr class="bg-secondary">
                </li>
              </ul>
          </div>
      <?php } ?>
      <?php if($_SESSION['rule'] == 'admin'){ ?>
          <div class="row no-gutters mt-5">
          <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
            <ul class="nav flex-column ml-3 mb-5">
                <li class="nav-item">
                  <a class="nav-link active text-white" href="#"><i class="fa-solid fa-align-justify mr-2"></i> Dashboard</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#"><i class="fa-solid fa-user"></i>  Profil</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#"><i class="fa-solid fa-list"></i>  List Admin</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#"><i class="fa-solid fa-calendar-days"></i>  Jadwal mengajar</a><hr class="bg-secondary">
                </li>
              </ul>
          </div>
      <?php } ?>
          <div class="col-md-10 p-5 pt-4">
          <div class="container">
          <div class="row justify-content-center">
            <div class="col-8">
            <div class="card text-center">
              <?php if($_SESSION['rule'] == 'user'){ ?>
              <h5 class="card-header bg-dark" style="color:white;">WELCOME <?= $_SESSION['username'] ?></h5>
              <div class="card-body">
                <img src="img/uns.jpg" class="rounded" alt="..." style="width:100%;">
                <div class="border-top mt-3 mb-3"></div>
                <h5 class="card-title">UNIVERSITAS SEBELAS MARET</h5>
                <p class="card-text">Yout token : <b disabled="disabled" class="badge bg-danger"><?= $token ?></b></p>
                <p class="card-text">Use the token to start the test</p>
                <a href="verify.php" class="btn btn-warning">Test now</a>
              </div>
              <?php } else if ($_SESSION['rule'] == 'admin') {?>
              <h5 class="card-header bg-dark" style="color:white;">WELCOME <?= $_SESSION['username'] ?></h5>
              <div class="card-body">
                <img src="img/uns.jpg" class="rounded" alt="..." style="width:100%;">
                <div class="border-top mt-3 mb-3"></div>
                <h5 class="card-title">UNIVERSITAS SEBELAS MARET</h5>
                <button class="btn btn-warning" style="width:100%;">ADMIN DASHBOARD</button>
              </div>
            <?php } else {?>
            <h5 class="card-header bg-dark" style="color:white;">WELCOME</h5>
            <div class="card-body">
              <img src="img/uns.jpg" class="rounded" alt="..." style="width:100%;">
              <div class="border-top mt-3 mb-3"></div>
              <h5 class="card-title">UNIVERSITAS SEBELAS MARET</h5>
              <p class="card-text">To enroll in this school, you must register your account in order to get a token. The token is used for verification when starting the online test.</p>
              <a href="register.php" class="btn btn-warning">Register now</a>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
          </div>
          
      </div>
<script type="text/javascript" src="tool.js"></script>
</body>
</html>