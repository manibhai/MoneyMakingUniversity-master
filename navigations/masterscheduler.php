<?php
include "config.php";
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Master Schedule for Spring Semester 2023</title>
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
    <h3 align="center">Master Schedule for Spring Semester 2023</h3>
    <br />
    <div class="table-responsive">
      <table id="employee_data" class="table table-striped table-bordered">
        <thead>
          <tr>
            <td>CRN</td>
            <td>Course</td>
            <td>Section</td>
            <td>Faculty Name</td>
            <td>Days</td>
            <td>Time</td>
            <td>Room</td>
            <td>Semester Year</td>
            <td>Available Seats</td>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * FROM section INNER JOIN faculty ON section.facultyid=faculty.facultyid  
              INNER JOIN user ON faculty.facultyid=user.userid WHERE semyear='S2023'";
          $query_run = mysqli_query($connection, $query);

          while ($row = mysqli_fetch_array($query_run)) { ?>
            <tr>
              <td> <?php echo $row['crn']; ?> </td>
              <td> <?php echo $row['courseid']; ?> </td>
              <td> <?php echo $row['sectionnum']; ?> </td>
              <td> <?php echo $row['fname'];
                    echo " ";
                    echo $row['lname']; ?> </td>
              <td> <?php echo $row['timeslotid']; ?> </td>
              <td> <?php echo $row['roomid']; ?> </td>
              <td> <?php echo $row['semyear']; ?> </td>
              <td> <?php echo $row['numofseats']; ?> </td>
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