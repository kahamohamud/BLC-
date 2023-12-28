<?php
// Connect to the database
$host = "localhost";
$user = "root";
$password = "";
$db = "management_system";

$connection = mysqli_connect($host, $user, $password, $db);

// Check for errors
if (mysqli_connect_errno()) {
  die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Retrieve the student name from the query string
$name = $_GET['name'];

// Query the students table to search for students with the given name
$query = "SELECT studentID, studentName FROM student WHERE studentName LIKE '%$name%'";
$result = mysqli_query($connection, $query);

if (!$result) {
  die('Error retrieving students: ' . mysqli_error($connection));
}

// Fetch the matching students and store them in an array
$students = array();
while ($row = mysqli_fetch_assoc($result)) {
  $students[] = $row;
}

// Close the database connection
mysqli_close($connection);

// Return the matching students as JSON response
header('Content-Type: application/json');
echo json_encode($students);
?>