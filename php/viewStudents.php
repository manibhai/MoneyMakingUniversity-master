<?php
session_start();
include "../navigations/config.php";
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

        <div class="container-fluid">
            <a class="navbar-brand" href="../navigations/faculty/index.php">Faculty Homepage</a>
        </div>
        <div class="container-fluid">
            <a class="btn btn-lg btn-warning" href="../navigations/faculty/facultyviewHistory.php">View History</a>
        </div>
        <div class="container-fluid">
            <a class="btn btn-lg btn-danger" href="../logout.php" role="button">Logout</a>
        </div>
    </nav>
</head>

<body>
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
        <?php
        if (isset($_POST['btn_students'])) {
            $crn = $_POST['crn'];
            $query = "SELECT * FROM user INNER JOIN studenthistory ON user.userid=studenthistory.studentid 
                        INNER JOIN course ON studenthistory.courseid=course.courseid WHERE studenthistory.crn = '$crn'";
            $query_run = mysqli_query($connection, $query);

        ?>
            <h3 align="center">Info</h3>
            <div class="table-responsive">
                <table id="usersdata" class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Student ID</td>
                            <td>Student Name</td>
                            <td>CRN</td>
                            <td>Course Name</td>
                            <td>Grade</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($query_run)) { ?>
                            <tr>
                                <td> <?php echo $row['studentid']; ?> </td>
                                <td> <?php echo $row['fname'];
                                        echo " ";
                                        echo $row['lname']; ?> </td>
                                <td> <?php echo $row['crn']; ?> </td>
                                <td> <?php echo $row['coursename']; ?> </td>
                                <td> <?php echo $row['grade']; ?> </td>
                            </tr> <?php
                                }

                                    ?>
                    </tbody>
                </table>
            </div>

        <?php }
        ?>
    </div>

</html>

<script>
    $(document).ready(function() {
        $('#usersdata').DataTable();
    });
</script>