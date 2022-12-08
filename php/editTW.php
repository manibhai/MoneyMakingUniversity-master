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
    <title>Edit Time Window</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

    <?php
    if (isset($_POST['edit_window'])) {
        $timewindowid = $_POST['timewindowid'];

        $query = "SELECT * FROM timewindow WHERE timewindowid = '$timewindowid'";
        $query_run = mysqli_query($connection, $query);

        foreach ($query_run as $row) {
    ?>
            <form action="code.php" method="POST">
                <div class="form-group">
                    <label>Time Window ID</label>
                    <input type="varchar(300)" name="timewindowid" disabled value="<?php echo $row['timewindowid'] ?>" class="form-control" placeholder="Enter Time Window ID">
                </div>
                <div class="form-group">
                    <label>Register Cut Off</label>
                    <input type="varchar(300)" name="regcutoff" value="<?php echo $row['regcutoff'] ?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Drop Cut Off</label>
                    <input type="varchar(300)" name="dropcutoff" value="<?php echo $row['dropcutoff'] ?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Exam Cut Off</label>
                    <input type="varchar(300)" name="examcutoff" value="<?php echo $row['examcutoff'] ?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Grade Cut Off</label>
                    <input type="varchar(300)" name="gradecutoff" value="<?php echo $row['gradecutoff'] ?>" class="form-control" placeholder="">
                </div>
                <a href="../navigations/admin/adminviewTimeWindows.php" class="btn btn-danger"> Cancel </a>
                <button type="submit" name="update_window" class="btn btn-success"> Update </button>
            </form>
    <?php
        }
    }
    ?>
</head>