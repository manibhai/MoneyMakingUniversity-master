<?php
session_start();
include "../config.php";
include "institution.php";

if (!isset($_SESSION['id'])) {
  header("Location: ../login.php");
}

$currUser = $_SESSION['id'];
$sql = "SELECT * FROM user WHERE userid = '$currUser'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Student</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="../../index.php">MMU</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Student Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./studentviewHistory.php">View History</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./studentviewSchedule.php">View Schedule</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./studentviewDegreeAudit.php">View Degree Audit</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./studentviewTranscript.php">View Transcript</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./studentviewRegistration.php">Registration</a>
          </li>
        </ul>
        <a href="editProfile.php" class="btn btn-warning">Profile</a>
        <a href="../logout.php" class="btn btn-primary">Log Out</a>
      </div>
    </div>
  </nav>

  <div class="container text-center">
    <h2 class="mb-3 h2">Welcome to Student Page, <?php echo $row['fname'] ?> <?php echo $row['lname'] ?> </h2>
  </div>
  </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

</html>