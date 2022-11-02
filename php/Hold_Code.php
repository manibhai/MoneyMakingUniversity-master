<?php
session_start();
include "../navigations/config.php";

//CREATE HOLD 

if(isset($_POST['create_hold_btn'])){
    $holdname = $_POST['holdname'];
    $holdtype = $_POST['holdtype'];
    $holddesc = $_POST['holddesc'];

    $query= "INSERT INTO department (holdname, holdtype, holddesc)
    VALUES ('$holdname', '$holdtype', '$holddesc')";
    $query_run = mysqli_query($connection, $query);

    if(mysqli_num_rows($deptid_query_run) > 0){
        $_SESSION['status'] = "Hold Name Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: ..//navigations/admin/index.php');
        exit(0);
    }
    else if($query_run) {
        $_SESSION['success'] = "Hold has been Created";
        header('Location: ../navigations/admin/adminviewHolds.php');
        exit(0);
    }
    else {
        $_SESSION['status'] = "Hold could not be created";
        header('Location: ../index.php');
        exit(0);
    }
}

//EDIT A USER

if(isset($_POST['edit_hold_btn'])) {
    $holdname = $_POST['holdname'];
    $query = "SELECT * FROM hold WHERE holdname='$holdname'";
    $query_run = mysqli_query($connection, $query);
}

if(isset($_POST['update_hold_btn'])) {
    $holdname = $_POST['holdname'];
    $holdtype = $_POST['holdtype'];
    $holddesc = $_POST['holddesc'];
    
    $query = "SELECT hold.holdname, hold.holdtype, hold.holddesc FROM hold";
    $query_run = mysqli_query($connection, $query);

    if($query_run) {
        $_SESSION['success'] = "Hold has been Updated";
        header('Location: ../navigations/admin/adminviewHolds.php');
        exit(0);
    }
    else {
        $_SESSION['status'] = "Hold was not Updated";
        header('Location: ../navigations/admin/adminviewHolds.php');
        exit(0);
    }
}