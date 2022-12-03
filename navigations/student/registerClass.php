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
    $dateenrolled = '2022-12-20';
    $semyear = $_POST['semyear'];
    $grade = 'IP';

    $query = "SELECT * FROM enrollment WHERE enrollment.studentid = $studentid";
    $query_run = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($query_run);
    if ($row['studentid'] == $studentid && $row['courseid'] == $courseid) {
        $_SESSION['status'] = "Cannot Register for a Course that is already registered";
        header('Location: ./registration.php');
        exit(0);
    } else {
        $query = "INSERT INTO enrollment (studentid, crn, courseid, dateenrolled, semyear, grade)
    VALUES ('$studentid', '$crn', '$courseid', '$dateenrolled', '$semyear', '$grade')";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Sucessfully Registered for Class";
            header('Location: ./registration.php');
            exit(0);
        } else {
            $_SESSION['status'] = "Couldn't Register for Class";
            header('Location: ./registration.php');
            exit(0);
        }
    }
}
