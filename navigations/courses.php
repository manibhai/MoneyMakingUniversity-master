<?php
include "config.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Courses</title>
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
  <div class="container">
    <h3 align=center> Courses</h3>
    <div class="table-responsive">
      <table id="course_data" class="table table-striped table-bordered">
        <thead>
          <tr>
            <td>Course ID</td>
            <td>Course Name</td>
            <td>Credits</td>
            <td>Department</td>
            <td>Description</td>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * FROM course INNER JOIN department WHERE course.deptid = department.deptid";
          $query_run = mysqli_query($connection, $query);

          while ($row = mysqli_fetch_array($query_run)) { ?>
            <tr>
              <td><?php echo $row['courseid']; ?></td>
              <td><?php echo $row['coursename']; ?></td>
              <td><?php echo $row['numofcredits']; ?></td>
              <td><?php echo $row['deptname']; ?></td>
              <td><?php echo $row['coursedesc']; ?></td>
            </tr><?php
                } ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
<script>
  $(document).ready(function() {
    $('#course_data').DataTable();
  });
</script>

</html>