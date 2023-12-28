<!DOCTYPE html>
<html>
<head>
	<title>Class Information</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
			margin-bottom: 20px;
		}

		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}

		th {
			background-color: #f2f2f2;
			color: #333;
			
		}

		h1 {
			text-align: center;
			margin-top: 50px;
			
		}

		.week-label {
			
			text-align: center;
		}

		.week-separator {
			border: 1px solid #ddd;
			text-align: center;
			
		}

		.week-separator input[type="text"] {
			width: 40px; /* Increased width for the input text boxes */
			border-width: 3px;
		}

		.checkbox-cell {
			text-align: center;	
		}

		.checkbox-cell input[type="checkbox"] {
			margin: 0;
			/* width: 120px; */
			
		}
	</style>
</head>
<body>
	<?php
		// Connect to database
		$host = "localhost";
		$user = "root";
		$password = "";
		$db = "management_system";
		$connection = mysqli_connect($host, $user, $password, $db);

		// Get class ID from URL parameter
		$classID = $_GET['classID'];
		

		// Retrieve class information from database
		$select_class = "SELECT * FROM class WHERE classID = '$classID'";
		$result_class = mysqli_query($connection, $select_class);
		$info_class = mysqli_fetch_array($result_class);
		$class_level = $info_class['Level'];
		$ClassVenue = $info_class['ClassVenue'];
		$TeacherName = $info_class['TeacherName'];
		$prog = $info_class['prog'];
		$Time = $info_class['Time'];
		$Time1 = $info_class['Time1'];

		// Retrieve student information for the class from the class_student table
		$select_students = "SELECT * FROM class_student INNER JOIN student ON class_student.studentID = student.studentID WHERE class_student.classID = '$classID'";
		$result_students = mysqli_query($connection, $select_students);
	?>

	<h1>Class Attendance</h1>

	<!-- Display class information in a table -->
	<table>
	  <tr>
	    <th>Class ID</th>
	    <td><?php echo $classID; ?></td>
		<th>Class Level</th>
	    <td><?php echo $class_level; ?></td>
	  </tr>
	  <tr>
	  <th>Class Venue</th>
	    <td><?php echo $ClassVenue; ?></td>
		<th> Teacher Name</th>
		<td> <?php echo $TeacherName; ?></td>
		<th>Course</th>
		<td> <?php echo $prog; ?></td>
	  </tr>
	  <tr>
	  <!-- <th>Today's Date</th>
		<td></td> -->
		<th>Start Time</th>
		<td><?php echo $Time; ?></td>
		<th>End Time</th>
		<td><?php echo $Time1; ?></td>
	  </tr>
	</table>

	<!-- Display student information in a table -->
	<table>
		<tr>
			<th></th>
			<th></th>
			<?php for ($week = 1; $week <= 4; $week++): ?>
				<th class="week-separator" colspan="5">WEEK <?php echo $week; ?></th>
			<?php endfor; ?>
			<th>Remarks</th>
			
		</tr>
		<tr>
			<th></th>
			<th></th>
			<?php for ($week = 1; $week <= 4; $week++): ?>
				<?php for ($day = 1; $day <= 5; $day++): ?>
					<th class="week-separator"><input type="text" name="date[]" ></th>
				<?php endfor; ?>
			<?php endfor; ?>
			<th></th>
		</tr>
		<tr>
			<th></th>
			<th></th>
			<?php for ($week = 1; $week <= 4; $week++): ?>
				<?php for ($day = 1; $day <= 5; $day++): ?>
					<th class="week-separator"><input type="text" name="date[]" ></th>
				<?php endfor; ?>
			<?php endfor; ?>
			<th></th>
		</tr>
		<tr>
			<th>Student ID</th>
			<th>Student Name</th>
			<?php for ($week = 1; $week <= 4; $week++): ?>
				<?php for ($day = 1; $day <= 5; $day++): ?>
					<!-- <td class="checkbox-cell"><input type="checkbox" name="checkbox1"></td> -->
				<?php endfor; ?>
			<?php endfor; ?>
			<!-- <td></td> -->
		</tr>
		<?php while($info_student = mysqli_fetch_array($result_students)): ?>
		<tr>
			<td><?php echo $info_student['studentID']; ?></td>
			<td><?php echo $info_student['studentName']; ?></td>
			<?php for ($week = 1; $week <= 4; $week++): ?>
				<?php for ($day = 1; $day <= 5; $day++): ?>
					<td class="checkbox-cell"><input type="checkbox" name="checkbox1"></td>
				<?php endfor; ?>
			<?php endfor; ?>
			<td></td>
		</tr>
		<?php endwhile; ?>
	</table>
	<div style="padding: 10px;">
		<table width="100%" cellpadding="5" cellspacing="0">
			<tr>
				<td style="text-align: left;">Signed:___________________________</td>
			</tr>
		</table>
	</div>
</body>
</html>
