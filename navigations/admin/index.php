<?php
session_start();
include "../config.php";
include "institution.php";

if(!isset($_SESSION['id'])){
  header("Location: ../login.php");
}

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

<div class="container text-center">
      <h2 class="mb-3 h2">Welcome to Admin Page, User: <?php echo $row['fname'] ?> <?php echo $row['lname'] ?> </h2>
  </div>
</section>
<section> 
  <div class="row justify-content-center">

  <div class="card" style="width: 18rem;">
  <div class="card-body text-center">
    <h5 class="card-title" >Students Attending</h5>
    <h4 class="card-text " ><?php echo $studentCount['stuTotal'];?></h4>
    <img src="https://thumbs.dreamstime.com/b/student-school-lesson-icon-element-education-pictogram-premium-quality-graphic-design-signs-symbols-collection-websites-147458964.jpg" class="img-fluid" alt="Student Image">
  </div>
</div>

<div class="card h-25" style="width: 18rem;">
  <div class="card-body text-center">
    <h5 class="card-title" >Faculty Count</h5>
    <h4 class="card-text " ><?php echo $facultyCount['facCount'];?></h4>
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNPhZduYYg7IEus7Y2rzbojWPd3Z7S3be5n8cBpEAS&s" class="" alt="Faculty Image">
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