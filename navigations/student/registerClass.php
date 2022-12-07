<?php
session_start();
include "../navigations/config.php";
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
}


if (isset($_POST['register_btn'])) {
    $studentid = $_POST['studentid'];
    $crn = $_POST['crn'];
    $courseid = $_POST['courseid'];
    $timeslotid = $_POST['timeslotid'];
    $roomid = $_POST['roomid'];
    $dateenrolled = date("Y-m-d");
    $grade = 'IP';
    $numofseats = $_POST['numofseats'];

?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <h3 align="center">Student History</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Student ID</td>
                    <td>CRN</td>
                    <td>Course ID</td>
                    <td>Semester</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM studenthistory INNER JOIN user ON studenthistory.studentid = user.userid WHERE user.userid = '$studentid'";
                $query_run = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_array($query_run)) { ?>
                    <tr>
                        <td> <?php echo $row['studentid']; ?> </td>
                        <td> <?php echo $row['fname'];
                                echo " ";
                                echo $row['lname']; ?> </td>
                        <td> <?php echo $row['crn']; ?> </td>
                        <td> <?php echo $row['courseid']; ?> </td>
                        <td> <?php echo $row['semyear']; ?> </td>
                    </tr> <?php
                        }

                            ?>
            </tbody>
        </table>
    </div>
    </div>
    </body>

    </html><?php
        }
            ?>