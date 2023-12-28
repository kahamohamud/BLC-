<?php
// must be included in each and very file.
$host="localhost";//database 
$user="root"; // common username used
$password=""; // no password set
$db="management_system"; // you can choose any name but must be saved in htdocs to work
include('HeaderStaff.php');//header file
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
  <link rel="stylesheet" href="OfferLetter.css"> 
  <link rel="stylesheet" href="footer1.css"> 
  <link rel="stylesheet" href="Testt.css"> 
  <link rel="stylesheet" href="StaffM.css"> 
  <script src="OfferLetter.js"></script>
  <title>Offer Letter</title>
</head>
<body>
  <!-- Search Button -->
<div>
  <div class="search">
    <form id='search' Class="search-container" method="POST">
       <input  type='text' placeholder='Staff Name/User Name'Class="searchinput-field"  name='searchTerm' >

                            
     
       <button type='submit'Class="search-btn" name="apply" value="apply" >Search</button>
    </form>
</div>
</div>
<!--Create New Offer Letter-->
<div class="class-select-container">
  <button class="button-9" onclick="window.location.href='staffform.php';">Add a New Staff</button>
</div>


<script src="OfferLetter.js"></script>
 <!-- Display all records -->
 <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchTerm'])) {
  // Sanitize the input to prevent SQL injection
  $searchTerm = mysqli_real_escape_string($connection, $_POST['searchTerm']);

  // Search based on the student name (StudentName column)
  $select = "SELECT * FROM authintication WHERE staffName LIKE '%$searchTerm%' ORDER BY idAuthintication DESC";
} else {
  // Display all records when no search term is provided
  $select = "SELECT * FROM authintication ORDER BY idAuthintication DESC";
}
  

$result = mysqli_query($connection, $select);
  ?>
  <div class="filter">
  <table class="filter"> 
    <thead>
<tr>
        <th>Name</th>
        <th>username<br></th>
        <th>Password<br></th>
        <th>Position<br></th>
        <th>Delete</th>
        <th>Edit</th>
</tr>
</thead>
<tbody>
<!-- looping for display -->
<?php
    while ($info = $result->fetch_array(MYSQLI_ASSOC)) {
    ?>

<tr>
        <td><?php echo "{$info['staffName']}" ?></td>
        <td><?php echo "{$info['UserName']}" ?></td>
        <td><?php echo "{$info['staffPassword']}" ?></td>
        <td><?php echo "{$info['user_type']}" ?></td>
  <td><a class='button-8' onclick="return confirm('Are You Sure to Delete This');" href='Sdelete.php?Name=<?php echo $info['idAuthintication']; ?>'>Delete</a></td>
  <td><a class='button-7' onclick="return confirm('Are You Sure to Update This');" href='staffedit.php?staffID=<?php echo $info['idAuthintication']; ?>'>Edit</a></td>
</tr>
</tbody>
<?php
}
?>
<!-- </tbody> -->
</div>
</table>
</div>
</div>
  </div>
</body>
</html>