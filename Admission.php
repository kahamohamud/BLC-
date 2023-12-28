<?php
// must be included in each and very file.
$host="localhost";//database 
$user="root"; // common username used
$password=""; // no password set
$db="management_system"; // you can choose any name but must be saved in htdocs to work
include('Aheader.php');//header file
include('footer1.php'); 
// include('header copy.php');//header file, instead of writing the whole code you can just include.
session_start(); // session starts whenevr i login/logout, and it must be in everypage since we might login/logout in every page, and we start doing functions in the system
error_reporting(0); //when the user enter worng info, or unauthorized access it will show error

if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] !== 1 && !isset($_GET['logout']))) {
  header("Location: stafflogin.php");
  exit();
}

$connection=mysqli_connect($host,$user,$password,$db); // connect to the sql you intilised before.

// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== 1) {
//   header("Location: stafflogin.php");
//   exit;
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Admission.css"> 
  <link rel="stylesheet" href="footer1.css"> 
  <link rel="stylesheet" href="Testt.css"> 
  <script src="OfferLetter.js"></script>
  <title>Offer Letter</title>
</head>
<body>
 <!-- Search Button -->
 <div class="container-wrapper">
    <!-- Search Button -->
    <div class="search">
      <form id="search" class="search-container" method="POST">
        <input type="text" placeholder="Student Name" class="searchinput-field" name="searchTerm">
        <button type="submit" class="search-btn" name="Adm" value="Adm">Search</button>
      </form>
    </div>
    
    <!-- Create New Offer Letter -->
    <div class="offer-select-container">
  <button class="button-9" onclick="window.location.href='AdmissionNew.php';">Add A New Student</button>
</div>

  </div>


<script src="OfferLetter.js"></script>
 <!-- Display all records -->
 <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchTerm'])) {
  // Sanitize the input to prevent SQL injection
  $searchTerm = mysqli_real_escape_string($connection, $_POST['searchTerm']);

  // Search based on the student name (StudentName column)
  $select = "SELECT * FROM student WHERE studentName LIKE '%$searchTerm%' ORDER BY studentID DESC";
} else {
  // Display all records when no search term is provided
  $select = "SELECT * FROM student ORDER BY studentID DESC";
}

$result = mysqli_query($connection, $select);

  ?>
  <div class="filter">
  <table class="filter"> 
  <thead>
  <tr>
  <th>Ref NO</th>
  <th>Name</th>
  <th>Passport No</th>
  <th>IC No</th>
  <th>Nationality</th>
  <th>Birth Date</th>
  <th>Mobile No</th>
  <th>House No</th>
  <th>Gender</th>
  <th>Martial status</th>
  <th>Address</th>
  <th>City</th>
  <th>Postcode</th>
  <th>State</th>
  <th>Country</th>
  <th>Student Email</th>
  <th>Partent's Email</th>
  <th>Program name</th>
  <th>Start month</th>
  <th>End month</th>
  <th>Introducer</th>
  <th>Student Counselor</th>
  <th>Status</th>
  <th>Delete</th>
  <th>Edit</th>
  <th>View Form</th>
  </tr>
</thead>
<tbody>
  <?php
  while ($info=$result->fetch_array(MYSQLI_ASSOC)){ // loop for fetching the colmuns, or loop for doing constant search(?)
    ?>
  <tr>
    <td><?php echo"{$info['RefNo']}"?></td>
    <td><?php echo"{$info['studentName']}"?></td>
    <td><?php echo"{$info['studentPassportNo']}"?></td>
    <td><?php echo"{$info['studentICNo']}"?></td>
    <td><?php echo"{$info['studentNationality']}"?> </td>
    <td><?php echo"{$info['studentDateOfBirth']}"?></td>
    <td><?php echo"{$info['studentMobile']}"?></td>
    <td><?php echo"{$info['studentHouseNo']}"?></td>
    <td><?php echo"{$info['studentSex']}"?></td>
    <td><?php echo"{$info['studentStatus']}"?></td>
    <td><?php echo"{$info['studentAddress']}"?></td>
    <td><?php echo"{$info['studentCity']}"?></td>
    <td><?php echo"{$info['studentPostCode']}"?></td>
    <td><?php echo"{$info['studentState']}"?></td>
    <td><?php echo"{$info['studentCountry']}"?></td>
    <td><?php echo"{$info['studenEmail']}"?></td>
    <td><?php echo"{$info['studentPEmail']}"?></td>
    <td><?php echo"{$info['studentProgram']}"?></td>
    <td><?php echo"{$info['studentStart']}"?></td>
    <td><?php echo"{$info['studentEnd']}"?></td>
    <td><?php echo"{$info['studentIntroducer']}"?></td>
    <td><?php echo"{$info['studentCouncelor']}"?></td>
    <td><?php echo"{$info['Status']}"?></td>
  <td><a class='button-8' onclick="return confirm('Are You Sure to Delete This');" href='Adelete.php?student_id=<?php echo $info['studentID']; ?>'>Delete</a></td>
  <td><a class='button-7' onclick="return confirm('Are You Sure to Update This');" href='Aedit.php?Aedit=<?php echo $info['studentPassportNo']; ?>'>Edit</a></td>
  <td><a class='button-1' href='Aview.php?admitview=<?php echo $info['studentID']; ?>'>View</a></td>
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