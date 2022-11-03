<?php
session_start();
include "../navigations/config.php";
?>
<!DOCTYPE html>
<html>

<head>
  <title>Forget Password</title>
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
                  <li><a class="dropdown-item" href="../navigations/majors.php">Majors</a></li>
                  <li><a class="dropdown-item" href="../navigations/minors.php">Minors</a></li>
                  <li><a class="dropdown-item" href="../navigations/courses.php">Courses</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="../navigations/departments.php" class="nav-link">Departments</a>
              </li>

              <li class="nav-item">
                <a href="../navigations/masterscheduler.php" class="nav-link">Master Schedule</a>
              </li>

              <li class="nav-item">
                <a href="../navigations/academiccal.php" class="nav-link">Academic Calender</a>
              </li>
            </ul>
          </div>
      </div>
    </nav>
    <body>
    <div class="container d-flex flex-column">
      <div class="row align-items-center justify-content-center
          min-vh-100">
        <div class="col-12 col-md-8 col-lg-4">
          <div class="card shadow-sm">
            <div class="card-body">
              <div class="mb-4">
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
                <h5>Forgot Password?</h5>
                <p class="mb-2">Enter your registered email ID to reset the password
                </p>
              </div>
              <form action="password_reset.php" method="POST">
                <div class="mb-3">
                  <label>Email</label>
                  <input type="varchar(300)" class="form-control" name="email" placeholder="Enter Your Email"
                    required="">
                </div>
                <div class="mb-3 d-grid">
                  <button type="submit" name="passwordreset" class="btn btn-primary">
                    Reset Password
                  </button>
                </div>
                <span>Back to Login? <a href="../navigations/login.php">sign in</a></span>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>