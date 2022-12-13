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
    <title>View Students</title>
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
                New Student
            </button>
            <!--Modal for edit/Delete-->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class=" modal-title fs-5" id="editModal">Create A Student</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!--Modal body inside of form-->
                        <!--Connects the for and post to the method that is located in code.php(Server fucntions)-->
                        <form action="../../php/mm_Code.php" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <!--Fill in form contents-->
                                    <label>Student ID</label>
                                    <input type="int" name="studentid" class="form-control" placeholder="Enter Student ID">
                                </div>
                                <div class="form-group">
                                    <!--Fill in form contents-->
                                    <label>Grad Level</label>
                                    <input type="varchar(300)" name="gradlevel" class="form-control" placeholder="(Undergrad , Graduate)">
                                </div>
                                <div class="form-group">
                                    <label>Major ID</label>
                                    <input type="varchar(300)" name="majorid" class="form-control" placeholder="Enter Major ID">
                                </div>
                                <div class="form-group">
                                    <label>Minor ID</label>
                                    <input type="varchar(300)" name="minorid" class="form-control" placeholder="Enter Minor ID">
                                </div>
                                <div class="form-group">
                                    <label>Full Time or Part Time</label>
                                    <input type="varchar(300)" name="fullpart" class="form-control" placeholder="(Full Time / Part Time)">
                                </div>
                            </div>
                            <!--Footer button goes here-->
                            <div class="modal-footer">
                                <button type="submit" name="create_student" class="btn btn-primary">Create</button>
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
        <h3 align="center">Student Information</h3>
        <div class="table-responsive">
            <table id="usersdata" class="table table-bordered">
                <thead>
                    <tr>
                        <td>Student ID</td>
                        <td>Name</td>
                        <td>Student Type</td>
                        <td>Majors</td>
                        <td>Minors</td>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM student
                    INNER JOIN studentmajor ON student.studentid = studentmajor.studentid 
                    INNER JOIN major ON studentmajor.majorid = major.majorid
                    INNER JOIN studentminor ON student.studentid = studentminor.studentid 
                    INNER JOIN minor ON studentminor.minorid = minor.minorid  
                    INNER JOIN user ON student.studentid=user.userid";
                    $query_run = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_array($query_run)) { ?>
                        <tr>
                            <td> <?php echo $row['studentid']; ?> </td>
                            <td> <?php echo $row['fname'];
                                    echo " ";
                                    echo $row['lname']; ?> </td>
                            <td> <?php echo $row['gradlevel']; ?> </td>
                            <td> <?php echo $row['majorname']; ?> </td>
                            <td> <?php echo $row['minorname']; ?> </td>

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