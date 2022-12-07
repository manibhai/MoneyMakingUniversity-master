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
    <title>Master Scheduler</title>
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
                Add To Master Schedule
            </button>
            <!--Modal for edit/Delete-->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class=" modal-title fs-5" id="editModal">Info</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!--Modal body inside of form-->
                        <!--Connects the for and post to the method that is located in code.php(Server fucntions)-->
                        <form action="../../php/mm_Code.php" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <!--Fill in form contents-->
                                    <label>CRN</label>
                                    <input type="varchar(300)" name="crn" class="form-control" placeholder="Enter CRN">
                                </div>
                                <div class="form-group">
                                    <!--Fill in form contents-->
                                    <label> Course ID</label>
                                    <input type="varchar(300)" name="courseid" class="form-control" placeholder="Enter Course ID">
                                </div>
                                <div class="form-group">
                                    <!--Fill in form contents-->
                                    <label> Faculty ID</label>
                                    <input type="varchar(300)" name="facultyid" class="form-control" placeholder="Enter Faculty ID">
                                </div>
                                <div class="form-group">
                                    <label>Time Slot ID</label>
                                    <input type="varchar(300)" name="timeslotid" class="form-control" placeholder="Enter Time Slot ID">
                                </div>
                                <div class="form-group">
                                    <label>Room ID</label>
                                    <input type="varchar(300)" name="roomid" class="form-control" placeholder="Enter Room ID">
                                </div>
                                <div class="form-group">
                                    <label>Semester</label>
                                    <input type="varchar(300)" name="semyear" class="form-control" placeholder="Enter Semester Year">
                                </div>
                            </div>
                            <!--Footer button goes here-->
                            <div class="modal-footer">
                                <button type="submit" name="master_btn" class="btn btn-primary">Save</button>
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
        <h3 align="center">Master Schedule</h3>
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
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT *, day.weekday AS weekday1 FROM course INNER JOIN section ON course.courseid=section.courseid INNER JOIN faculty ON section.facultyid=faculty.facultyid  
                                INNER JOIN user ON faculty.facultyid=user.userid INNER JOIN timeslotperiod ON section.timeslotid=timeslotperiod.timeslotid 
                                INNER JOIN period ON timeslotperiod.periodid=period.periodid INNER JOIN timeslotday ON section.timeslotid = timeslotday.timeslotid 
                                INNER JOIN day ON timeslotday.dayoid=day.dayid INNER JOIN day s ON timeslotday.daytid=s.dayid";
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
        $('#master').DataTable();
    });
</script>