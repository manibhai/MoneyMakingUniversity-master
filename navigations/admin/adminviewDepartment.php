<?php
session_start();
include "../config.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Departments</title>
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
                Create a Department
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Create a Department Form</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="../../php/Dept_Code.php" method="POST">

                            <div class="modal-body">
                                <div class="form-group">
                                    <label> Department ID </label>
                                    <input type="varchar(300)" name="deptid" class="form-control" placeholder="Enter ID">
                                </div>
                                <div class="form-group">
                                    <label>Department Name</label>
                                    <input type="varchar(300)" name="deptname" class="form-control" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label>Department Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email">
                                </div>
                                <div class="form-group">
                                    <label>Building</label>
                                    <input type="varchar(300)" name="buildingid" class="form-control" placeholder="Enter Building">
                                </div>
                                <div class="form-group">
                                    <label>Room Number</label>
                                    <input type="varchar(300)" name="roomid" class="form-control" placeholder="Enter Room Number">
                                </div>
                                <div class="form-group">
                                    <label>Department Phone Number</label>
                                    <input type="varchar(300)" name="deptphone" class="form-control" placeholder="Enter Phone Number">
                                </div>
                                <div class="form-group">
                                    <label>Department Chair ID</label>
                                    <input type="varchar(300)" name="deptchair" class="form-control" placeholder="Enter Department Chair's ID">
                                </div>
                                <div class="form-group">
                                    <label>Department Manager ID</label>
                                    <input type="varchar(300)" name="deptmg" class="form-control" placeholder="Enter Department Manager's ID">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="create_dept_btn" class="btn btn-primary">Save</button>
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
        if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
            echo '<h2> ' . $_SESSION['success'] . '</h2>';
            unset($_SESSION['sucess']);
        }
        ?>
        <div class="table-responsive">
            <table id="usersdata" class="table table-bordered">
                <thead>
                    <tr>
                        <td>Department ID</td>
                        <td>Department Name</td>
                        <td>Department Email</td>
                        <td>Building</td>
                        <td>Room Number</td>
                        <td>Department Phone Number</td>
                        <td>Department Chair</td>
                        <td>Department Manager</td>
                        <td>Edit Department</td>
                        <td>Delete Department</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM department";
                    $query_run = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_array($query_run)) { ?>
                        <tr>
                            <td> <?php echo $row['deptid']; ?> </td>
                            <td> <?php echo $row['deptname']; ?> </td>
                            <td> <?php echo $row['deptemail']; ?> </td>
                            <td> <?php echo $row['buildingid']; ?> </td>
                            <td> <?php echo $row['roomid']; ?> </td>
                            <td> <?php echo $row['deptphone']; ?> </td>
                            <td> <?php echo $row['deptchair']; ?> </td>
                            <td> <?php echo $row['deptmg']; ?> </td>
                            <td>
                                <form action="../../php/editDepartment.php" method="post">
                                    <input type="hidden" name="deptid" value="<?php echo $row['deptid']; ?>">
                                    <button type="submit" name="edit_dept_btn" class=" btn btn-warning">Edit
                            </td>
                            </form>
                            <td>
                                <form action="../../php/Dept_code.php" method="post">
                                    <input type="hidden" name="deleteid" value="<?php echo $row['deptid']; ?>">
                                    <button type="submit" name="delete_btn" class=" btn btn-danger">Delete
                            </td>
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
        $('#usersdata').DataTable();
    });
</script>