<?php
session_start();
include "../navigations/config.php";
if(!isset($_SESSION['userid'])){
    header("Location: ../login.php");
  }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Hold</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

    <?php
    if(isset($_POST['edit_hold_btn'])) {
    $holdname = $_POST['holdname'];

    $query = "SELECT hold.holdname, hold.holdtype, hold.holddesc FROM hold";
    $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row) {
        ?>
    <form action="Hold_Code.php" method ="POST">
        <div class="form-group">
            <label>Hold Name</label>
            <input type="varchar(300)" name="holdname" value="<?php echo $row['holdname'] ?>" class="form-control" placeholder="Enter Hold Name">
        </div>
        <div class="form-group">
            <label>Hold Type</label>
            <input type="varchar(300)" name="holdtype" value="<?php echo $row['holdtype'] ?>" class="form-control" placeholder="Enter Hold Type">
        </div>
        <div class="form-group">
            <label>Hold Description</label>
            <input type="varchar(300)" name="holddesc" value="<?php echo $row['holddesc'] ?>" class="form-control" placeholder="Enter Hold Description">
        </div>
        <a href="../navigations/admin/adminviewHolds.php" class="btn btn-danger"> Cancel </a>
        <button type="submit" name="update_hold_btn" class="btn btn-success"> Update </button>
    </form>
        <?php
    }
    }
    ?>
</head>