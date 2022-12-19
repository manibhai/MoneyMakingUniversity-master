<?php
session_start();
include "../navigations/config.php";

//CREATE A USER
if (isset($_POST['create_btn'])) {
    $userid = $_POST['userid'];
    $usertype = $_POST['usertype'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipCode = $_POST['zipCode'];

    $query = "INSERT INTO user (userid, usertype, lname, fname, phone, dob, street, city, state, zipCode) 
                VALUES ('$userid', '$usertype', '$lname', '$fname', '$phone', '$dob', '$street', '$city', '$state', '$zipCode')";
    $query1 = "INSERT INTO userlogin(userid, usertype, email, pass) VALUES ('$userid', '$usertype', '$email', '$pass')";
    $query_run = mysqli_query($connection, $query);
    $query_run1 = mysqli_query($connection, $query1);

    if (mysqli_num_rows($userid_query_run) > 0) {
        $_SESSION['status'] = "User ID Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: ../navigations/admin/adminviewUser.php');
        exit(0);
    } else if ($query_run and $query_run1) {
        $_SESSION['success'] = "User Profile has been Created";
        header('Location: ../navigations/admin/adminviewUser.php');
        exit(0);
    } else {
        $_SESSION['status'] = "User Profile was not Created";
        header('Location: ../navigations/admin/adminviewUser.php');
        exit(0);
    }
}

//EDIT A USER
if (isset($_POST['edit_btn'])) {
    $userid = $_POST['userid'];
    $query = "SELECT * FROM user WHERE userid='$userid'";
    $query_run = mysqli_query($connection, $query);
}

if (isset($_POST['update_btn'])) {
    $userid = $_POST['userid'];
    $usertype = $_POST['usertype'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipCode = $_POST['zipcode'];

    $query = "UPDATE user, userlogin SET user.userid='$userid', user.usertype='$usertype', user.lname='$lname', user.fname='$fname', user.phone='$phone', 
                user.dob='$dob', user.street='$street', user.city='$city', 
                user.state='$state', user.zipcode='$zipCode', userlogin.email='$email', userlogin.pass='$pass' WHERE user.userid = userlogin.userid AND userlogin.userid='$userid'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "User has been Updated";
        header('Location: ../navigations/admin/adminviewUser.php');
        exit(0);
    } else {
        $_SESSION['status'] = "User was not Updated";
        header('Location: ../navigations/admin/adminviewUser.php');
        exit(0);
    }
}
//DELETE A USER
if (isset($_POST['delete_btn'])) {
    $userid = $_POST['deleteid'];
    $query = "DELETE FROM user WHERE user.userid='$userid' ";
    $query1 = "DELETE FROM userlogin WHERE userlogin.userid='$userid'";
    $query_run = mysqli_query($connection, $query);
    $query_run1 = mysqli_query($connection, $query1);

    if ($query_run and $query_run1) {
        $_SESSION['success'] = "User has been Deleted";
        header('Location: ../navigations/admin/adminviewUser.php');
        exit(0);
    } else {
        $_SESSION['status'] = "User was not Deleted";
        header('Location: ../navigations/admin/adminviewUser.php');
        exit(0);
    }
}

//EDIT A COURSE
if (isset($_POST['editCourse_btn'])) {
    $courseid = $_POST['courseid'];
    $query = "SELECT * FROM course WHERE courseid='$courseid'";
    $query_run = mysqli_query($connection, $query);
}

if (isset($_POST['updateCourse_btn'])) {
    $courseid = $_POST['courseid'];
    $coursename = $_POST['coursename'];
    $numofcredits = $_POST['numofcredits'];
    $deptid = $_POST['deptid'];
    $coursedesc = $_POST['coursedesc'];

    $query = "UPDATE course SET courseid = '$courseid', coursename = '$coursename', 
                numofcredits = '$numofcredits', deptid = '$deptid', coursedesc = '$coursedesc' 
                WHERE course.courseid ='$courseid'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Course has been Updated";
        header('Location: ../navigations/admin/adminviewCourse.php');
        exit(0);
    } else {
        $_SESSION['status'] = "Course was not Updated";
        header('Location: ../navigations/admin/adminviewCourse.php');
        exit(0);
    }
}

