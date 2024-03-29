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
            <a class="nav-link active" aria-current="page" href="index.php">Admin Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="adminviewUser.php">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./adminviewMaster.php">View Master Schedule</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./adminviewEnrollment.php">Enrollment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./adminviewTimeWindows.php">View Semesters</a>
          </li>
          <div class="dropdown">
            <button class="btn btn-bg-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              View Students
            </button>
            <ul ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="./adminviewStudent.php">View Students</a></li>
              <li><a class="dropdown-item" href="./adminviewUnPart.php">View Undergraduate Part-Time Students</a></li>
              <li><a class="dropdown-item" href="./adminviewUnFull.php">View Undergraduate Full-Time Students</a></li>
              <li><a class="dropdown-item" href="./adminviewGrPart.php">View Graduate Part-Time Students</a></li>
              <li><a class="dropdown-item" href="./adminviewGrFull.php">View Graduate Full-Time Students</a></li>
              <li><a class="dropdown-item" href="./adminviewStudentHistory.php">View Student History</a></li>
              <li><a class="dropdown-item" href="./adminviewStudentDegreeAudit.php">View Student Degree Audit</a></li>
              <li><a class="dropdown-item" href="./adminviewStudentTranscript.php">View Student Transcript</a></li>
              <li><a class="dropdown-item" href="./adminviewAttendance.php">View Student Attendance</a></li>
              <li><a class="dropdown-item" href="./adminviewHolds.php">View Student Holds</a></li>
            </ul>
          </div>
          <div class="dropdown">
            <button class="btn btn-bg-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              View Faculty
            </button>
            <ul ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="./adminviewFaculty.php">View Faculty</a></li>
              <li><a class="dropdown-item" href="./adminviewFacultyPart.php">View Part-Time Faculty</a></li>
              <li><a class="dropdown-item" href="./adminviewFacultyFull.php">View Full-Time Faculty</a></li>
              <li><a class="dropdown-item" href="./adminviewFacultyHistory.php">View Faculty History</a></li>
              <li><a class="dropdown-item" href="./adminviewAdvisor.php">View Advisor</a></li>
            </ul>
          </div>
          <div class="dropdown">
            <button class="btn btn-bg-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Tools
            </button>
            <ul ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="./adminviewCourse.php">View Courses</a></li>
              <li><a class="dropdown-item" href="./adminviewMajors.php">View Majors</a></li>
              <li><a class="dropdown-item" href="./adminviewMajorCourses.php">View Major Requirements</a></li>
              <li><a class="dropdown-item" href="./adminviewMinors.php">View Minors</a></li>
              <li><a class="dropdown-item" href="./adminviewMinorCourses.php">View Minor Requirements</a></li>
              <li><a class="dropdown-item" href="./adminviewDepts.php">View Departments</a></li>
              <li><a class="dropdown-item" href="./adminviewCalendar.php">View Academic Calendar</a></li>
            </ul>
          </div>
        </ul>
        <a href="editProfile.php" class="btn btn-warning"><?php echo $row['fname'] ?> <?php echo $row['lname'] ?></a>
        <a href="../logout.php" class="btn btn-primary">Log Out</a>
      </div>
    </div>
  </nav>

  <section>
    <div class="row justify-content-center">

      <div class="card" style="width: 18rem;">
        <div class="card-body text-center">
          <h5 class="card-title">Students Attending</h5>
          <h4 class="card-text "><?php echo $studentCount['stuTotal']; ?></h4>
          <img src="https://www.nicepng.com/png/detail/256-2560632_student-clipart-black-and-white-l-011-student.png" class="img-fluid" alt="Student Image">
        </div>
      </div>

      <div class="card h-25" style="width: 18rem;">
        <div class="card-body text-center">
          <h5 class="card-title">Faculty Count</h5>
          <h4 class="card-text "><?php echo $facultyCount['facCount']; ?></h4>
          <img src="https://cdn.pixabay.com/photo/2014/04/03/09/59/teacher-309533_960_720.png" style=" width: 85%;" alt="Faculty Image">
        </div>
      </div>
    </div>
  </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

</html>