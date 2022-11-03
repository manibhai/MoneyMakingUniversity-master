<?php

include '../config.php';

if(!isset($_SESSION['id'])){
  header("Location: ../login.php");
}
  
$studentId = $_SESSION['userid'];

    echo $studentId;
?>