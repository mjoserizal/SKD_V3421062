<nav class="navbar navbar-expand-lg navbar-light bg-warning mb-4">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="img/logo.jpg" width="30" height="30" class="d-inline-block align-top rounded-circle" alt="">
      UJIAN NASIONAL
    </a>
    <div id="navbarNav">
      <ul class="navbar-nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</span></a>
        </li>
        <?php if($_SESSION['rule'] == 'admin'){?>
          <li class="nav-item">
            <a class="nav-link" href="listStudent.php">List student</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="php/logout.php">Logout</a>
          </li>
        <?php } else if($_SESSION['rule'] == 'user'){?>
          <li class="nav-item">
            <a class="nav-link" href="php/logout.php">Logout</a>
          </li>
        <?php } else {?>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>