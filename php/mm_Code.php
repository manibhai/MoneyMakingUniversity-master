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
    $gradereq = $_POST['gradereq'];

    $query = "INSERT INTO majorcourse (courseid, majorid, gradereq)
    VALUES ('$courseid', '$majorid', '$gradereq')";
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
    $gradereq = $_POST['gradereq'];

    $query = "INSERT INTO minorcourse (courseid, minorid, gradereq)
    VALUES ('$courseid', '$minorid', '$gradereq')";
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

//Add to Master
if (isset($_POST['master_btn'])) {
    $crn = $_POST['crn'];
    $courseid = $_POST['courseid'];
    $sectionnum = $_POST['sectionnum'];
    $facultyid = $_POST['facultyid'];
    $timeslotid = $_POST['timeslotid'];
    $roomid = $_POST['roomid'];
    $numofseats = $_POST['numofseats'];
    $semyear = $_POST['semyear'];

    $query = "INSERT INTO section (crn, courseid, sectionnum, facultyid, timeslotid, roomid, numofseats, semyear)
    VALUES ('$crn', '$courseid', '$sectionnum', '$facultyid', '$timeslotid', '$roomid', '$numofseats', '$semyear')";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_num_rows($crn_query_run) > 0) {
        $_SESSION['status'] = "CRN Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: ../navigations/admin/adminviewMaster.php');
        exit(0);
    } else if ($query_run) {
        $_SESSION['success'] = "Added to Master Schedule";
        header('Location: ../navigations/admin/adminviewMaster.php');
        exit(0);
    } else {
        $_SESSION['status'] = " NOT Added to Master Schedule";
        header('Location: ../navigations/admin/adminviewMaster.php');
        exit(0);
    }
}

//Create a Course
if (isset($_POST['course_btn'])) {
    $courseid = $_POST['courseid'];
    $coursename = $_POST['coursename'];
    $numofcredits = $_POST['numofcredits'];
    $deptid = $_POST['deptid'];
    $coursedesc = $_POST['coursedesc'];

    $query = "INSERT INTO course (courseid, coursename, numofcredits, deptid, coursedesc)
    VALUES ('$courseid', '$coursename', '$numofcredits', '$deptid', '$coursedesc')";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_num_rows($courseid_query_run) > 0) {
        $_SESSION['status'] = "Course ID Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: ../navigations/admin/adminviewCourse.php');
        exit(0);
    } else if ($query_run) {
        $_SESSION['success'] = "Course has been Created";
        header('Location: ../navigations/admin/adminviewCourse.php');
        exit(0);
    } else {
        $_SESSION['status'] = "Course was not Created";
        header('Location: ../navigations/admin/adminviewCourse.php');
        exit(0);
    }
}

//Add
if (isset($_POST['enroll_btn'])) {
    $studentid = $_POST['studentid'];
    $crn = $_POST['crn'];

    $query = "INSERT INTO enrollment (studentid, crn)
    VALUES ('$studentid', '$crn')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Course was Added successfully";
        header('Location: ../navigations/admin/adminviewEnrollment.php');
        exit(0);
    } else {
        $_SESSION['status'] = "Course was not Added";
        header('Location: ../navigations/admin/adminviewEnrollment.php');
        exit(0);
    }
}

//Drop
if (isset($_POST['drop_btn'])) {
    $studentid = $_POST['studentid'];
    $crn = $_POST['crn'];

    $query = "DELETE FROM enrollment WHERE studentid = '$studentid' AND crn = '$crn";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Course was Dropped successfully";
        header('Location: ../navigations/admin/adminviewEnrollment.php');
        exit(0);
    } else {
        $_SESSION['status'] = "Course was not Dropped";
        header('Location: ../navigations/admin/adminviewEnrollment.php');
        exit(0);
    }
}

//Attendance
if (isset($_POST['attendance_btn'])) {
    $studentid = $_POST['studentid'];
    $crn = $_POST['crn'];
    $ispresent = $_POST['ispresent'];
    $date = $_POST['date'];

    $query = "INSERT INTO attendance (studentid, crn, ispresent, date)
    VALUES ('$studentid', '$crn', '$ispresent', '$date')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Attendance Taken successfully";
        header('Location: ../navigations/admin/adminviewAttendance.php');
        exit(0);
    } else {
        $_SESSION['status'] = "Attendance was not Taken";
        header('Location: ../navigations/admin/adminviewAttendance.php');
        exit(0);
    }
}

//Advisor
if (isset($_POST['advisor_btn'])) {
    $studentid = $_POST['studentid'];
    $facultyid = $_POST['facultyid'];
    $dateassigned = $_POST['dateassigned'];

    $query = "INSERT INTO advisor (studentid, facultyid, dateassigned)
    VALUES ('$studentid', '$facultyid', '$dateassigned')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Advisor Assigned successfully";
        header('Location: ../navigations/admin/adminviewAdvisor.php');
        exit(0);
    } else {
        $_SESSION['status'] = "Advisor was not Assigned";
        header('Location: ../navigations/admin/adminviewAdvisor.php');
        exit(0);
    }
}

if (isset($_POST['btn_event'])) {
    $date = $_POST['date'];
    $event = $_POST['event'];

    $query = "INSERT INTO accal (date, event)
    VALUES ('$date', '$event')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Event Created successfully";
        header('Location: ../navigations/admin/adminviewCalendar.php');
        exit(0);
    } else {
        $_SESSION['status'] = "Event was not Created";
        header('Location: ../navigations/admin/adminviewCalendar.php');
        exit(0);
    }
}

if (isset($_POST['btn_delete_event'])) {
    $date = $_POST['deleteid'];
    $query = "DELETE FROM accal WHERE accal.date='$date'";
    $query_run = mysqli_query($connection, $query);


    if ($query_run) {
        $_SESSION['success'] = "Event has been Deleted";
        header('Location: ../navigations/admin/adminviewCalendar.php');
        exit(0);
    } else {
        $_SESSION['status'] = "Event was not Deleted";
        header('Location: ../navigations/admin/adminviewCalendar.php');
        exit(0);
    }
}
