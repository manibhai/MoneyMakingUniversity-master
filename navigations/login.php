<?php
include "config.php";
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3">
      <div class="container">
        <a href="../index.php" class="navbar-brand">Money Making University</a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Course Catalog
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                  <li><a class="dropdown-item" href="majors.php">Majors</a></li>
                  <li><a class="dropdown-item" href="minors.php">Minors</a></li>
                  <li><a class="dropdown-item" href="viewcourses.php">Courses</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="departments.php" class="nav-link">Departments</a>
              </li>

              <li class="nav-item">
                <a href="masterscheduler.php" class="nav-link">Master Schedule</a>
              </li>

              <li class="nav-item">
                <a href="academiccal.php" class="nav-link">Academic Calender</a>
              </li>
            </ul>
          </div>
      </div>
    </nav>

    <section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
  <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
  
    <form class="border shadow p-3 rounded" action="../php/check-login.php" method="post" style="width: 450px;">
    <?php
  if(isset($_SESSION['status'])) {
    ?>
    <div class="alert alert-success">
      <h5><?= $_SESSION['status']; ?></h5>
    </div>
    <?php
      unset($_SESSION['status']);
  }
  ?>
      <h1 class="text-center p-3">LOGIN</h1>
      <?php 
        if (isset($_GET['error'])) { 
          ?>
          <div class="alert alert-danger" role="alert">
            <?= $_GET['error'] ?>
          </div>
          <?php 
        }
      ?>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" name="email" id="email">
      </div>
      <div class="mb-3">
        <label for="pass" class="form-label">Password</label>
        <input type="password" name="pass" class="form-control" id="pass">
      </div>
      <div class="col">
      <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
        <label class="form-check-label" for="form2Example31"> Remember me </label>
      </div>
    </div>

    <div class="col">
      <!-- Simple link -->
      <a href="../php/forgetpassword.php">Forgot password?</a>
    </div>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
    </form>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>