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
            <button type="button" class="btn btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Semester
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Semester Form</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="../../php/code.php" method="POST">

                            <div class="modal-body">
                                <div class="form-group">
                                    <label> Semester</label>
                                    <input type="varchar(300)" name="semname" class="form-control" placeholder="Enter Semester">
                                </div>
                                <div class="form-group">
                                    <label>Year</label>
                                    <input type="date" name="year" class="form-control" placeholder="Enter year">
                                </div>
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input type="date" name="begindate" class="form-control" placeholder="Enter start date">
                                </div>
                                <div class="form-group">
                                    <label>Ending Date</label>
                                    <input type="date" name="enddate" class="form-control" placeholder="Enter end date">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="createsem_btn" class="btn btn-primary">Save</button>
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
    <div class="card-body">

        <?php
        /*
        if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
            echo '<h2> ' . $_SESSION['success'] . '</h2>';
            unset($_SESSION['sucess']);
        }
        */
        ?>
        <div class="table-responsive">
            <table id="semdata" class="table table-bordered">
                <thead>
                    <tr>
                        <td>Year</td>
                        <td>Semester</td>
                        <td>Start of Semester</td>
                        <td>End of Semester</td>
                        <td>Add Class Cut Off</td>
                        <td>Drop Class Cut Off</td>
                        <td>Exam Cut Off</td>
                        <td>Grades Cut Off</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM semesteryear INNER JOIN timewindow ON semesteryear.semyear=timewindow.semyear";
                    $query_run = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_array($query_run)) { ?>
                        <tr>
                            <td> <?php echo $row['year']; ?> </td>
                            <td> <?php echo $row['semname']; ?> </td>
                            <td> <?php echo $row['begindate']; ?> </td>
                            <td> <?php echo $row['enddate']; ?> </td>
                            <td> <?php echo $row['regcuoff']; ?> </td>
                            <td> <?php echo $row['dropcutoff']; ?> </td>
                            <td> <?php echo $row['examcutoff']; ?> </td>
                            <td> <?php echo $row['gradecutoff']; ?> </td>
                            <!--
                            <td>
                                <form action="../../php/editUser.php" method="post">
                                    <input type="hidden" name="userid" value="<?php echo $row['userid']; ?>">
                                    <button type="submit" name="edit_btn" class=" btn btn-warning">Edit
                            </td>
                            </form>
                            <td>
                                <form action="../../php/code.php" method="post">
                                    <input type="hidden" name="deleteid" value="<?php echo $row['userid']; ?>">
                                    <button type="submit" name="delete_btn" class=" btn btn-danger">Delete
                            </td>
                    -->
                            </form>
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