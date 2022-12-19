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
    <title>Edit Event</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

    <?php
    if (isset($_POST['edit_event'])) {
        $date = $_POST['date'];
        $event = $_POST['event'];

        $query = "SELECT * FROM accal WHERE date = '$date' AND event = '$event'";
        $query_run = mysqli_query($connection, $query);

        foreach ($query_run as $row) {
    ?>
            <form action="code.php" method="POST">
                <div class="form-group">
                    <label>Date</label>
                    <input type="varchar(300)" name="studentid" value="<?php echo $row['date'] ?>" class="form-control" placeholder="Enter Date">
                </div>
                <div class="form-group">
                    <label>Event</label>
                    <input type="varchar(300)" name="crn" value="<?php echo $row['event'] ?>" class="form-control" placeholder="Enter Event">
                </div>
                <a href="../navigations/admin/adminviewCalendar.php" class="btn btn-danger"> Cancel </a>
                <button type="submit" name="updateEvent_btn" class="btn btn-success"> Update </button>
            </form>
    <?php
        }
    }
    ?>
</head>