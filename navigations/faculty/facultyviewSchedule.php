<?php
session_start();
include "../config.php";
$currUser = $_SESSION['id'];
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Schedule</title>
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
        ?>
        <h3 align="center">Schedule For Fall 2016</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
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
                                INNER JOIN day ON timeslotday.dayoid=day.dayid INNER JOIN day s ON timeslotday.daytid=s.dayid WHERE section.facultyid=$currUser AND semyear='F2016'";
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

        <h3 align="center">Schedule For Spring 2017</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
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
                                INNER JOIN day ON timeslotday.dayoid=day.dayid INNER JOIN day s ON timeslotday.daytid=s.dayid WHERE section.facultyid=$currUser AND semyear='S2017'";
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

        <h3 align="center">Schedule For Fall 2017</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
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
                                INNER JOIN day ON timeslotday.dayoid=day.dayid INNER JOIN day s ON timeslotday.daytid=s.dayid WHERE section.facultyid=$currUser AND semyear='F2017'";
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

        <h3 align="center">Schedule For Spring 2018</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
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
                                INNER JOIN day ON timeslotday.dayoid=day.dayid INNER JOIN day s ON timeslotday.daytid=s.dayid WHERE section.facultyid=$currUser AND semyear='S2018'";
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

        <h3 align="center">Schedule For Fall 2018</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
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
                                INNER JOIN day ON timeslotday.dayoid=day.dayid INNER JOIN day s ON timeslotday.daytid=s.dayid WHERE section.facultyid=$currUser AND semyear='F2018'";
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

        <h3 align="center">Schedule For Spring 2019</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
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
                                INNER JOIN day ON timeslotday.dayoid=day.dayid INNER JOIN day s ON timeslotday.daytid=s.dayid WHERE section.facultyid=$currUser AND semyear='S2019'";
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

        <h3 align="center">Schedule For Fall 2019</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
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
                                INNER JOIN day ON timeslotday.dayoid=day.dayid INNER JOIN day s ON timeslotday.daytid=s.dayid WHERE section.facultyid=$currUser AND semyear='F2019'";
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

        <h3 align="center">Schedule For Spring 2020</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
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
                                INNER JOIN day ON timeslotday.dayoid=day.dayid INNER JOIN day s ON timeslotday.daytid=s.dayid WHERE section.facultyid=$currUser AND semyear='S2020'";
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

        <h3 align="center">Schedule For Fall 2020</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
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
                                INNER JOIN day ON timeslotday.dayoid=day.dayid INNER JOIN day s ON timeslotday.daytid=s.dayid WHERE section.facultyid=$currUser AND semyear='F2020'";
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

        <h3 align="center">Schedule For Spring 2021</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
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
                                INNER JOIN day ON timeslotday.dayoid=day.dayid INNER JOIN day s ON timeslotday.daytid=s.dayid WHERE section.facultyid=$currUser AND semyear='S2021'";
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

        <h3 align="center">Schedule For Fall 2021</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
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
                                INNER JOIN day ON timeslotday.dayoid=day.dayid INNER JOIN day s ON timeslotday.daytid=s.dayid WHERE section.facultyid=$currUser AND semyear='F2021'";
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

        <h3 align="center">Schedule For Spring 2022</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
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
                                INNER JOIN day ON timeslotday.dayoid=day.dayid INNER JOIN day s ON timeslotday.daytid=s.dayid WHERE section.facultyid=$currUser AND semyear='S2022'";
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

        <h3 align="center">Schedule For Fall 2022</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
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
                                INNER JOIN day ON timeslotday.dayoid=day.dayid INNER JOIN day s ON timeslotday.daytid=s.dayid WHERE section.facultyid=$currUser AND semyear='F2022'";
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

        <h3 align="center">Schedule For Spring 2023</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
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
                                INNER JOIN day ON timeslotday.dayoid=day.dayid INNER JOIN day s ON timeslotday.daytid=s.dayid WHERE section.facultyid=$currUser AND semyear='S2023'";
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