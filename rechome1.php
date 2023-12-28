<?php
// must be included in each and very file.
$host="localhost";//database 
$user="root"; // common username used
$password=""; // no password set
$db="management_system"; // you can choose any name but must be saved in htdocs to work
include('Header10R.php');//header file
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
  <title>Accounting</title>
</head>
<body>
  <!-- Search Button -->
<div>
  <div class="search">
    <form id='search' Class="search-container" method="POST">
       <input  type='text' placeholder='Student Name' class='searchinput-field' name='searchTerm' >
       <button type='submit'Class="search-btn" name="inf" value="inf" >Search</button>
    </form>

    <!-- Add New Button For New Reciept: -->
    <div class="class-select-container">
  <button class="button-9" onclick="window.location.href='recnew1.php';">Add a New Receipt</button>
</div>

</div>
</div>


 <!-- Display all records -->
 
 <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchTerm'])) {
  // Sanitize the input to prevent SQL injection
  $searchTerm = mysqli_real_escape_string($connection, $_POST['searchTerm']);

  // Search based on the student name (StudentName column)
  $select = "SELECT * FROM receipt WHERE StudentName LIKE '%$searchTerm%' ORDER BY ID DESC";
} else {
  // Display all records when no search term is provided
  $select = "SELECT * FROM receipt ORDER BY ID DESC";
}


$result = mysqli_query($connection, $select);
?>

  <div class="filter">
  <table class="filter"> 
<thead>
<tr>
<th>Receipt Ref No</th>
<th>Student Name</th>
<th>Date</th>
<th>Payement Methode</th>
<th>Paid Amount</th>
<th>Payemnt Of</th>
<th>Payemnt in number</th>
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
<td><?php echo $info['Rref']; ?></td>
  <td><?php echo $info['studentName']; ?></td>
  <td><?php echo $info['Date']; ?></td>
  <td><?php echo $info['PaymentM']; ?></td>
  <td><?php echo $info['PaidAmount']; ?></td>
  <td><?php echo $info['PaymentOf']; ?></td>
  <td><?php echo $info['PaidInNumber']; ?></td>
  <td><a class='button-8' onclick="return confirm('Are You Sure to Delete This');" href='recdelete.php?recdelete=<?php echo $info['Rref']; ?>'>Delete</a></td>
  <td><a class='button-7' onclick="return confirm('Are You Sure to Update This');" href='recieptform1.php?reciept=<?php echo $info['Rref']; ?>'>Edit</a></td>
  <td><a class='button-1' href='recieptView1.php?recieptV=<?php echo $info['Rref']; ?>'>View</a></td>
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