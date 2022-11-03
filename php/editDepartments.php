<?php
session_start();
include "../navigations/config.php";
if(!isset($_SESSION['id'])){
  header("Location: ../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Departments</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
</head>
<body>
  <?php
    if(isset($_POST['edit_btn'])){
      $deptid= $_POST['deptid'];
    
      $query= "SELECT * FROM department";
      $query_run = mysqli_query($connection, $query);
      foreach($query_run as $row) {
        ?>
        <form action="code.php" method="POST">
        <div class="form-group">
            <label>Department ID</label>
            <input type="hidden" name="deptid" value="<?php echo $row['deptid'] ?>" class="form-control" placeholder=" Department ID">
        </div>

        <div class="form-group">
            <label>Department Name</label>
            <input type="varchar(300)" name="deptName" value="<?php echo $row['deptname'] ?>" class="form-control" placeholder="Enter Department Name">
        </div>
        <div class="form-group">
            <label>Department Email</label>
            <input type="varchar(300)" name="deptEmail" value="<?php echo $row['deptemail'] ?>" class="form-control" placeholder="Enter Department Email">
        </div>
        <div class="form-group">
            <label>Building</label>
            <input type="varchar(300)" name="building" value="<?php echo $row['buildingid'] ?>" class="form-control" placeholder="Enter Department Building">
        </div>
        <div class="form-group">
            <label>Room</label>
            <input type="varchar(300)" name="room" value="<?php echo $row['roomid'] ?>" class="form-control" placeholder="Enter Department room">
        </div>
        <div class="form-group">
            <label>Department Phone</label>
            <input type="varchar(300)" name="deptPhone" value="<?php echo $row['deptphone'] ?>" class="form-control" placeholder="Enter Department Phone">
        </div>
        <div class="form-group">
            <label>Department Chair</label>
            <input type="varchar(300)" name="deptchair" value="<?php echo $row['deptchair'] ?>" class="form-control" placeholder="Enter Department Chair">
        </div>
        <div class="form-group">
            <label>Department Manager</label>
            <input type="varchar(300)" name="deptmg" value="<?php echo $row['deptmg'] ?>" class="form-control" placeholder="Enter Department Manager">
        </div>
        <a href="../navigations/admin/adminviewDepts.php" class="btn btn-danger"> Cancel </a>
        <button type="submit" name="update_btn" class="btn btn-success"> Update </button>
        </form>
        <?php
      }
      } 
  ?>
</body>
</html>