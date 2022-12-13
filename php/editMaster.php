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
    <title>Edit Master Scheduler</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

    <?php
    if (isset($_POST['edit_master'])) {
        $crn = $_POST['crn'];

        $query = "SELECT * FROM section WHERE crn = $crn";
        $query_run = mysqli_query($connection, $query);

        foreach ($query_run as $row) {
    ?>
            <form action="code.php" method="POST">
                <div class="form-group">
                    <label>CRN</label>
                    <input type="hidden" name="crn" value="<?php echo $row['crn'] ?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Course ID</label>
                    <input type="varchar(300)" name="courseid" value="<?php echo $row['courseid'] ?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Section Num</label>
                    <input type="varchar(300)" name="sectionnum" value="<?php echo $row['sectionnum'] ?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Faculty ID</label>
                    <input type="varchar(300)" name="facultyid" value="<?php echo $row['facultyid'] ?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Time Slot ID</label>
                    <input type="varchar(300)" name="timeslotid" value="<?php echo $row['timeslotid'] ?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Room</label>
                    <input type="varchar(300)" name="roomid" value="<?php echo $row['roomid'] ?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Number of Seats</label>
                    <input type="varchar(300)" name="numofseats" value="<?php echo $row['numofseats'] ?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Semester Year</label>
                    <input type="varchar(300)" name="semyear" value="<?php echo $row['semyear'] ?>" class="form-control" placeholder="">
                </div>
                <a href="../navigations/admin/adminviewMaster.php" class="btn btn-danger"> Cancel </a>
                <button type="submit" name="update_master" class="btn btn-success"> Update </button>
            </form>
    <?php
        }
    }
    ?>
</head>