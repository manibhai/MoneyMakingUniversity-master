<?php
session_start();
include "../navigations/config.php";
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
}


if (isset($_POST['register_btn'])) {
    $studentid = $_POST['studentid'];
    $crn = $_POST['crn'];
    $courseid = $_POST['courseid'];
    $timeslotid = $_POST['timeslotid'];
    $roomid = $_POST['roomid'];
    $dateenrolled = date("Y-m-d");
    $grade = 'IP';
    $numofseats = $_POST['numofseats'];

    $query = "SELECT * FROM studenthistory WHERE studentid='$studentid' AND crn='$crn'";
    $query_run = mysqli_query($connection, $query);
    if (($query_run) > 0) {
        $_SESSION['status'] = "Course has been taken in the Past";
        header('Location: ./registration.php');
        exit(0);
    } else {
        $_SESSION['success'] = "Registered Successfully";
        header('Location: ./registration.php');
        exit(0);
    }
}
