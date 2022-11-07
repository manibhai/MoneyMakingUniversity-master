<?php
session_start();
include "../config.php";
if (!isset($_SESSION['id'])) {
  header("Location: ../login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Departments</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Admin Homepage</a>
    </div>

    <div class="container-fluid">
      <button type="button" class="btn btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
        Create Department
      </button>
      <!--Modal for edit/Delete-->
      <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class=" modal-title fs-5" id="editModal">Edit Department</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!--Modal body inside of form-->
            <!--Connects the for and post to the method that is located in code.php(Server fucntions)-->
            <form action="../../php/Dept_Code.php" method="post">
              <div class="modal-body">
                <div class="form-group">
                  <!--Fill in form contents-->
                  <label> Department ID</label>
                  <input type="varchar(300)" name="deptid" class="form-control" placeholder="Enter Department ID">
                </div>
                <div class="form-group">
                  <!--Fill in form contents-->
                  <label> Department Name</label>
                  <input type="varchar(300)" name="deptname" class="form-control" placeholder="Enter Department Name">
                </div>
                <div class="form-group">
                  <label>Department Email</label>
                  <input type="varchar(300)" name="deptemail" class="form-control" placeholder="Enter Department Email">
                </div>
                <div class="form-group">
                  <label>Building</label>
                  <input type="varchar(300)" name="buildingid" class="form-control" placeholder="Enter Building">
                </div>
                <div class="form-group">
                  <label>Room</label>
                  <input type="varchar(300)" name="roomid" class="form-control" placeholder="Enter Room">
                </div>
                <div class="form-group">
                  <label>Department Phone</label>
                  <input type="varchar(300)" name="deptphone" class="form-control" placeholder="Enter Department Phone">
                </div>
                <div class="form-group">
                  <label>Department chair</label>
                  <input type="int" name="deptchair" class="form-control" placeholder="Enter Department Chair">
                </div>
                <div class="form-group">
                  <label>Department Manager</label>
                  <input type="int" name="deptmg" class="form-control" placeholder="Enter Department Manager">
                </div>
              </div>
              <!--Footer button goes here-->
              <div class="modal-footer">
                <button type="submit" name="c_btn" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <a class="btn btn-lg btn-danger" href="../logout.php" role="button">Logout</a>
    </div>
  </nav>
</head>

<body>
  <br /><br />
  <!--Php to connect to show if changes were successful-->

  <div class="card-body">
    <?php
    if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
      echo '<h2>' . $_SESSION['success'] . '</h2>';
      unset($_SESSION['success']);
    }
    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
      echo '<h2>' . $_SESSION['status'] . '</h2>';
      unset($_SESSION['status']);
    }
    ?>
    <h3 align="center">Departments</h3>
    <div class="table-responsive">
      <table id="deptdata" class="table table-bordered">
        <thead>
          <tr>
            <td>Department ID</td>
            <td>Department Name</td>
            <td>Department Email</td>
            <td>Building</td>
            <td>Room</td>
            <td>Department Phone</td>
            <td>Department Chair</td>
            <td>Department Manager</td>
            <td>Edit Department</td>
            <td>Delete Department</td>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * FROM department";
          $query_run = mysqli_query($connection, $query);
          //$query_run = mysqli_query($connection, $query1);

          while ($row = mysqli_fetch_array($query_run)) { ?>
            <tr>
              <td> <?php echo $row['deptid']; ?> </td>
              <td> <?php echo $row['deptname']; ?> </td>
              <td> <?php echo $row['deptemail']; ?> </td>
              <td> <?php echo $row['buildingid']; ?> </td>
              <td> <?php echo $row['roomid']; ?> </td>
              <td> <?php echo $row['deptphone']; ?> </td>
              <td> <?php echo $row['deptchair']; ?> </td>
              <td> <?php echo $row['deptmg']; ?> </td>
              <td>
                <form action="../../php/editDepartments.php" method="POST" class="text-center">
                  <input type="hidden" name="editDept" value=" <?php echo $row['deptid'] ?>">
                  <button type="submit" name="edit_btn" class="btn btn-warning"> Edit </button>

              </td>
              </form>
              <td>
                <form action="../../php/editDepartments.php" method="POST">
                  <input type="hidden" name="editDept" value=" <?php echo $row['deptid'] ?>">
                  <button type="submit" name="edit_btn" class="btn btn-danger"> Delete </button>
              </td>
              </form>

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
    $('#deptdata').DataTable();
  });
</script>