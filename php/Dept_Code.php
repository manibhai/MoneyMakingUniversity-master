<?php
session_start();
include "../navigations/config.php";

//CREATE DEPTARMENT 

if (isset($_POST['create_dept'])) {
    $deptid = $_POST['deptid'];
    $deptname = $_POST['deptname'];
    $deptemail = $_POST['deptemail'];
    $buildingid = $_POST['buildingid'];
    $roomid = $_POST['roomid'];
    $deptphone = $_POST['deptphone'];
    $deptchair = $_POST['deptchair'];
    $deptmg = $_POST['deptmg'];

    $query = "INSERT INTO department (deptid, deptname, deptemail, buildingid, roomid, deptphone, deptchair, deptmg)
    VALUES ('$deptid', '$deptname', '$deptemail', '$buildingid', '$roomid', '$deptphone', '$deptchair', '$deptmg')";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_num_rows($deptid_query_run) > 0) {
        $_SESSION['status'] = "Department ID Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: ../navigations/admin/adminviewDepts.php');
        exit(0);
    } else if ($query_run) {
        $_SESSION['success'] = "Department has been Created";
        header('Location: ../navigations/admin/adminviewDepts.php');
        exit(0);
    } else {
        $_SESSION['status'] = "Department was not Created";
        header('Location: ../navigations/admin/adminviewDepts.php');
        exit(0);
    }
}

//Edit Deptartment
if (isset($_POST['edit_btn'])) {
    $deptid = $_POST['deptid'];
    $query = "SELECT * FROM department WHERE deptid = '$deptid'";
    $query_run = mysqli_query($connection, $query);
}

if (isset($_POST['update_dept'])) {
    $deptid = $_POST['deptid'];
    $deptname = $_POST['deptname'];
    $deptemail = $_POST['deptemail'];
    $buildingid = $_POST['buildingid'];
    $roomid = $_POST['roomid'];
    $deptphone = $_POST['deptphone'];
    $deptchair = $_POST['deptchair'];
    $deptmg = $_POST['deptmg'];

    $query = "UPDATE department SET deptid='$deptid', deptname='$deptname', deptemail='$deptemail', 
                deptphone='$deptphone', buildingid = '$buildingid', roomid = '$roomid', deptchair = '$deptchair',
                deptmg = '$deptchair' WHERE deptid='$deptid'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Department has been Updated";
        header('Location: ../navigations/admin/adminviewDepts.php');
        exit(0);
    } else {
        $_SESSION['status'] = "Department was not Updated";
        header('Location: ../navigations/admin/adminviewDepts.php');
        exit(0);
    }
}
