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
    <title>View Users</title>
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
                Create a User
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Signup Form</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="../../php/code.php" method="POST">

                            <div class="modal-body">
                                <div class="form-group">
                                    <label> User ID </label>
                                    <input type="int" name="userid" class="form-control" placeholder="Enter User ID">
                                </div>
                                <div class="form-group">
                                    <label>User Type</label>
                                    <input type="varchar(300)" name="usertype" class="form-control" placeholder="Enter User Type (Student, Faculty, Student, Research)">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter User Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="varchar(300)" name="pass" class="form-control" placeholder="Enter User Password">
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="varchar(300)" name="lname" class="form-control" placeholder="Enter User's Last Name">
                                </div>
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="varchar(300)" name="fname" class="form-control" placeholder="Enter User's First Name">
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="varchar(300)" name="phone" class="form-control" placeholder="Enter User's Phone Number">
                                </div>
                                <div class="form-group">
                                    <label>DOB</label>
                                    <input type="varchar(300)" name="dob" class="form-control" placeholder="Enter User's Date of Birth">
                                </div>
                                <div class="form-group">
                                    <label>Street</label>
                                    <input type="varchar(300)" name="street" class="form-control" placeholder="Enter Street">
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="varchar(300)" name="city" class="form-control" placeholder="Enter City">
                                </div>
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="varchar(300)" name="state" class="form-control" placeholder="Enter State">
                                </div>
                                <div class="form-group">
                                    <label>ZipCode</label>
                                    <input type="varchar(300)" name="zipCode" class="form-control" placeholder="Enter ZipCode">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="create_btn" class="btn btn-primary">Save</button>
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
        if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
            echo '<h2> ' . $_SESSION['status'] . '</h2>';
            unset($_SESSION['status']);
        }
        ?>
        <div class="table-responsive">
            <table id="usersdata" class="table table-bordered">
                <thead>
                    <tr>
                        <td>User ID</td>
                        <td>Email</td>
                        <td>Password</td>
                        <td>Last Name</td>
                        <td>First Name</td>
                        <td>Phone Number</td>
                        <td>DOB</td>
                        <td>Street</td>
                        <td>City</td>
                        <td>State</td>
                        <td>ZipCode</td>
                        <td>User Type</td>
                        <td>Edit User</td>
                        <td>Delete User</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT user.userid, user.usertype, user.lname, user.fname, user.phone, user.dob, user.street, 
                    user.city, user.state, user.zipcode, userlogin.email, userlogin.pass FROM user INNER JOIN userlogin ON user.userid=userlogin.userid";
                    $query_run = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_array($query_run)) { ?>
                        <tr>
                            <td> <?php echo $row['userid']; ?> </td>
                            <td> <?php echo $row['email']; ?> </td>
                            <td> <?php echo $row['pass']; ?> </td>
                            <td> <?php echo $row['lname']; ?> </td>
                            <td> <?php echo $row['fname']; ?> </td>
                            <td> <?php echo $row['phone']; ?> </td>
                            <td> <?php echo $row['dob']; ?> </td>
                            <td> <?php echo $row['street']; ?> </td>
                            <td> <?php echo $row['city']; ?> </td>
                            <td> <?php echo $row['state']; ?> </td>
                            <td> <?php echo $row['zipcode']; ?> </td>
                            <td> <?php echo $row['usertype']; ?> </td>
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