//Create a New Semester
if (isset($_POST['create_sem_btn'])) {
    $semyear = $_POST['semyear'];
    $begindate = $_POST['begindate'];
    $enddate = $_POST['enddate'];
    $semname = $_POST['semname'];
    $year = $_POST['year'];

    $query = "INSERT INTO semesteryear (semyear, begindate, enddate, semname, year)
                VALUES ('$semyear', '$begindate', '$enddate', '$semname', '$year')";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_num_rows($semyear_query_run) > 0) {
        $_SESSION['status'] = "Semester Year Already Exist. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: ../navigations/admin/adminviewTimeWindows.php');
        exit(0);
    }
    if ($query_run) {
        $_SESSION['success'] = "Semester Year has been Created";
        header('Location: ../navigations/admin/adminviewTimeWindows.php');
        exit(0);
    } else {
        $_SESSION['status'] = "Semester Year was not Created";
        header('Location: ../navigations/admin/adminviewTimeWindows.php');
        exit(0);
    }
}

//Create a New Time Window
if (isset($_POST['create_window_btn'])) {
    $timewindowid = $_POST['timewindowid'];
    $semyear = $_POST['semyear'];
    $regcutoff = $_POST['regcutoff'];
    $dropcutoff = $_POST['dropcutoff'];
    $examcutoff = $_POST['examcutoff'];
    $gradecutoff = $_POST['gradecutoff'];

    $query = "INSERT INTO timewindow (timewindowid, semyear, regcutoff, dropcutoff, examcutoff, gradecutoff)
                VALUES ('$timewindowid', '$semyear', '$regcutoff', '$dropcutoff', '$examcutoff', '$gradecutoff')";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_num_rows($timewindowid_query_run) > 0) {
        $_SESSION['status'] = "Time Window Already Exist. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: ../navigations/admin/adminviewTimeWindows.php');
        exit(0);
    }
    if ($query_run) {
        $_SESSION['success'] = "Time Window has been Created";
        header('Location: ../navigations/admin/adminviewTimeWindows.php');
        exit(0);
    } else {
        $_SESSION['status'] = "Time Window was not Created";
        header('Location: ../navigations/admin/adminviewTimeWindows.php');
        exit(0);
    }
}

//EDIT A TIME WINDOW
if (isset($_POST['edit_window'])) {
    $timewindowid = $_POST['timewindowid'];
    $query = "SELECT * FROM timewindow WHERE timewindowid = '$timewindowid'";
    $query_run = mysqli_query($connection, $query);
}

if (isset($_POST['update_window'])) {
    $timewindowid = $_POST['timewindowid'];
    $regcutoff = $_POST['regcutoff'];
    $dropcutoff = $_POST['dropcutoff'];
    $examcutoff = $_POST['examcutoff'];
    $gradecutoff = $_POST['gradecutoff'];

    $query = "UPDATE timewindow SET timewindow.regcutoff='$regcutoff', timewindow.dropcutoff='$dropcutoff',
                timewindow.examcutoff='$examcutoff', timewindow.gradecutoff='$gradecutoff' WHERE timewindow.timewindowid='$timewindowid'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Time Window updated";
        header('Location: ../navigations/admin/adminviewTimeWindows.php');
        exit(0);
    } else {
        $_SESSION['status'] = "Time Window was not updated";
        header('Location: ../navigations/admin/adminviewTimeWindows.php');
        exit(0);
    }
}

//EDIT MASTER SCHEDULER
if (isset($_POST['edit_master'])) {
    $crn = $_POST['crn'];
    $query = "SELECT * FROM section WHERE crn='$crn'";
    $query_run = mysqli_query($connection, $query);
}

