<?php
// Connect to the database
$host = "localhost";
$user = "root";
$password = "";
$db = "management_system";

session_start();

if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] !== 1 && !isset($_GET['logout']))) {
  header("Location: stafflogin.php");
  exit();
}

$connection = mysqli_connect($host, $user, $password, $db);

// Check for errors
if (mysqli_connect_errno()) {
  die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Retrieve the class_id and student_id values from the $_POST superglobal
$ClassID = $_POST['classID'];
$student_id = $_POST['studentID'];

// Insert a new row into the Class_Students table
$query = "INSERT INTO class_student (classID, studentID) VALUES ('$ClassID', '$student_id')";
$result = mysqli_query($connection, $query);

if ($result) {
  echo "<script>alert('Student added to class successfully!')</script>";
  echo "<meta http-equiv='refresh' content='2;url=stafftimetable.php'>";
} else {
  echo 'Error adding student to class: ' . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
?>
