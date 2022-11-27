<?php
session_start();
include "../navigations/config.php";

//CREATE A Major
if (isset($_POST['major_btn'])) {
    $majorid = $_POST['majorid'];
    $majorname = $_POST['majorname'];
    $deptid = $_POST['deptid'];

    $query = "INSERT INTO major (majorid, majorname, deptid)
    VALUES ('$majorid', '$majorname', '$deptid')";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_num_rows($majorid_query_run) > 0) {
        $_SESSION['status'] = "Major ID Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: ../navigations/admin/adminviewMajors.php');
        exit(0);
    } else if ($query_run) {
        $_SESSION['success'] = "Major has been Created";
        header('Location: ../navigations/admin/adminviewMajors.php');
        exit(0);
    } else {
        $_SESSION['status'] = "Major was not Created";
        header('Location: ../navigations/admin/adminviewMajors.php');
        exit(0);
    }
}

//CREATE A Minor
if (isset($_POST['minor_btn'])) {
    $minorid = $_POST['minorid'];
    $minorname = $_POST['minorname'];
    $deptid = $_POST['deptid'];

    $query = "INSERT INTO minor (minorid, minorname, deptid)
    VALUES ('$minorid', '$minorname', '$deptid')";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_num_rows($minorid_query_run) > 0) {
        $_SESSION['status'] = "Minor ID Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: ../navigations/admin/adminviewMinors.php');
        exit(0);
    } else if ($query_run) {
        $_SESSION['success'] = "Minor has been Created";
        header('Location: ../navigations/admin/adminviewMinors.php');
        exit(0);
    } else {
        $_SESSION['status'] = "Minor was not Created";
        header('Location: ../navigations/admin/adminviewMinors.php');
        exit(0);
    }
}

//CREATE A Major Requirement
if (isset($_POST['majorreq_btn'])) {
    $courseid = $_POST['courseid'];
    $majorid = $_POST['majorid'];

    $query = "INSERT INTO majorcourse (courseid, majorid)
    VALUES ('$courseid', '$majorid')";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_num_rows($minorid_query_run) > 0) {
        $_SESSION['status'] = "Course ID Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: ../navigations/admin/adminviewMajorCourse.php');
        exit(0);
    } else if ($query_run) {
        $_SESSION['success'] = "Major Requirement has been Created";
        header('Location: ../navigations/admin/adminviewMajorCourse.php');
        exit(0);
    } else {
        $_SESSION['status'] = "Major Requirement was not Created";
        header('Location: ../navigations/admin/adminviewMajorCourse.php');
        exit(0);
    }
}

//CREATE A Minor Requirement
if (isset($_POST['minorreq_btn'])) {
    $courseid = $_POST['courseid'];
    $majorid = $_POST['minorid'];

    $query = "INSERT INTO minorcourse (courseid, minorid)
    VALUES ('$courseid', '$minorid')";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_num_rows($minorid_query_run) > 0) {
        $_SESSION['status'] = "Course ID Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: ../navigations/admin/adminviewMinorCourse.php');
        exit(0);
    } else if ($query_run) {
        $_SESSION['success'] = "Minor Requirement has been Created";
        header('Location: ../navigations/admin/adminviewMinorCourse.php');
        exit(0);
    } else {
        $_SESSION['status'] = "Minor Requirement was not Created";
        header('Location: ../navigations/admin/adminviewMinorCourse.php');
        exit(0);
    }
}
