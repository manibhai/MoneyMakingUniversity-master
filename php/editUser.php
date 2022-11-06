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
    <title>Edit User</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

    <?php
    if (isset($_POST['edit_btn'])) {
        $userid = $_POST['userid'];

        $query = "SELECT user.userid, user.usertype, user.lname, user.fname, user.phone, user.dob, user.street, 
                    user.city, user.state, user.zipcode, userlogin.email, userlogin.pass FROM user INNER JOIN userlogin ON user.userid=userlogin.userid";
        $query_run = mysqli_query($connection, $query);

        foreach ($query_run as $row) {
    ?>
            <form action="code.php" method="POST">
                <div class="form-group">
                    <label>User ID</label>
                    <input type="hidden" name="userid" value="<?php echo $row['userid'] ?>" class="form-control" placeholder="Enter User's ID">
                </div>
                <div class="form-group">
                    <label>User Type</label>
                    <input type="varchar(300)" name="usertype" value="<?php echo $row['usertype'] ?>" class="form-control" placeholder="Enter User Type">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Enter User's Email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="varchar(300)" name="pass" value="<?php echo $row['pass'] ?>" class="form-control" placeholder="Enter User's Password">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="varchar(300)" name="lname" value="<?php echo $row['lname'] ?>" class="form-control" placeholder="Enter User's Last Name">
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="varchar(300)" name="fname" value="<?php echo $row['fname'] ?>" class="form-control" placeholder="Enter User's First Name">
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="varchar(300)" name="phone" value="<?php echo $row['phone'] ?>" class="form-control" placeholder="Enter User's Phone Number">
                </div>
                <div class="form-group">
                    <label>DOB</label>
                    <input type="varchar(300)" name="dob" value="<?php echo $row['dob'] ?>" class="form-control" placeholder="Enter User's Date of Birth">
                </div>
                <div class="form-group">
                    <label>Street</label>
                    <input type="varchar(300)" name="street" value="<?php echo $row['street'] ?>" class="form-control" placeholder="Enter Street">
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="varchar(300)" name="city" value="<?php echo $row['city'] ?>" class="form-control" placeholder="Enter City">
                </div>
                <div class="form-group">
                    <label>State</label>
                    <input type="varchar(300)" name="state" value="<?php echo $row['state'] ?>" class="form-control" placeholder="Enter State">
                </div>
                <div class="form-group">
                    <label>ZipCode</label>
                    <input type="varchar(300)" name="zipCode" value="<?php echo $row['zipcode'] ?>" class="form-control" placeholder="Enter Zipcode">
                </div>
                <a href="../navigations/admin/adminviewUser.php" class="btn btn-danger"> Cancel </a>
                <button type="submit" name="update_btn" class="btn btn-success"> Update </button>
            </form>
    <?php
        }
    }
    ?>
</head>