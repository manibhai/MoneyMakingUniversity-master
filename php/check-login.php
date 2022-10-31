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
  
    $email = test_input($_POST['email']);
    $password = test_input($_POST['pass']);
    $type = test_input($_POST['usertype']);
    
    $sql = "SELECT * FROM userlogin WHERE email='".$email."' AND pass='".$password."' ";
    $result = mysqli_query($connection,$sql);
    $row = mysqli_fetch_array($result);

    if($row["usertype"] == "Admin") {
        header("Location: ../navigations/admin/index.php");
    }
    else if($row["usertype"] == "Faculty") {
        header("Location: ../navigations/faculty/index.php");
    }
    else if($row["usertype"] == "Research") {
        header("Location: ../navigations/research/index.php");
    }
    else if($row["usertype"] == "Student") {
        header("Location: ../navigations/student/index.php");
    }
	else {
		header("Location: ../navigations/login.php?error=Email or Password is Incorrect");
	}
}
