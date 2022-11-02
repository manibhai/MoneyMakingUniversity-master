<?php

include '../config.php';

if(!isset($_SESSION['userid'])){
    header("Location: ../login.php");
  }
  
$studentId = $_SESSION['userid'];

    echo $studentId;
?>