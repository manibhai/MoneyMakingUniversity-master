<?php
session_start();
include "../navigations/config.php";

//CREATE A USER
if(isset($_POST['create_btn'])) {
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
    $query_run = mysqli_query($connection, $query1);

    if(mysqli_num_rows($userid_query_run) > 0)
    {
        $_SESSION['status'] = "User ID Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: ..//navigations/admin/index.php');
        exit(0);
    }
    else if($query_run) {
        $_SESSION['success'] = "User Profile has been Created";
        header('Location: ../navigations/admin/adminviewUser.php');
        exit(0);
    }
    else {
        $_SESSION['status'] = "User Profile was not Created";
        header('Location: ../index.php');
        exit(0);
    }
}

//EDIT A USER
if(isset($_POST['edit_btn'])) {
    $userid = $_POST['userid'];
    $query = "SELECT * FROM user WHERE userid='$userid'";
    $query_run = mysqli_query($connection, $query);
    $query1 = "SELECT * FROM userlogin WHERE userid='$userid'";
    $query_run = mysqli_query($connection, $query1);
}

if(isset($_POST['update_btn'])) {
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
    
    $query = "SELECT user.userid, user.usertype, user.lname, user.fname, user.phone, user.dob, user.street, 
                    user.city, user.state, user.zipcode, userlogin.email, userlogin.pass FROM user INNER JOIN userlogin ON user.userid=userlogin.userid";
    $query_run = mysqli_query($connection, $query);

    if($query_run) {
        $_SESSION['success'] = "User has been Updated";
        header('Location: ../navigations/admin/adminviewUser.php');
        exit(0);
    }
    else {
        $_SESSION['status'] = "User was not Updated";
        header('Location: ../navigations/admin/adminviewUser.php');
        exit(0);
    }
}
//DELETE A USER
if(isset($_POST['delete_btn'])) {
    $userid = $_POST['deleteid'];
    $query = "DELETE FROM user WHERE userid='$userid' ";
    $query1 = "DELETE FROM userlogin WHERE userid='$userid' ";
    $query_run = mysqli_query($connection, $query);
    $query_run = mysqli_query($connection, $query1);

    if($query_run) {
        $_SESSION['success'] = "User has been Deleted";
        header('Location: ../navigations/admin/adminviewUser.php');
        exit(0);
    }
    else {
        $_SESSION['status'] = "User was not Deleted";
        header('Location: ../navigations/admin/adminviewUser.php');
        exit(0);
    }
}