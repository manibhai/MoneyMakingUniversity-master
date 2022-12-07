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
    <title>Minor Requirements</title>
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
                Add a Course to Minor
            </button>
            <!--Modal for edit/Delete-->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class=" modal-title fs-5" id="editModal">Add Course</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!--Modal body inside of form-->
                        <!--Connects the for and post to the method that is located in code.php(Server fucntions)-->
                        <form action="../../php/mm_Code.php" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <!--Fill in form contents-->
                                    <label> Course ID</label>
                                    <input type="varchar(300)" name="courseid" class="form-control" placeholder="Enter Course ID">
                                </div>
                                <div class="form-group">
                                    <!--Fill in form contents-->
                                    <label> Minor ID</label>
                                    <input type="varchar(300)" name="minorid" class="form-control" placeholder="Enter Minor ID">
                                </div>
                            </div>
                            <!--Footer button goes here-->
                            <div class="modal-footer">
                                <button type="submit" name="minorreq_btn" class="btn btn-primary">Save</button>
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
        <h3 align="center">Minor Requirements</h3>
        <div class="table-responsive">
            <table id="minordata" class="table table-bordered">
                <thead>
                    <tr>
                        <td>Course ID</td>
                        <td>Course Name</td>
                        <td>Course Credits</td>
                        <td>Grade Required</td>
                        <td>Minor Name</td>
                        <td>Total Credits</td>
                        <td>Department Name</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM course INNER JOIN department ON course.deptid = department.deptid INNER JOIN minor 
                    ON department.deptid = minor.deptid INNER JOIN minorcourse ON minor.minorid = minorcourse.minorid";
                    $query_run = mysqli_query($connection, $query);
                    //$query_run = mysqli_query($connection, $query1);

                    while ($row = mysqli_fetch_array($query_run)) { ?>
                        <tr>
                            <td> <?php echo $row['courseid']; ?> </td>
                            <td> <?php echo $row['coursename']; ?> </td>
                            <td> <?php echo $row['numofcredits']; ?> </td>
                            <td> <?php echo $row['gradereq']; ?> </td>
                            <td> <?php echo $row['minorname']; ?> </td>
                            <td> <?php echo $row['creditsreq']; ?> </td>
                            <td> <?php echo $row['deptname']; ?> </td>

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
        $('#minordata').DataTable();
    });
</script>