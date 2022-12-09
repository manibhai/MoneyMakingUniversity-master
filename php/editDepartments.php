<?php
session_start();
include "../navigations/config.php";
if (!isset($_SESSION['id'])) {
  header("Location: ../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Department</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

  <?php
  if (isset($_POST['edit_dept'])) {
    $deptid = $_POST['deptid'];

    $query = "SELECT * FROM department WHERE deptid = '$deptid'";
    $query_run = mysqli_query($connection, $query);

    foreach ($query_run as $row) {
  ?>
      <form action="dept_code.php" method="POST">
        <div class="form-group">
          <label>Department ID</label>
          <input type="varchar(300)" name="deptid" disabled value="<?php echo $row['deptid'] ?>" class="form-control" placeholder=" Department ID">
        </div>

        <div class="form-group">
          <label>Department Name</label>
          <input type="varchar(300)" name="deptname" value="<?php echo $row['deptname'] ?>" class="form-control" placeholder="">
        </div>
        <div class="form-group">
          <label>Department Email</label>
          <input type="varchar(300)" name="deptemail" value="<?php echo $row['deptemail'] ?>" class="form-control" placeholder="">
        </div>
        <div class="form-group">
          <label>Building</label>
          <input type="varchar(300)" name="buildingid" value="<?php echo $row['buildingid'] ?>" class="form-control" placeholder="">
        </div>
        <div class="form-group">
          <label>Room</label>
          <input type="varchar(300)" name="roomid" value="<?php echo $row['roomid'] ?>" class="form-control" placeholder="">
        </div>
        <div class="form-group">
          <label>Department Phone</label>
          <input type="varchar(300)" name="deptphone" value="<?php echo $row['deptphone'] ?>" class="form-control" placeholder="">
        </div>
        <div class="form-group">
          <label>Department Chair</label>
          <input type="int" name="deptchair" value="<?php echo $row['deptchair'] ?>" class="form-control" placeholder="">
        </div>
        <div class="form-group">
          <label>Department Manager</label>
          <input type="int" name="deptmg" value="<?php echo $row['deptmg'] ?>" class="form-control" placeholder="">
        </div>
        <a href="../navigations/admin/adminviewDepts.php" class="btn btn-danger"> Cancel </a>
        <button type="submit" name="update_dept" class="btn btn-success"> Update </button>
      </form>
  <?php
    }
  }
  ?>
</head>