if (isset($_POST['update_master'])) {
    $crn = $_POST['crn'];
    $courseid = $_POST['courseid'];
    $sectionnum = $_POST['sectionnum'];
    $facultyid = $_POST['facultyid'];
    $timeslotid = $_POST['timeslotid'];
    $roomid = $_POST['roomid'];
    $numofseats = $_POST['numofseats'];
    $semyear = $_POST['semyear'];

    $query = "UPDATE section SET section.courseid='$courseid', section.sectionnum='$sectionnum', section.facultyid='$facultyid',
                section.timeslotid='$timeslotid', section.roomid='$roomid', section.numofseats='$numofseats', section.semyear='$semyear' WHERE section.crn='$crn'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Master Scheduler updated";
        header('Location: ../navigations/admin/adminviewMaster.php');
        exit(0);
    } else {
        $_SESSION['status'] = "Master Scheduler was not updated";
        header('Location: ../navigations/admin/adminviewMaster.php');
        exit(0);
    }
}


//EDIT A GRADE
if (isset($_POST['edit_grade'])) {
    $studentid = $_POST['studentid'];
    $query = "SELECT * FROM studenthistory WHERE studentid='$studentid'";
    $query_run = mysqli_query($connection, $query);
}

if (isset($_POST['updateGrade_btn'])) {
    $studentid = $_POST['studentid'];
    $crn = $_POST['crn'];
    $grade = $_POST['grade'];

    $query = "UPDATE studenthistory SET studenthistory.grade = '$grade' WHERE studenthistory.studentid = '$studentid' AND studenthistory.crn = '$crn'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $query = "DELETE FROM enrollment WHERE enrollment.studentid = '$studentid' AND enrollment.crn='$crn'";
        $query_run = mysqli_query($connection, $query);
        $_SESSION['success'] = "Grade has been Updated";
        header('Location: ../navigations/admin/adminviewStudentDegreeAudit.php');
        exit(0);
    } else {
        $_SESSION['status'] = "Grade was not Updated";
        header('Location: ../navigations/admin/adminviewStudentDegreeAudit.php');
        exit(0);
    }
}

//EDIT A GRADE FACULTY
if (isset($_POST['btn_students'])) {
    $studentid = $_POST['studentid'];
    $query = "SELECT * FROM studenthistory WHERE studentid='$studentid'";
    $query_run = mysqli_query($connection, $query);
}

if (isset($_POST['updateGrade_faculty'])) {
    $studentid = $_POST['studentid'];
    $crn = $_POST['crn'];
    $semyear = $_POST['semyear'];
    $grade = $_POST['grade'];

    $query = "SELECT * from timewindow WHERE semyear = '$semyear'";
    $query_run = mysqli_query($connection, $query);
    $time = mysqli_fetch_array($query_run);
    if (date("Y-m-d") <= $time['examcutoff'] || date("Y-m-d") > $time['gradecutoff']) {
        $_SESSION['status'] = "Time Window is not active or has expired";
        header('Location: ../navigations/faculty/facultyviewGrades.php');
        exit(0);
    } else {

        $query = "UPDATE studenthistory SET grade = '$grade' WHERE studenthistory.studentid = '$studentid' AND studenthistory.crn = '$crn'";
        $query_run = mysqli_query($connection, $query);

        $query1 = "DELETE FROM enrollment WHERE enrollment.studentid = '$studentid' AND enrollment.crn='$crn'";
        $query_run1 = mysqli_query($connection, $query1);

        if ($query_run) {
            $_SESSION['success'] = "Grade has been Updated";
            header('Location: ../navigations/faculty/facultyviewGrades.php');
            exit(0);
        } else {
            $_SESSION['status'] = "Grade was not Updated";
            header('Location: ../navigations/faculty/facultyviewGrades.php');
            exit(0);
        }
    }
}

if (isset($_POST['updateEvent_btn'])) {
    $date = $_POST['date'];
    $event = $_POST['event'];

    $query = "UPDATE accal SET date = '$date', event = '$event' WHERE date = '$date' AND event = '$event'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Event has been Updated";
        header('Location: ../navigations/admin/adminviewCalendar.php');
        exit(0);
    } else {
        $_SESSION['status'] = "Event was not Updated";
        header('Location: ../navigations/admin/adminviewCalendar.php');
        exit(0);
    }
}
