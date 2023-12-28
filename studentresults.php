<?php
// must be included in each and very file.
$host="localhost";//database 
$user="root"; // common username used
$password=""; // no password set
$db="management_system"; // you can choose any name but must be saved in htdocs to work
include('header9.php');//header file
include('footer.php'); 
// include('header copy.php');//header file, instead of writing the whole code you can just include.
session_start(); // session starts whenevr i login/logout, and it must be in everypage since we might login/logout in every page, and we start doing functions in the system
error_reporting(0); //when the user enter worng info, or unauthorized access it will show error

if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] !== 1 && !isset($_GET['logout']))) {
  header("Location: studentlogin.php");
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
  <link rel="stylesheet" href="newacad1.css"> 
  <link rel="stylesheet" href="footer.css"> 
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="OfferLetter.js"></script>
  <title>Student Result</title>
</head>
<body>

<!-- Student Search Results -->
<div class="search">
    <form id='search' Class="search-container"  method="POST">
       <input type='text' placeholder='Passport Number'Class="searchinput-field"  name='studentID' required>
       <button type='submit'Class="search-btn"  name="submit" value="submit" >Check My Result</button>
    </form>
</div>
<!--   
  </div> -->
  <!-- <div> -->

  <!-- Retrive Student Results -->
  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $studentID = $_POST['studentID'];

  $select = "SELECT * FROM acadimic WHERE studentPassportNo = ?";
  $stmt = mysqli_prepare($connection, $select);
  mysqli_stmt_bind_param($stmt, "s", $studentID);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  // Table columns and results display
  ?>
   

   <?php
      while ($info = $result->fetch_array(MYSQLI_ASSOC)) {
        $TotalS = $info['Grammar'] + $info['Reading'] + $info['Writing'] + $info['Vocab'] + $info['Listening'] + $info['Speaking'] + $info['Tassessment'];
        $TotalP = ($TotalS / 150) * 100;
        $int_cast = floor($TotalP);
      ?>
  
  <form method="POST">
  <div class="info-container">
  <table>
    <tr>
      <td class="info-row">
        <b>Name:</b> <?php echo "{$info['studentName']}" ?>
      </td>
      <td class="info-row">
        <b>Student ID:</b> <?php echo "{$info['studentID']}" ?>
      </td>
      <td class="info-row">
        <b>Passport Number:</b> <?php echo "{$info['studentPassportNo']}" ?>
      </td>
      <td class="info-row">
        <b>Country:</b> <?php echo "{$info['studentCountry']}" ?>
      </td>
      <td class="info-row">
        <b>Date:</b> <?php echo "{$info['sdate']}" ?>
      </td>
      <td class="info-row">
        <b>Units covered:</b> <?php echo "{$info['Units']}" ?>
      </td>
      <td class="info-row">
        <b>Teacher Name: </b> <?php echo "{$info['TeacherName']}" ?>
      </td>
      <!-- Add more student details here -->
    </tr>
  </table>
  
  <!-- Grade Table -->
  <table class="grade-table">
    <tr>
      <th>Assessment</th>
      <th>Marks</th>
    </tr>
    <tr>
    <td>Grammar</td>
    <td> <?php echo"{$info['Grammar']}"?>/40</td>
  </tr>
  <tr>
    <td>Reading</td>
    <td><?php echo"{$info['Reading']}"?>/20</td>
  </tr>
  <tr>
    <td>Writing</td>
    <td><?php echo"{$info['Writing']}"?> /20</td>
  </tr>
  <tr>
    <td>Listening</td>
    <td><?php echo"{$info['Listening']}"?>/20</td>
  </tr>
  <tr>
    <td>Vocabulary</td>
    <td><?php echo"{$info['Vocab']}"?>/20</td>
  </tr>
  <tr>
    <td>Speaking</td>
    <td><?php echo"{$info['Speaking']}"?>/20</td>
  </tr>
  <tr>
    <td>Teacher Assesment</td>
    <td><?php echo"{$info['Tassessment']}"?>/10</td>
  </tr>
  <tr>
  <tr>
    <td>Total Score</td>
    <td><?php
     echo $TotalS ?>/150</td>
  </tr>
  <tr>
    <td>Total%</td>
    <td><?php echo $int_cast ?>%</td>
  </tr>
  <tr>
    <td>Attendance%</td>
    <td><?php echo"{$info['Attendance']}"?>%</td>
  </tr>
    <!-- Add grade rows here -->
  </table>
  
  <table class="grade-table">
    <tr>
      <td>Teacher's Recommendation:  <?php echo"{$info['TRecom']}"?></td> 
    </tr>
    <tr>
      <td>Notes: <?php echo"{$info['Notes']}"?></td>
    </tr>
    <tr>
      <td><a class='button-1' href='academicview.php?AcademidEdite1=<?php echo $info['ID'];?>'>Print</a></td>
    </tr>
  </table>
</div>
 </div> 
  <?php
}
  }
// }
?>

<br>
<br>
</table>
</div>
<br/>
</div>
  