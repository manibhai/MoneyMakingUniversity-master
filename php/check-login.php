<?php
session_start();  
include "../navigations/config.php";

if (isset($_POST['email']) && isset($_POST['pass'])) {

	function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $id = test_input($_POST['userid']);
    $email = test_input($_POST['email']);
    $password = test_input($_POST['pass']);
    $type = test_input($_POST['usertype']);
    
    $sql = "SELECT * FROM userlogin WHERE email='".$email."' AND pass='".$password."' ";
    $result = mysqli_query($connection,$sql);
    $row = mysqli_fetch_array($result);

    if($row["usertype"] == "Admin") {
        $_SESSION['userid'] = $row['email'];
        header("Location: ../navigations/admin/index.php");
    }
    else if($row["usertype"] == "Faculty") {
        $_SESSION['id'] = $id;
        header("Location: ../navigations/faculty/index.php");
    }
    else if($row["usertype"] == "Research") {
        $_SESSION['id'] = $id;
        header("Location: ../navigations/research/index.php");
    }
    else if($row["usertype"] == "Student") {
        $_SESSION['id'] = $id;
        header("Location: ../navigations/student/index.php");
    }
	else {
		header("Location: ../navigations/login.php?error=Email or Password is Incorrect");
	}
}
