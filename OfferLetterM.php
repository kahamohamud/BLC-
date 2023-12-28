<?php
// must be included in each and very file.
$host="localhost";//database 
$user="root"; // common username used
$password=""; // no password set
$db="management_system"; // you can choose any name but must be saved in htdocs to work
include('Header2M.php');//header file
include('footer1.php'); 
// include('header copy.php');//header file, instead of writing the whole code you can just include.
session_start(); // session starts whenevr i login/logout, and it must be in everypage since we might login/logout in every page, and we start doing functions in the system
error_reporting(0); //when the user enter worng info, or unauthorized access it will show error
// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== 1) {
//   header("Location: stafflogin.php");
//   exit();
// }

$connection=mysqli_connect($host,$user,$password,$db); // connect to the sql you intilised before.

if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] !== 1 && !isset($_GET['logout']))) {
  header("Location: stafflogin.php");
  exit();
}

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
  <script src="OfferLetterM.js"></script>
  <title>Offer Letter</title>
</head>
<body>
  <!-- Search Button -->
<div>
  <div class="search">
    <form id='search' Class="search-container" method="POST">
       <input  type='text' placeholder='Student Name' class='searchinput-field' name='searchTerm' >

                            
     
       <button type='submit'Class="search-btn" name="inf" value="inf" >Search</button>
    </form>
</div>
</div>
<!--Create New Offer Letter-->
<div class="offer-select-container">
<select class="button-9-select" id="offer-select">
  <option value="" disabled selected>Add new offer letter</option>
  <option value="visa">Visa Students</option>
  <option value="nonvisa">Non-Visa Students</option>
</select>
</div>

<script src="OfferLetterM.js"></script>
 <!-- Display all records -->
 
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchTerm'])) {
    $searchTerm = mysqli_real_escape_string($connection, $_POST['searchTerm']);

    // Use the LIKE operator for partial string matching
    $select = "SELECT * FROM offerletter WHERE passport LIKE '%$searchTerm%' OR Name LIKE '%$searchTerm%' ORDER BY ID DESC";
} else {
    $select = "SELECT * FROM offerletter ORDER BY ID DESC";
}

$result = mysqli_query($connection, $select);

  ?>
  <div class="filter">
  <table class="filter"> 
    <thead>
<tr>

<th>Ref NO.</th>
<th>Date</th>
<th>Name</th>
<th>Passport NO.</th>
<th>Nationalty</th>
<th>Programme</th>
<th>Course Duration</th>
<th>Intake</th>
<th>Regestration fee</th>
<th>Attendance fee</th>
<th>Tution fee</th>
<th>Other Fees</th>
<th>Total Fees</th>
<th>Delete</th>
<th>Edit</th>
<th>View</th>

</tr>
</thead>
<!-- looping for Total-->
<?php
while ($info = $result->fetch_array(MYSQLI_ASSOC)) {
  $Totalfee = $info['RVPfee'] + $info['ACPfee'] + $info['Toutionfee'] + $info['other_fees'];
  $int_cast = (int)$Totalfee;
?>
<tbody>
<tr>
  <td><?php echo $info['Ref']; ?></td>
  <td><?php echo $info['Date']; ?></td>
  <td><?php echo $info['Name']; ?></td>
  <td><?php echo $info['passport']; ?></td>
  <td><?php echo $info['Nationalty']; ?></td>
  <td><?php echo $info['prog']; ?></td>
  <td><?php echo $info['CourseD']; ?></td>
  <td><?php echo $info['intake']; ?></td>
  <td><?php echo $info['RVPfee']; ?></td>
  <td><?php echo $info['ACPfee']; ?></td>
  <td><?php echo $info['Toutionfee']; ?></td>
  <td><?php echo $info['other_fees']; ?></td>
  <td><?php echo $Totalfee; ?></td>
  <td><a class='button-8' onclick="return confirm('Are You Sure to Delete This');" href='OfferLetterDelete.php?offerletter1=<?php echo $info['ID']; ?>'>Delete</a></td>
  <td><a class='button-7' onclick="return confirm('Are You Sure to Update This');" href='OfferLetterEdit1.php?offerletterupdate=<?php echo $info['ID']; ?>'>Edit</a></td>
  <td><a class='button-1' href='view.php?offerletterview=<?php echo $info['ID']; ?>'>View</a></td>
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