<?php
session_start();
include "../navigations/config.php";
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Course</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

    <?php
    if (isset($_POST['editCourse_btn'])) {
        $courseid = $_POST['courseid'];

        $query = "SELECT * FROM course WHERE course.courseid = $courseid";
        $query_run = mysqli_query($connection, $query);

        foreach ($query_run as $row) {
    ?>
            <form action="code.php" method="POST">
                <div class="form-group">
                    <label>Course ID</label>
                    <input type="hidden" name="courseid" value="<?php echo $row['courseid'] ?>" class="form-control" placeholder="Enter Course ID">
                </div>
                <div class="form-group">
                    <label>Course Name</label>
                    <input type="varchar(300)" name="coursename" value="<?php echo $row['coursename'] ?>" class="form-control" placeholder="Enter Course Name">
                </div>
                <div class="form-group">
                    <label>Number of Credits</label>
                    <input type="varchar(300)" name="numofcredits" value="<?php echo $row['numofcredits'] ?>" class="form-control" placeholder="Enter # of credits">
                </div>
                <div class="form-group">
                    <label>Department ID</label>
                    <input type="varchar(300)" name="pass" value="<?php echo $row['deptid'] ?>" class="form-control" placeholder="Enter Department ID">
                </div>
                <div class="form-group">
                    <label>Course Description</label>
                    <input type="varchar(300)" name="lname" value="<?php echo $row['coursedesc'] ?>" class="form-control" placeholder="Enter Course Description">
                </div>
                <a href="../navigations/admin/adminviewCourse.php" class="btn btn-danger"> Cancel </a>
                <button type="submit" name="updateCourse_btn" class="btn btn-success"> Update </button>
            </form>
    <?php
        }
    }
    ?>
</head>