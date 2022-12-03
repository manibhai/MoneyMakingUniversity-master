<?php
session_start();
include "../navigations/config.php";
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
}


if (isset($_POST['register_btn'])) {
    $studentid = $_SESSION['id'];
    $crn = $_POST['crn'];
    $courseid = $_POST['courseid'];
    $dateenrolled = date('y-m-d');
    $semyear = $_POST['semyear'];
    $grade = 'IP';

    $query = "INSERT INTO enrollment (studentid, crn, courseid, dateenrolled, semyear, grade)
    VALUES ('$studentid', '$crn', '$courseid', '$dateenrolled', '$semyear', '$grade')";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_num_rows($semyear_query_run) != 'S2023') {
        $_SESSION['status'] = "Cannot Register for this Semester Year";
        $_SESSION['status_code'] = "error";
        header('Location: ./registration.php');
        exit(0);
    } else if ($query_run) {
        $_SESSION['success'] = "Sucessfully Registered for Class";
        header('Location: ./registration.php');
        exit(0);
    } else {
        $_SESSION['status'] = "Couldn't Register for Class";
        header('Location: ./registration.php');
        exit(0);
    }
}
