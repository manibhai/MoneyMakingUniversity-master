<?php
session_start();
include "../config.php";

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Faculty History</title>
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
            <a class="btn btn-lg btn-warning" href="adminviewStudentHistory.php" role="button">Reset</a>
        </div>
        <div class="container-fluid">
            <a class="btn btn-lg btn-danger" href="../logout.php" role="button">Logout</a>
        </div>
    </nav>
</head>
<form action="adminviewFacultyHistory.php" method="POST">
    <div class="input-group">
        <input type="search" name="facultyid" class="form-control rounded" placeholder="Enter Faculty ID" aria-label="Search" aria-describedby="search-addon" />
        <button type="submit" name="searchFaculty" class="btn btn-outline-primary">Search</button>
    </div>
</form>


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
            echo '<h2> ' . $_SESSION['status'] . '</h2>';
            unset($_SESSION['status']);
        }
        ?>
        <h3 align="center">Faculty History</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>Faculty ID</td>
                        <td>Faculty Name</td>
                        <td>CRN</td>
                        <td>Course ID</td>
                        <td>Semester</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['searchFaculty'])) {
                        $facultyid = $_POST['facultyid'];
                        $query = "SELECT * FROM facultyhistory INNER JOIN user ON facultyhistory.facultyid = user.userid WHERE user.userid = $facultyid";
                        $query_run = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_array($query_run)) { ?>
                            <tr>
                                <td> <?php echo $row['facultyid']; ?> </td>
                                <td> <?php echo $row['fname'];
                                        echo " ";
                                        echo $row['lname']; ?> </td>
                                <td> <?php echo $row['crn']; ?> </td>
                                <td> <?php echo $row['courseid']; ?> </td>
                                <td> <?php echo $row['semyear']; ?> </td>
                            </tr> <?php
                                }
                            }
                                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>