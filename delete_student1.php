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
error_reporting(0);
session_start(); // session starts whenevr i login/logout, and it must be in everypage since we might login/logout in every page, and we start doing functions in the system
 //when the user enter worng info, or unauthorized access it will show error

if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] !== 1 && !isset($_GET['logout']))) {
  header("Location: stafflogin.php");
  exit();
}

// Function to delete a student from the database
function deleteStudent($studentID, $classID)
{
    global $connection;

    // Delete the student from the specific class in the `class_student` table
    $deleteQuery = "DELETE FROM class_student WHERE studentID = $studentID AND classID = $classID";
    $result = $connection->query($deleteQuery);

    if ($result === TRUE) {
        return true; // Student removed from class successfully
    } else {
        return false; // Error removing student from class
    }
}


// Fetching student and class data from the database
$classQuery = "SELECT classID, classID FROM class";
$classResult = mysqli_query($connection, $classQuery);

if (!$classResult) {
    die('Error retrieving data: ' . mysqli_error($connection));
}

// Check if the delete button was clicked
if (isset($_POST['Delete'])) {
    // Get the student ID and class ID from the form
    $studentID = $_POST['studentID'];
    $classID = $_POST['classID'];

    // Call the delete function
    $deleted = deleteStudent($studentID, $classID);

    if ($deleted) {
        echo "<script>alert('Student removed from class successfully');</script>";
    } else {
        echo "<script>alert('Error removing student from class: " . mysqli_error($connection) . "');</script>";
    }

    echo "<script>window.location.href = 'stafftimetable.php';</script>";
}

// Get the selected class ID from the form or query parameter
if (isset($_POST['classID'])) {
    $selectedClassID = $_POST['classID'];
} elseif (isset($_GET['classID'])) {
    $selectedClassID = $_GET['classID'];
} else {
    $selectedClassID = ""; // Default value if not selected
}

// Fetch students for the selected class
$studentQuery = "SELECT student.studentID, student.studentName 
                 FROM student
                 INNER JOIN class_student ON student.studentID = class_student.studentID
                 WHERE class_student.classID = '$selectedClassID'";

$studentResult = mysqli_query($connection, $studentQuery);

if (!$studentResult) {
    die('Error retrieving data: ' . mysqli_error($connection));
}

?>

<!-- HTML form -->
<link rel="stylesheet" href="add_student.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<div class="overlay">
    <div class="container">
        <form method="post" action="">
            <h2>Delete Student</h2>
            <label for="classID">Class:</label>
            <select name="classID">
                <?php
                // Display class options
                while ($row = mysqli_fetch_assoc($classResult)) {
                    $classID = $row['classID'];
                    $selected = ($classID == $selectedClassID) ? 'selected' : '';
                    echo "<option value='$classID' $selected>$classID</option>";
                }
                ?>
            </select>
            <br>
            <label for="studentID">Select a student:</label>
            <select name="studentID" id="studentID">
                <?php
                // Display student options
                if (mysqli_num_rows($studentResult) > 0) {
                    while ($row = mysqli_fetch_assoc($studentResult)) {
                        $studentID = $row['studentID'];
                        $studentName = $row['studentName'];
                        echo "<option value='$studentID'>$studentName</option>";
                    }
                }
                ?>
            </select>
            <br>
            <input type="submit" name="Delete" value="Delete">
        </form>
        <button class="submit" onclick="location.href='stafftimetable.php'"> <i class="fas fa-arrow-left"></i> </button>
    </div>
</div>
