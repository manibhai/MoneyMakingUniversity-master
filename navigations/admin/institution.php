<?php


	$queryStudentCount = "SELECT COUNT('studentid') AS `stuTotal` FROM student;";
	$studentCount = mysqli_fetch_assoc(mysqli_query($connection, $queryStudentCount));
	(int)$studentCount['stuTotal'];

    $queryFacultyCount = "SELECT COUNT('facultyid') AS 'facCount' FROM faculty ";
    $facultyCount = mysqli_fetch_assoc(mysqli_query($connection,$queryFacultyCount));
    (int)$facultyCount['facCount'];
    
	$queryRCount = "SELECT COUNT('resid') AS 'resCount' FROM researchstaff ";
    $Count = mysqli_fetch_assoc(mysqli_query($connection,$queryRCount));
    (int)$Count['resCount'];

//get passing rate
    $queyAllHistories = "SELECT COUNT('grade') AS `allgrades` FROM studenthistory;";
    $gradeCount = mysqli_fetch_assoc( mysqli_query($connection, $queyAllHistories))['allgrades'];
    
    $queyPassHistories = "SELECT COUNT('grade') AS `allpassinggrades` FROM studenthistory 
    WHERE grade LIKE 'A%' OR grade LIKE 'B%' OR grade LIKE 'C%' ";
    $gradeCountPass = mysqli_fetch_assoc( mysqli_query($connection, $queyPassHistories))['allpassinggrades'];
?>