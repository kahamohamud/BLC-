<?php
// must be included in each and very file.
$host="localhost";//database 
$user="root"; // common username used
$password=""; // no password set
$db="management_system"; // you can choose any name but must be saved in htdocs to work
include('Header7.php');//header file
include('footer1.php'); 
// include('header copy.php');//header file, instead of writing the whole code you can just include.
session_start(); // session starts whenevr i login/logout, and it must be in everypage since we might login/logout in every page, and we start doing functions in the system
error_reporting(0); //when the user enter worng info, or unauthorized access it will show error

if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] !== 1 && !isset($_GET['logout']))) {
  header("Location: stafflogin.php");
  exit();
}

$connection=mysqli_connect($host,$user,$password,$db); // connect to the sql you intilised before.

error_reporting(E_ALL);
ini_set('display_errors', 1);


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

    <div class="class-select-container">
  <button class="button-9" onclick="window.location.href='Invoicenew.php';">Add a New Invoice</button>
</div>

</div>
</div>
<!-- Add New Button For New Invoice: -->

<script src="accounting.js"></script>
 <!-- Display all records -->
 
 <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchTerm'])) {
  // Sanitize the input to prevent SQL injection
  $searchTerm = mysqli_real_escape_string($connection, $_POST['searchTerm']);

  // Search based on the student name (StudentName column)
  $select = "SELECT * FROM accounting WHERE StudentName LIKE '%$searchTerm%' ORDER BY ID DESC";
} else {
  // Display all records when no search term is provided
  $select = "SELECT * FROM accounting ORDER BY ID DESC";
}

$result = mysqli_query($connection, $select);
?>

  <div class="filter">
  <table class="filter"> 
    <thead>
<tr>
<th>Ref No</th>
<th>Student Name</th>
<!-- <th>Student ID</th> -->
<th>Nationality</th>
<!-- <th>Intake</th> -->
<th>Level</th>
<th>Months</th>
<th>Date</th>
<th>Student Type</th>
<th>Payment Methode</th>
<th>Registration Fee</th>
<th>Visa Fee</th>
<th>Tuition Fee</th>
<th>Special Pass Fee</th>
<th>Shorten Pass Fee</th>
<th>Airport Clearnce Fee</th>
<th>Micsellaneous Fee</th>
<th>Total Fee</th>
<th>Outstanding Fee</th>
<th>Delete</th>
<th>Edit</th>
<!-- <th>Refund</th> -->
<!-- <th>Payment Reciept</th> -->
<!-- <th>Statment of Account</th> -->
<th>Invoice</th>
</tr>
</thead>
<!-- looping for display -->
<?php
while ($info = $result->fetch_array(MYSQLI_ASSOC)) {
  $TotalFees = $info['RegistrationFee'] + $info['VisaFee'] + $info['MFee'] + $info['TuitionFee'] + $info['SpecialPass'] + $info['ShortenFee'] + $info['ACFee'];
  $int_cast = (int)$TotalFees;
?>
<tbody>
<tr>
<td><?php echo $info['Ref']; ?></td>
  <td><?php echo $info['studentName']; ?></td>
  <!-- <td><?php echo $info['studentID']; ?></td> -->
  <td><?php echo $info['studentNationality']; ?></td>
  <!-- <td><?php echo $info['intake']; ?></td> -->
  <td><?php echo $info['Level']; ?></td>
  <td><?php echo $info['Months']; ?></td>
  <td><?php echo $info['Date']; ?></td>
  <td><?php echo $info['StudentType']; ?></td>
  <td><?php echo $info['PaymentM']; ?></td>
  <td><?php echo $info['RegistrationFee']; ?></td>
  <td><?php echo $info['VisaFee']; ?></td>
  <td><?php echo $info['TuitionFee']; ?></td>
  <td><?php echo $info['SpecialPass']; ?></td>
  <td><?php echo $info['ShortenFee']; ?></td>
  <td><?php echo $info['ACFee']; ?></td>
  <td><?php echo $info['MFee']; ?></td>
  <td><?php echo $info['TotalFees']; ?></td>
  <td><?php echo $info['OutFees']; ?></td>
  <td><a class='button-8' onclick="return confirm('Are You Sure to Delete This');" href='invdel.php?accdelete=<?php echo $info['Ref']; ?>'>Delete</a></td>
  <td><a class='button-7' onclick="return confirm('Are You Sure to Update This');" href='accountingedit.php?accountingedit=<?php echo $info['Ref']; ?>'>Edit</a></td>
  <!-- <td><a class='button-1' href='refund.php?refund=<?php echo $info['Ref']; ?>'>View</a></td> -->
  <!-- <td><a class='button-1' onclick="return confirm('Are You Sure to Update This');" href='recieptform.php?reciept=<?php echo $info['studentID']; ?>'>View</a></td>
  <td><a class='button-1' onclick="return confirm('Are You Sure to Update This');" href='accountingedit.php?accountingedit=<?php echo $info['studentID']; ?>'>View</a></td> -->
  <td><a class='button-1' onclick="return confirm('Are You Sure to Update This');" href='Invoice.php?Invoice=<?php echo $info['Ref']; ?>'>View</a></td>
</tr>
<!-- </tr> -->
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