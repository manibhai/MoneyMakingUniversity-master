<?php
include '../config.php';
session_start();
$currUser = $_SESSION['id'];
$sql = "SELECT * FROM user WHERE userid = '$currUser'";
$result = mysqli_query($connection,$sql);
$row = mysqli_fetch_array($result);
if(!isset($_SESSION['id'])){
  header("Location: ../login.php");
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Academic Calendar</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3">
    <div class="container">
      <a href="../index.php" class="navbar-brand">Money Making University</a>
    </div>
  </nav>
</head>
<body>
<section class="bg-dark text-light p-5 text-center text-sm-start">
    <div class="container">
      <div class="d-sm-flex align-items-center justify-content-between">
        <div>
        <h2><?php echo $row['fname'] ?> <?php echo $row['lname'] ?>'s Degree Audit</h2>
        </div>
  </section>

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