<?php
session_start();
include "../config.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assign Grades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Faculty Homepage</a>
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
            echo '<h2> ' . $_SESSION['status'] . '</h2>';
            unset($_SESSION['status']);
        }

        $query = "SELECT * FROM semesteryear ORDER BY year DESC";
        $query_run = mysqli_query($connection, $query);
        ?>
        <div class="container">
            <h1 class="mt-2 mb-3 text-center text-primary">Semester</h1>
            <form action="facultyviewGrades.php" method="POST">
                <div class="row">
                    <div class="col-md-3">&nbsp;</div>
                    <div class="col-md-6">
                        <select name="select_box" class="form-select" id="select_box">
                            <option value="">Select Semester Year</option>
                            <?php
                            foreach ($query_run as $row) {
                                echo "<option value=" . $row["semyear"] . ">" . $row["semname"] . " " . $row["year"] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md">
                        <button type="submit" name="get_semyear" class="btn btn-primary">Submit</button>
                    </div>
                    <div class="col-md-3">&nbsp;</div>
                </div>
            </form>
            <br />
            <br />
        </div>
        <br /><br />
        <!--Php to connect to show if changes were successful-->
        <h3 align="center">Assign Grade</h3>
        <div class="table-responsive">
            <table id="usersdata" class="table table-bordered">
                <thead>
                    <tr>
                        <td>Student ID</td>
                        <td>CRN</td>
                        <td>Course ID</td>
                        <td>Grade</td>
                        <td>Edit Grade</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['get_semyear'])) {
                        $get_semyear = $_POST['select_box'];
                        $currUser = $_SESSION['id'];
                        $query = "SELECT * FROM studenthistory INNER JOIN section ON studenthistory.crn=section.crn 
                                WHERE section.facultyid = '$currUser' AND studenthistory.semyear='$get_semyear'";
                        $query_run = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_array($query_run)) { ?>
                            <tr>
                                <td> <?php echo $row['studentid']; ?> </td>
                                <td> <?php echo $row['crn']; ?> </td>
                                <td> <?php echo $row['courseid']; ?> </td>
                                <td> <?php echo $row['grade']; ?> </td>
                                <td>
                                    <form action="../../php/viewStudents.php?id=<?= $row['studentid']; ?>&&crn=<?= $row['crn']; ?>" method="post">
                                        <input type="hidden" name="studentid" value="<?php echo $row['studentid']; ?>">
                                        <input type="hidden" name="crn" value="<?php echo $row['crn']; ?>">
                                        <button type="submit" name="btn_students" class=" btn btn-primary" <?php if ($row['grade'] != 'IP') { ?> disabled <?php   } ?>>View
                                    </form>
                                </td>
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

<script>
    $(document).ready(function() {
        $('#usersdata').DataTable();
    });
</script>