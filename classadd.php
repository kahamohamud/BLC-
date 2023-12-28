<?php
// Connect to the database
$host = "localhost";
$user = "root";
$password = "";
$db = "management_system";

$connection = mysqli_connect($host, $user, $password, $db);
session_start(); 
if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] !== 1 && !isset($_GET['logout']))) {
  header("Location: stafflogin.php");
  exit();
}
// Check for errors
if (mysqli_connect_errno()) {
  die('Failed to connect to MySQL: ' . mysqli_connect_error());
}
error_reporting(0);


?>

<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="add_student.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<div class="overlay">
    <div class="container">

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

// Query the classes table to get a list of available classes
$query = "SELECT classID, classID FROM class";
$result = mysqli_query($connection, $query);

if (!$result) {
  die('Error retrieving classes: ' . mysqli_error($connection));
}

// Get the class ID from the URL parameter
$classID = $_GET['class_id'];

// Display the form
echo '<h1>Add Student:</h1>';
echo '<form method="post" action="add_student.php">';
echo '<label for="classID">Class:</label> ';
echo '<select name="classID">';
while ($row = mysqli_fetch_assoc($result)) {
  $selected = ($row['classID'] == $classID) ? 'selected' : '';
  echo '<option value="' . $row['classID'] . '" ' . $selected . '>' . $row['classID'] . '</option>';
}
echo '</select>';
echo '<br>';

// Add the student name search functionality
echo '<label for="studentID">Student:</label> ';
echo '<input type="text" name="studentName" placeholder="Enter student name" id="studentName" onkeyup="searchStudents()">';
echo '<br>';
echo '<select name="studentID" id="studentIDDropdown">';
echo '</select>';
echo '<br>';

echo '<input type="submit" value="Add Student to Class">';
echo '</form>';

// Close the database connection
mysqli_close($connection);
?>

<script>
function searchStudents() {
  var input = document.getElementById("studentName").value;
  var dropdown = document.getElementById("studentIDDropdown");

  // Clear previous dropdown options
  dropdown.innerHTML = '';

  // Retrieve student names from the server based on the input
  if (input !== '') {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var students = JSON.parse(this.responseText);

        // Add options to the dropdown
        students.forEach(function(student) {
          var option = document.createElement("option");
          option.value = student.studentID;
          option.text = student.studentName;
          dropdown.add(option);
        });
      }
    };

    xhttp.open("GET", "search_students.php?name=" + input, true);
    xhttp.send();
  }
}
</script>
<button class="submit" onclick="location.href='class.php'"> <i class="fas fa-arrow-left"></i> </button>

</body>
</html>