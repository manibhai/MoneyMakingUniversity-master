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
            <a class="nav-link" href="./registration.php">Registration</a>
          </li>
        </ul>
        <a href="editProfile.php" class="btn btn-warning"><?php echo $row['fname'] ?> <?php echo $row['lname'] ?></a>
        <a href="../logout.php" class="btn btn-primary">Log Out</a>
      </div>
    </div>
  </nav>

  <div class="has-bg-img bg-purple bg-blend-screen" style="text-align: center">
    <img class="bg-img" style="text-align: center;" src="https://www.coolgenerator.com/Data/Textdesign/202212/1b7f9d7944d14153613a3187731dd543.png">
  </div>
  <?php
  $currUser = $_SESSION['id'];
  $query = "SELECT * FROM hold INNER JOIN studenthold ON hold.holdname = studenthold.holdid WHERE studenthold.studentid = '$currUser'";
  $query_run = mysqli_query($connection, $query);
  $hold = mysqli_fetch_array($query_run);
  $hname = $hold['holdname'];
  $htype = $hold['holdtype'];
  $hdesc = $hold['holddesc'];
  $hdate = $hold['dategiven'];
  if ($hold) {
    echo "<p align='center'> <font color=blue size='6pt'> Hold Name:</font> <font color=red size='6pt'>$hname</font></p>";
    echo "<p align='center'> <font color=blue size='6pt'> Hold Type:</font> <font color=red size='6pt'>$htype</font></p>";
    echo "<p align='center'> <font color=blue size='6pt'> Hold Description:</font> <font color=red size='6pt'>$hdesc</font></p>";
    echo "<p align='center'> <font color=blue size='6pt'> This hold was assigned on:</font> <font color=red size='6pt'>$hdate</font></p>";
  } else {
    echo "<p align='center'> <font color=red size='6pt'>NO</font> <font color=blue size='6pt'>Holds on your Account</font></p>";
  }
  ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

</html>