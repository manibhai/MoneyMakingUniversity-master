<?php

include '../config.php';

session_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Faculty</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3">
      <div class="container">
        <a href="index.php" class="navbar-brand">Money Making University</a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Courses
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                  <li><a class="dropdown-item" href="/navigations/undergrad.html">Undergraduate Courses</a></li>
                  <li><a class="dropdown-item" href="#">Graduate Courses</a></li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="/navigations/academiccal.php" class="nav-link">Academic Calender</a>
              </li>

              <li class="nav-item">
              <a href = "editProfile.php" class = "btn btn-primary but-lg">Profile</a>
              <a href = "../logout.php" class = "btn btn-primary but-lg">logout</a>
              </li>
            </ul>
          </div>
      </div>
    </nav>
    <section class="bg-dark text-light p-5 text-center text-sm-start">
      <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between">
          <div>
          <h2>Welcome to Faculty Page, User: <?php echo $_SESSION['id'] ?> </h2>
          </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>