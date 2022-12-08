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
    <title>Edit Student Grades</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

    <?php
    if (isset($_POST['edit_grade'])) {
        $studentid = $_POST['studentid'];
        $crn = $_POST['crn'];

        $query = "SELECT * FROM studenthistory WHERE studentid = '$studentid' AND crn = '$crn'";
        $query_run = mysqli_query($connection, $query);

        foreach ($query_run as $row) {
    ?>
            <form action="code.php" method="POST">
                <div class="form-group">
                    <label>Student ID</label>
                    <input type="int" name="studentid" disabled value="<?php echo $row['studentid'] ?>" class="form-control" placeholder="Enter Student's ID">
                </div>
                <div class="form-group">
                    <label>CRN</label>
                    <input type="int" name="crn" disabled value="<?php echo $row['crn'] ?>" class="form-control" placeholder="Enter CRN">
                </div>
                <div class="form-group">
                    <label>Course</label>
                    <input type="varchar(300)" name="courseid" disabled value="<?php echo $row['courseid'] ?>" class="form-control" placeholder="Enter Course ID">
                </div>
                <div class="form-group">
                    <label>Semester</label>
                    <input type="varchar(300)" name="semyear" disabled value="<?php echo $row['semyear'] ?>" class="form-control" placeholder="Enter Semester Year">
                </div>
                <div class="form-group">
                    <label>Grade</label>
                    <input type="varchar(300)" name="grade" value="<?php echo $row['grade'] ?>" class="form-control" placeholder="Enter Grade">
                </div>
                <a href="../navigations/admin/adminviewStudentDegreeAudit.php" class="btn btn-danger"> Cancel </a>
                <button type="submit" name="updateGrade_btn" class="btn btn-success"> Update </button>
            </form>
    <?php
        }
    }
    ?>
</head>