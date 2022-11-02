<?php
include '../config.php';
session_start();
$currUser = $_SESSION['id'];
$sql = "SELECT * FROM user WHERE userid = '$currUser'";
$result = mysqli_query($connection,$sql);
$row = mysqli_fetch_array($result);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Research Staff</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3">
    <div class="container">
    <a href="index.php" class="navbar-brand"><h2>Welcome to Research Staff Page, User: <?php echo $row['fname'] ?> <?php echo $row['lname'] ?> </h2></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navmenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
          <a href = "editProfile.php" class = "btn btn-warning but-lg">Profile</a>
          <a class="btn btn-primary but-lg" data-toggle="tab" href="../logout.php">logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <section class="bg-light text-dark p-5 text-center text-sm-start">
    <div class="container">
              <?php require_once 'institution.php'; ?>
            </div>
            <!--END .row-->
          </div>
          <!--END .tab-pane-->

          <div class="tab-pane fade" id="gradStats">
            <hr>
            <div class="row">
              <h2>View Graduation Stats</h2>

            </div>
          </div>

          <div class="tab-pane fade" id="disciplinary">
            <hr>
            <div class="row">
              <h2>View Disciplinary Stats</h2>

            </div>
          </div>


          <div class="tab-pane fade" id="demographics">
            <hr>
            <div class="row">
              <h2>View Demographics</h2>

            </div>
          </div>


        </div>
        <!--Close My Tab Content-->
      </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>