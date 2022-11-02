<?php
session_start();
include "../config.php";
if(!isset($_SESSION['userid'])){
    header("Location: ../login.php");
  }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Student Homepage</a>
        </div>
    </nav>
</head>

<body>
    <?php
    $currUser = $_SESSION['id'];
    $query = "SELECT * FROM user WHERE userid = '$currUser'";
    $query_run = mysqli_query($connection, $query);

    foreach ($query_run as $row) {
    ?>
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control" placeholder="first name" value="<?php echo $row['fname']; ?>"></div>
                            <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" value="<?php echo $row['lname']; ?>" placeholder="last name"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Phone Number</label><input type="text" class="form-control" placeholder="enter phone number" value="<?php echo $row['phone']; ?>"></div>
                            <div class="col-md-12"><label class="labels">Street</label><input type="text" class="form-control" placeholder="enter street address" value="<?php echo $row['street']; ?>"></div>
                            <div class="col-md-12"><label class="labels">City</label><input type="text" class="form-control" placeholder="enter city" value="<?php echo $row['city']; ?>"></div>
                            <div class="col-md-12"><label class="labels">State</label><input type="text" class="form-control" placeholder="enter state" value="<?php echo $row['state']; ?>"></div>
                            <div class="col-md-12"><label class="labels">ZipCode</label><input type="text" class="form-control" placeholder="enter zipcode" value="<?php echo $row['zipcode']; ?>"></div>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>

                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    </div>
</body>