<?php


	$queryStudentCount = "SELECT COUNT('studentid') AS `stuTotal` FROM student;";
	$studentCount = mysqli_fetch_assoc(mysqli_query($connection, $queryStudentCount));
	$totalStudents = (int)$studentCount['stuTotal'];

	$queryGradStudentCount = "SELECT COUNT('studentid') AS `gradStuTotal` FROM graduatestudent;";
	$gradStuCount = mysqli_fetch_assoc(mysqli_query($connection, $queryGradStudentCount));
	$gradStuCount = (int)$gradStuCount['gradStuTotal'];

    $queryUnderStudentCount = "SELECT COUNT('studentid') AS `undergradStuTotal` FROM undergraduatestudent;";
	$underGradStuCount = mysqli_fetch_assoc(mysqli_query($connection, $queryUnderStudentCount));
	$ugStuCount = (int)$underGradStuCount['undergradStuTotal'];

    
    $queryUGpartCount = "SELECT COUNT('studentid') AS `partCount` FROM undergraduatestudentparttime";
	$underGradStuCount = mysqli_fetch_assoc(mysqli_query($connection, $queryUGpartCount));
	$ugStuCountPart = (int)$underGradStuCount['partCount'];

    $queryUGpartCount = "SELECT COUNT('studentid') AS `partGradCount` FROM graduatestudentparttime";
	$GradStuCount = mysqli_fetch_assoc(mysqli_query($connection, $queryUGpartCount));
	$gStuCountPart = (int)$GradStuCount['partGradCount'];

    $queryUGpartCount = "SELECT COUNT('studentid') AS `fullCount` FROM undergraduatestudentfulltime";
	$underGradStuCount = mysqli_fetch_assoc(mysqli_query($connection, $queryUGpartCount));
	$ugStuCountFull = (int)$underGradStuCount['fullCount'];

    $queryUGpartCount = "SELECT COUNT('studentid') AS `fullGradCount` FROM graduatestudentfulltime";
	$GradStuCount = mysqli_fetch_assoc(mysqli_query($connection, $queryUGpartCount));
	$gStuCountFull = (int)$GradStuCount['fullGradCount'];

    $queryFacultyCount = "SELECT COUNT('facultyid') AS 'facCount' FROM faculty ";
    $facultyCount = mysqli_fetch_assoc(mysqli_query($connection,$queryFacultyCount));
    $fCount = (int)$facultyCount['facCount'];
    

//get passing rate
    $queyAllHistories = "SELECT COUNT('grade') AS `allgrades` FROM studenthistory;";
    $gradeCount = mysqli_fetch_assoc( mysqli_query($connection, $queyAllHistories))['allgrades'];
    
    $queyPassHistories = "SELECT COUNT('grade') AS `allpassinggrades` FROM studenthistory 
    WHERE grade LIKE 'A%' OR grade LIKE 'B%' OR grade LIKE 'C%' ";
    $gradeCountPass = mysqli_fetch_assoc( mysqli_query($connection, $queyPassHistories))['allpassinggrades'];
?>