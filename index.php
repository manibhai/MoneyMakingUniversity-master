<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Money Making University</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3">
    <div class="container">
      <a href="index.php" class="navbar-brand">HOME</a>

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
              <li><a class="dropdown-item" href="/navigations/courses.php">Courses</a></li>
              <li><a class="dropdown-item" href="/navigations/majors.php">Majors</a></li>
              <li><a class="dropdown-item" href="/navigations/minors.php">Minors</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/navigations/departments.php" class="nav-link">Departments</a>
          </li>

          <li class="nav-item">
            <a href="/navigations/masterscheduler.php" class="nav-link">Master Schedule</a>
          </li>

          <li class="nav-item">
            <a href="/navigations/academiccal.php" class="nav-link">Academic Calender</a>
          </li>

          <li class="nav-item">
            <a href="/navigations/login.php" class="nav-link">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Showcase -->
  <section class="bg-dark text-light p-5 text-center text-sm-start">
    <h1 class="h2"><img src="/img/mmu.gif" class="img-fluid mx-auto d-block" alt="..."></h1>
    <div class="container">
      </br></br>
      <div class="d-sm-flex align-items-center justify-content-between">
        <div>
          </br></br>
          <h1>Become a <span class="text-warning">Student</span></h1>
          <br /><br /><br />
          <h3>GET YOUR</h3>
          <h1><span class="text-danger">DEGREE</span></h1>
          <h3>AND GET OUT!</h3>
        </div>
        </br></br>
        <img src="/img/websitelogo.jpg" class="img-fluid w-25 d-none d-sm-block" alt="...">
      </div>
    </div>
  </section>
  <div class="bg-image p-5 text-center shadow-1-strong rounded mb-5 text-primary">
    <p>
    <h2>ABOUT US</h2>
    <br /><br />
    <p>
    <h2>We are here to help you get that Money! We build greatness!
      <br> We can be found at 100 VSC RD, Old Westbury, NY 11568.
      <br> NO. 1-800 - GET - PAID !
    </h2>
    </p>
    </p>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>