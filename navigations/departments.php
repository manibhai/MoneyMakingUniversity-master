<?php
include "config.php";
?>

<!doctype html>
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
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3">
    <div class="container">
      <a href="../index.php" class="navbar-brand">Money Making University</a>
    </div>
  </nav>
</head>

<body>
  <br /><br />
  <div class="container">
    <h3 align="center">Departments</h3>
    <br />
    <div class="table-responsive">
      <table id="employee_data" class="table table-striped table-bordered">
        <thead>
          <tr>
            <td>Department Name</td>
            <td>Department Email</td>
            <td>Building</td>
            <td>Room</td>
            <td>Department Phone</td>
            <td>Department Chair</td>
            <td>Department Manager</td>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT *, user.fname AS fname1, user.lname AS lname1 FROM department 
                    INNER JOIN user ON department.deptchair=user.userid 
                    INNER JOIN user u ON department.deptmg=u.userid";
          $query_run = mysqli_query($connection, $query);

          while ($row = mysqli_fetch_array($query_run)) { ?>
            <tr>
              <td> <?php echo $row['deptname']; ?> </td>
              <td> <?php echo $row['deptemail']; ?> </td>
              <td> <?php echo $row['buildingid']; ?> </td>
              <td> <?php echo $row['roomid']; ?> </td>
              <td> <?php echo $row['deptphone']; ?> </td>
              <td> <?php echo $row['fname'];
                    echo " ";
                    echo $row['lname']; ?> </td>
              <td> <?php echo $row['fname1'];
                    echo " ";
                    echo $row['lname1']; ?> </td>
            </tr> <?php
                }
                  ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>
<script>
  $(document).ready(function() {
    $('#employee_data').DataTable();
  });
</script>