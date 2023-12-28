<?php
// must be included in each and very file.
$host="localhost";//database 
$user="root"; // common username used
$password=""; // no password set
$db="management_system"; // you can choose any name but must be saved in htdocs to work
include('Header0R.php');//header file
include('footer1.php'); 
// include('header copy.php');//header file, instead of writing the whole code you can just include.
session_start(); // session starts whenevr i login/logout, and it must be in everypage since we might login/logout in every page, and we start doing functions in the system


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
  <title>Refund</title>
</head>
<body>
  <!-- Search Button -->
<div>
  <div class="search">
    <form id='search' Class="search-container" method="POST">
       <input  type='text' placeholder='Student Name' class='searchinput-field' name='searchTerm' >

                            
     
       <button type='submit'Class="search-btn" name="inf" value="inf" >Search</button>
    </form>

    <div class="class-select-container">
  <button class="button-9" onclick="window.location.href='RefundNew1.php';">Add a New Refund Statement</button>
</div>

</div>
</div>

<!-- Add New Button For New Refund: -->

 
 <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchTerm'])) {
  // Sanitize the input to prevent SQL injection
  $searchTerm = mysqli_real_escape_string($connection, $_POST['searchTerm']);

  // Search based on the student name (StudentName column)
  $select = "SELECT * FROM refund WHERE StudentName LIKE '%$searchTerm%' ORDER BY ID DESC";
} else {
  // Display all records when no search term is provided
  $select = "SELECT * FROM refund ORDER BY ID DESC";
}


$result = mysqli_query($connection, $select);
if (!$result) {
  die("Error executing the query: " . mysqli_error($connection));
}
?>
 

 <div class="filter">
  <table class="filter"> 
  <thead>
<tr>
<th>Refund Ref</th>
<th>Student Name</th>
<th>Nationality</th>
<th>Passport No</th>
<th>Level</th>
<th>Date</th>
<th>Payment Method</th>
<th>Total Refund</th>
<th>Reason Of Refund</th>
<th>Delete</th>
<th>Edit</th>
<th>View</th>
</tr>
</thead>

<!-- looping for display -->
<tbody>
<?php
while ($info = $result->fetch_array(MYSQLI_ASSOC)) {
?>
<tr>
<td><?php echo $info['RefundRef']; ?></td>
  <td><?php echo $info['studentName']; ?></td>
  <td><?php echo $info['studentNationality']; ?></td>
  <td><?php echo $info['studentPassportNo']; ?></td>
  <td><?php echo $info['Level']; ?></td>
  <td><?php echo $info['RDate']; ?></td>
  <td><?php echo $info['RefundM']; ?></td>
  <td><?php echo $info['TotalRefund']; ?></td>
  <td><?php echo $info['Reason']; ?></td>
  <td><a class='button-8' onclick="return confirm('Are You Sure to Delete This');" href='accdelete.php?accdelete=<?php echo $info['RefundRef']; ?>'>Delete</a></td>
  <td><a class='button-7' onclick="return confirm('Are You Sure to Update This');" href='refundf1.php?refund=<?php echo $info['RefundRef']; ?>'>Edit</a></td>
  <td><a class='button-1' href='refundview1.php?refund=<?php echo $info['RefundRef']; ?>'>View</a></td>
</tr>
</tbody>
<?php
}
?>
</div>
</table>
</div>
</div>
</div>
</body>
</html>