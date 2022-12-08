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
  <title>Faculty</title>
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
            <a class="nav-link active" aria-current="page" href="index.php">Faculty Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./facultyviewHistory.php">View History</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./facultyviewSchedule.php">View Schedule</a>
          </li>
          <div class="dropdown">
            <button class="btn btn-bg-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              View Students
            </button>
            <ul ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="./facultyviewUnPart.php">View Undergraduate Part-Time Students</a></li>
              <li><a class="dropdown-item" href="./facultyviewUnFull.php">View Undergraduate Full-Time Students</a></li>
              <li><a class="dropdown-item" href="./facultyviewGrPart.php">View Graduate Part-Time Students</a></li>
              <li><a class="dropdown-item" href="./facultyviewGrFull.php">View Graduate Full-Time Students</a></li>
              <li><a class="dropdown-item" href="./facultyviewStudentDegreeAudit.php">View Student Degree Audit</a></li>
              <li><a class="dropdown-item" href="./facultyviewStudentTranscript.php">View Student Transcript</a></li>
              <li><a class="dropdown-item" href="./facultyviewAttendance.php">Attendance</a></li>
              <li><a class="dropdown-item" href="./facultyviewAdvising.php">Advising</a></li>
            </ul>
          </div>
        </ul>
        <a href="editProfile.php" class="btn btn-warning"><?php echo $row['fname'] ?> <?php echo $row['lname'] ?></a>
        <a href="../logout.php" class="btn btn-primary">Log Out</a>
      </div>
    </div>
  </nav>

  <div class="bg-image text-center">
    <div style="background-image: url('https://www.coolgenerator.com/Data/Textdesign/202212/1b7f9d7944d14153613a3187731dd543.png'); height: 100vh">
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

</html>