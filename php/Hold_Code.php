<?php
session_start();
include "../navigations/config.php";

//ASSIGN STUDENT HOLD 

if (isset($_POST['create_hold_btn'])) {
    $studentid = $_POST['studentid'];
    $holdid = $_POST['holdid'];
    $dategiven = $_POST['dategiven'];

    $query = "INSERT INTO studenthold (studentid, holdid, dategiven)
    VALUES ('$studentid', '$holdid', '$dategiven')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Hold was Assigned to the Student";
        header('Location: ../navigations/admin/adminviewHolds.php');
        exit(0);
    } else {
        $_SESSION['status'] = "Hold was Not Assigned to the Student";
        header('Location: ../navigations/admin/adminviewHolds.php');
        exit(0);
    }
}

//DROP A STUDENT HOLD
if (isset($_POST['delete_hold_btn'])) {
    $studentid = $_POST['studentid'];
    $query = "DELETE FROM studenthold WHERE studentid='$studentid' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Student Hold has been Removed";
        header('Location: ../navigations/admin/adminviewHolds.php');
        exit(0);
    } else {
        $_SESSION['status'] = "Unable to Remove Student Hold";
        header('Location: ../navigations/admin/adminviewHolds.php');
        exit(0);
    }
}
