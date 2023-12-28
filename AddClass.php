<?php

$host="localhost";//database 
$user="root";
$password="";
$db="management_system";


session_start();
$con= mysqli_connect($host, $user, $password, $db); 

if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] !== 1 && !isset($_GET['logout']))) {
  header("Location: stafflogin.php");
  exit();
}

?>

<?php
// Get the form data
$ID = $_POST['ID'];
$level = $_POST['Level'];
$teacher_name = $_POST['TeacherName'];
$date = $_POST['Date'];
$time = $_POST['Time'];
$time1 = $_POST['Time1'];

// Connect to your database
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Insert the new class into the database
$sql = "INSERT INTO class (Level, TeacherName, Date, Time, Time1, ID)
        VALUES ('$level', '$teacher_name', '$date', '$time','$time1', '$ID')";

if (mysqli_query($conn, $sql)) {
  echo "Class created successfully.";
} else {
  echo "Error creating class: " . mysqli_error($conn);
}

mysqli_close($conn);
?>