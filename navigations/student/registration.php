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
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Student Homepage</a>
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
            <h1 class="mt-2 mb-3 text-center text-primary">Registration</h1>
            <form action="registration.php" method="POST">
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
            <h2 class="mt-2 mb-3 text-center text-warning"><?php echo $row["semname"];
                                                            echo " ";
                                                            echo $row["year"]; ?></h2>
            <div class="table-responsive">
                <table id="master" class="table table-bordered">
                    <thead>
                        <tr>
                            <td>CRN</td>
                            <td>Course ID</td>
                            <td>Course Name</td>
                            <td>Section</td>
                            <td>Instructor</td>
                            <td>Days</td>
                            <td>Time</td>
                            <td>Room</td>
                            <td>Seats Available</td>
                            <td>Semester</td>
                            <td>Register</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['get_semyear'])) {
                            $get_semyear = $_POST['select_box'];
                            $query = "SELECT *, day.weekday AS weekday1 FROM course INNER JOIN section ON course.courseid=section.courseid INNER JOIN faculty ON section.facultyid=faculty.facultyid  
                                INNER JOIN user ON faculty.facultyid=user.userid INNER JOIN timeslotperiod ON section.timeslotid=timeslotperiod.timeslotid 
                                INNER JOIN period ON timeslotperiod.periodid=period.periodid INNER JOIN timeslotday ON section.timeslotid = timeslotday.timeslotid 
                                INNER JOIN day ON timeslotday.dayoid=day.dayid INNER JOIN day s ON timeslotday.daytid=s.dayid WHERE semyear='$get_semyear'";
                            $query_run = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_array($query_run)) { ?>
                                <tr>
                                    <td> <?php echo $row['crn']; ?> </td>
                                    <td> <?php echo $row['courseid']; ?> </td>
                                    <td> <?php echo $row['coursename']; ?> </td>
                                    <td> <?php echo $row['sectionnum']; ?> </td>
                                    <td> <?php echo $row['fname'];
                                            echo " ";
                                            echo $row['lname']; ?> </td>
                                    <td> <?php echo $row['weekday1'];
                                            echo "/";
                                            echo $row['weekday']; ?> </td>
                                    <td> <?php echo $row['pstart'];
                                            echo " - ";
                                            echo $row['pend']; ?> </td>
                                    <td> <?php echo $row['roomid']; ?> </td>
                                    <td> <?php echo $row['numofseats']; ?> </td>
                                    <td> <?php echo $row['semyear']; ?> </td>
                                    <td>
                                        <form action="./registerClass.php?id=<?= $row['crn']; ?>&cid=<?= $row['courseid']; ?>&year=<?= $row['semyear']; ?>" method="post">
                                            <input type="hidden" name="userid" value="<?php echo $row['studentid']; ?>">
                                            <button type="submit" name="register_btn" class=" btn btn-primary" <?php if ($get_semyear != 'S2023') { ?> disabled <?php   } ?>>Register</button>
                                        </form>
                                    </td>
                                </tr> <?php
                                    }
                                }
                                        ?>
                    </tbody>
                </table>
            </div>
</body>

</html>

<script>
    var select_box_element = document.querySelector('#select_box');

    dselect(select_box_element, {
        search: true
    });
</script>

<script>
    $(document).ready(function() {
        $('#master').DataTable();
    });
</script>