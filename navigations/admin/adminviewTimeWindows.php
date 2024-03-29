<?php
session_start();
include "../config.php";

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Semesters</title>
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
            <button type="button" class="btn btn btn-primary" data-bs-toggle="modal" data-bs-target="#sem">
                Semester
            </button>
            <div class="modal fade" id="sem" tabindex="-1" aria-labelledby="example1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="example1">Semester Form</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="../../php/code.php" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Semester Year</label>
                                    <input type="varchar(300)" name="semyear" class="form-control" placeholder="(S2020, F2020, etc)">
                                </div>
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input type="date" name="begindate" class="form-control" placeholder="Enter Semester Start date">
                                </div>
                                <div class="form-group">
                                    <label>Ending Date</label>
                                    <input type="date" name="enddate" class="form-control" placeholder="Enter Semester End date">
                                </div>
                                <div class="form-group">
                                    <label>Semester</label>
                                    <input type="varchar(300)" name="semname" class="form-control" placeholder="Fall , Spring">
                                </div>
                                <div class="form-group">
                                    <label>Year</label>
                                    <input type="varchar(300)" name="year" class="form-control" placeholder="Enter Year">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="create_sem_btn" class="btn btn-primary">Create</button>
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <button type="button" class="btn btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Time Window
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Time Window Form</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="../../php/code.php" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Time Window ID</label>
                                    <input type="varchar(300)" name="timewindowid" class="form-control" placeholder="(TW14-..))">
                                </div>
                                <div class="form-group">
                                    <label>Semester Year</label>
                                    <input type="varchar(300)" name="semyear" class="form-control" placeholder="(F2023-..)">
                                </div>
                                <div class="form-group">
                                    <label>Registration Cut Off</label>
                                    <input type="date" name="regcutoff" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Drop Cut Off</label>
                                    <input type="date" name="dropcutoff" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Exam Cut Off</label>
                                    <input type="date" name="examcutoff" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Grades Cut Off</label>
                                    <input type="date" name="gradecutoff" class="form-control" placeholder="">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="create_window_btn" class="btn btn-primary">Create</button>
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>


        <a class="btn btn-lg btn-danger" href="../logout.php" role="button">Logout</a>

    </nav>
</head>

<body>
    <br /><br />
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
        <div class="table-responsive">
            <table id="semdata" class="table table-bordered">
                <thead>
                    <tr>
                        <td>Semester</td>
                        <td>Year</td>
                        <td>Start of Semester</td>
                        <td>End of Semester</td>
                        <td>Time Window ID</td>
                        <td>Add Class Cut Off</td>
                        <td>Drop Class Cut Off</td>
                        <td>Exam Cut Off</td>
                        <td>Grades Cut Off</td>
                        <td>Edit</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM semesteryear INNER JOIN timewindow ON semesteryear.semyear=timewindow.semyear ORDER BY timewindow.timewindowid ASC";
                    $query_run = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_array($query_run)) { ?>
                        <tr>
                            <td> <?php echo $row['year']; ?> </td>
                            <td> <?php echo $row['semname']; ?> </td>
                            <td> <?php echo $row['begindate']; ?> </td>
                            <td> <?php echo $row['enddate']; ?> </td>
                            <td> <?php echo $row['timewindowid']; ?> </td>
                            <td> <?php echo $row['regcutoff']; ?> </td>
                            <td> <?php echo $row['dropcutoff']; ?> </td>
                            <td> <?php echo $row['examcutoff']; ?> </td>
                            <td> <?php echo $row['gradecutoff']; ?> </td>
                            <td>
                                <form action="../../php/editTW.php" method="post">
                                    <input type="hidden" name="timewindowid" value="<?php echo $row['timewindowid']; ?>">
                                    <button type="submit" name="edit_window" class=" btn btn-warning">Edit</button>
                                </form>
                            </td>
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
        $('#semdata').DataTable();
    });
</script>