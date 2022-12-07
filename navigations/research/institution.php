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

//get passing rate
$queyAllHistories = "SELECT COUNT('grade') AS `allgrades` FROM studenthistory;";
$gradeCount = mysqli_fetch_assoc(mysqli_query($connection, $queyAllHistories))['allgrades'];

$queyPassHistories = "SELECT COUNT('grade') AS `allpassinggrades` FROM studenthistory 
    WHERE grade LIKE 'A%' OR grade LIKE 'B%' OR grade LIKE 'C%' ";
$gradeCountPass = mysqli_fetch_assoc(mysqli_query($connection, $queyPassHistories))['allpassinggrades'];
?>

<h3 class='row col-12'>Student Stats</h3><br />


<div class='row'>

	<table class='table col-12'>
		<thead>
			<tr class='table table-dark table-border'>
				<td>Students Enrolled</td>
				<td>Undergraduate Students</td>
				<td>Graduate Students</td>

				<td>Total Part Time Students</td>
				<td>Total Full Time Students</td>

				<td>Undergraduate Full Time</td>
				<td>Undergraduate Part Time</td>

				<td>Graduate Full Time</td>
				<td>Graduate Part Time</td>

			</tr>
		</thead>

		<tbody>
			<?php
			echo "<tr>";
			echo "<td>" . $totalStudents . "</td>";
			echo "<td>" . $gradStuCount . "</td>";
			echo "<td>" . $ugStuCount . "</td>";

			echo "<td>" . ($ugStuCountFull + $gStuCountFull) . "</td>";
			echo "<td>" . ($gStuCountPart + $ugStuCountPart) . "</td>";

			echo "<td>" . $ugStuCountFull . "</td>";
			echo "<td>" . $ugStuCountPart . "</td>";

			echo "<td>" . $gStuCountFull . "</td>";
			echo "<td>" . $gStuCountPart . "</td>";

			echo "</tr>";


			?>


		</tbody>

	</table>

</div>

<div class='col-1'></div>
<div class='row'>

	<table class='table col-5'>
		<thead>
			<tr class='table-primary table-border'>
				<td>Average GPA</td>
				<td>Passing Rate</td>




			</tr>
		</thead>

		<tbody>
			<?php
			echo "<tr>";
			echo "<td>3.12</td>";
			echo "<td>" . round((100 * $gradeCountPass / $gradeCount), 2) . "%</td>";
			echo "</tr>";


			?>


		</tbody>

	</table>

</div>