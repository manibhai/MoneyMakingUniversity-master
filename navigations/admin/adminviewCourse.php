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
    <title>Student Information</title>
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
        <h3 align="center">Student Information</h3>
        <div class="table-responsive">
            <table id="usersdata" class="table table-bordered">
                <thead>
                    <tr>
                        <td>Course ID</td>
                        <td>Course Name</td>
                        <td>Prerequisite</td>
                        <td>Credits</td>
                        <td>Department</td>
                        <td>Description</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM course INNER JOIN department ON course.deptid = department.deptid INNER JOIN prerequisite ON course.courseid = prerequisite.courseid";
                    $query_run = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_array($query_run)) { ?>
                        <tr>
                            <td><?php echo $row['courseid']; ?></td>
                            <td><?php echo $row['coursename']; ?></td>
                            <td><?php echo $row['prerequisiteid']; ?></td>
                            <td><?php echo $row['numofcredits']; ?></td>
                            <td><?php echo $row['deptname']; ?></td>
                            <td><?php echo $row['coursedesc']; ?></td>
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
        $('#usersdata').DataTable();
    });
</script>