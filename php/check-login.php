<?php
session_start();
include "../navigations/config.php";

if (isset($_POST['email']) && isset($_POST['pass'])) {

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = test_input($_POST['email']);
    $password = test_input($_POST['pass']);

    $sql = "SELECT * FROM userlogin WHERE email='" . $email . "'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row['pass'] != $password) {
        $attempt = "UPDATE userlogin SET attempts = attempts + 1 WHERE email='" . $email . "'";
        $update_attempts = mysqli_query($connection, $attempt);
        header("Location: ../navigations/login.php?error=Password is Incorrect");
        exit(0);
    } else if ($row['pass'] == $password) {
        if ($row['attempts'] > 2) {
            header("Location: ../navigations/login.php?error=Account Locked, Please Reset Password");
            exit(0);
        } else if ($row["usertype"] == "Admin") {
            $attempt = "UPDATE userlogin SET attempts = 0 WHERE email='" . $email . "'";
            $update_attempts = mysqli_query($connection, $attempt);
            $_SESSION['id'] = $row['userid'];
            header("Location: ../navigations/admin/index.php");
            exit(0);
        } else if ($row["usertype"] == "Faculty") {
            $attempt = "UPDATE userlogin SET attempts = 0 WHERE email='" . $email . "'";
            $update_attempts = mysqli_query($connection, $attempt);
            $_SESSION['id'] = $row['userid'];
            header("Location: ../navigations/faculty/index.php");
            exit(0);
        } else if ($row["usertype"] == "Research") {
            $attempt = "UPDATE userlogin SET attempts = 0 WHERE email='" . $email . "'";
            $update_attempts = mysqli_query($connection, $attempt);
            $_SESSION['id'] = $row['userid'];
            header("Location: ../navigations/research/index.php");
            exit(0);
        } else if ($row["usertype"] == "Student") {
            $attempt = "UPDATE userlogin SET attempts = 0 WHERE email='" . $email . "'";
            $update_attempts = mysqli_query($connection, $attempt);
            $_SESSION['id'] = $row['userid'];
            header("Location: ../navigations/student/index.php");
            exit(0);
        }
    }
}
header("Location: ../navigations/login.php?error=Please Fill Information");
exit(0);
