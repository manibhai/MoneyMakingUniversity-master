<?php
session_start();
include "../config.php";
include "../../institution.php";

$currUser = $_SESSION['id'];
$sql = "SELECT * FROM user WHERE userid = '$currUser'";
$result = mysqli_query($connection,$sql);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
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
          <a class="nav-link active" aria-current="page" href="admin.php">Admin Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adminviewUser.php">Users</a>
        </li>
        <div class="dropdown">
    <button class="btn btn-bg-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        Tools
    </button>
        <ul ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="../masterscheduler.php">Edit Master Schedule</a></li>
          <li><a class="dropdown-item" href="#">Edit Course Catalog</a></li>
          <li><a class="dropdown-item" href="./adminviewDepts.php">Edit Departments</a></li>
          <li><a class="dropdown-item" href="./adminviewHolds.php">Edit Holds</a></li>
        </ul>
      </div>
      </ul>
      <a href="editProfile.php" class="btn btn-warning">Profile</a>
      <a href="../logout.php" class="btn btn-primary">Log Out</a>  
    </div>
  </div>
</nav>
<section>
  <div class="d-flex justify-content-center">
      <h2>Welcome to Admin Page, User: <?php echo $row['fname'] ?> <?php echo $row['lname'] ?> </h2>
  </div>
</section>
<section> 
<?php
$queryStudentCount = "SELECT COUNT('studentid') AS `stuTotal` FROM student;";
$studentCount = mysqli_fetch_assoc(mysqli_query($connection, $queryStudentCount));
$totalStudents = (int)$studentCount['stuTotal'];

?>

  <div class="row">
  <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Students Attending</h5>
    <p class="card-text text-center" ><?php echo $studentCount['stuTotal'];?></p>
  </div>
</div>
  </div>
</section>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" 
      crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" 
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" 
    crossorigin="anonymous"></script>
</html>