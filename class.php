<?php
// must be included in each and very file.
$host="localhost";//database 
$user="root"; // common username used
$password=""; // no password set
$db="management_system"; // you can choose any name but must be saved in htdocs to work
include('Header5.php');//header file
include('footer1.php'); 
// include('header copy.php');//header file, instead of writing the whole code you can just include.
session_start(); // session starts whenevr i login/logout, and it must be in everypage since we might login/logout in every page, and we start doing functions in the system
error_reporting(0); //when the user enter worng info, or unauthorized access it will show error

if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] !== 1 && !isset($_GET['logout']))) {
  header("Location: stafflogin.php");
  exit();
}

$connection=mysqli_connect($host,$user,$password,$db); // connect to the sql you intilised before.

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="class.css"> 
  <link rel="stylesheet" href="footer1.css"> 
  <link rel="stylesheet" href="Testt.css"> 
  <script src="OfferLetter.js"></script>
  <title>Offer Letter</title>
  
</head>
<body>
  <!-- Search Button -->
<div>
  <div class="search">
    <form id='search' Class="search-container" method="POST">
       <input  type='text' placeholder='Class ID/Teacher Name'Class="searchinput-field"  name='searchTerm' >

                            
     
       <button type='submit'Class="search-btn" name="inf1" value="inf1" >Search</button>
    </form>
</div>
</div>

<div class="class-select-container">
  <button class="button-9" onclick="window.location.href='classM.php';">Add a New Class</button>
</div>

    </form>

    </div>
    </div>
  <!-- display all records in the database -->
 <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchTerm'])) {
  // Sanitize the input to prevent SQL injection
  $searchTerm = mysqli_real_escape_string($connection, $_POST['searchTerm']);

  // Search based on the student name (StudentName column)
  $select = "SELECT * FROM class WHERE TeacherName LIKE '%$searchTerm%'OR classID LIKE '%$searchTerm%'";
} else {
  // Display all records when no search term is provided
  $select = "SELECT * FROM class";
}

$result = mysqli_query($connection, $select);

// Retrieve the number of students for each class
$selectTotalStudents = "SELECT c.*, COUNT(cs.studentID) AS student_count
           FROM class AS c
           LEFT JOIN class_student AS cs ON c.classID = cs.classID
           GROUP BY c.classID
           ORDER BY c.classID DESC";
$totalStudentsResult = mysqli_query($connection, $selectTotalStudents);
?>


<!-- Table columns -->
<div class="filter">
     <table class="filter">
      <thead>
     <tr>
     <th>Class ID</th>
    <th>Class Level</th>
    <th>Class Venue</th>
    <th>Program</th>
    <th>Class Date</th>
    <th>Start Time</th>
    <th>End Time</th>
    <th>Teacher Name</th>
    <th>Total Students</th>
    <th>Delete</th>
    <th>Edit</th>
    <th>Add Student</th>
    <th>Delete Student</th>
    <th>Attandance</th>
</tr>
</thead>
<tbody>
<tr>
    
<?php while($info = mysqli_fetch_array($result)): ?>
   <tr>
      <td><?php echo $info['classID']; ?></td>
      <td><?php echo $info['Level']; ?></td>
      <td><?php echo $info['ClassVenue']; ?></td>
      <td><?php echo $info['prog']; ?></td>
      <td><?php echo $info['Date']; ?></td>
      <td><?php echo $info['Time']; ?></td>
      <td><?php echo $info['Time1']; ?></td>
      <td><?php echo $info['TeacherName']; ?></td>
      <!-- Update the line below to display total students -->
      <td>
  <?php
    mysqli_data_seek($totalStudentsResult, 0); // Reset the internal pointer
    while ($totalInfo = mysqli_fetch_array($totalStudentsResult)) {
      if ($info['classID'] == $totalInfo['classID']) {
        echo $totalInfo['student_count'];
        break;
      }
    }
  ?>
</td>

      <!-- Rest of the code remains the same -->
      <td> <?php echo"<a class='button-8' onClick=\"javascript:return confirm('Are You Sure to Delete This') ;\"
     href='class_delete.php?ClassID= {$info['classID']}'> 
     Delete </a>";
     ?> </td>
       <td> <?php  echo" <a class='button-7' href='class_edit.php?classID= {$info['classID']}'> 
      Edit</a>"
      ?> </td>
      <td>
  <?php
    echo "<a class='button-1' href='classadd.php?class_id={$info['classID']}'>Add</a>";
  ?>
</td>
<td><?php echo "<a class='button-8' href='delete_student.php?classID=".$info['classID']."'>Delete</a>"?></td>

<td><?php echo "<a class='button-1' href='view_students.php?classID=".$info['classID']."'>View</a>"?></td>
   </tr>
  </tbody>
<?php endwhile; ?>
</table>
</div>
<br/>
</div>


