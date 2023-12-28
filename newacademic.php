<?php
// must be included in each and very file.
$host="localhost";//database 
$user="root"; // common username used
$password=""; // no password set
$db="management_system"; // you can choose any name but must be saved in htdocs to work
include('header3.php');//header file
include('footer.php'); 
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
  <link rel="stylesheet" href="newacademic.css"> 
  <link rel="stylesheet" href="footer.css"> 
  <script src="OfferLetter.js"></script>
  <title>Offer Letter</title>
</head>
<body>
<!-- Search Button -->
<div>
  <div class="search">
    <form id='search' Class="search-container" method="POST">
       <input  type='text' placeholder='Student ID or Name' class='searchinput-field' name='searchTerm' >

                            
     
       <button type='submit'Class="search-btn" name="submit" value="submit" >Search</button>
    </form>

</div>
                    <!-- end search button -->
    </form>

    </div>
  
  </div>
  <!-- <div class="offer-select-container">
                    <button><a href="admitform.php" class="button-9" role="button" type='submit'>Admit student to class</a></button>  
                    </div> -->
  <!-- display all records in the database -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchTerm'])) {
  $searchTerm = mysqli_real_escape_string($connection, $_POST['searchTerm']);

  // Use the LIKE operator for partial string matching
  $select = "SELECT * FROM acadimic WHERE studentPassportNo LIKE '%$searchTerm%' OR studentName LIKE '%$searchTerm%' ORDER BY ID DESC";
} else {
  $select = "SELECT * FROM acadimic ORDER BY ID DESC";
}

$result = mysqli_query($connection, $select);

  ?>

<div class="filter">
  <table class="filter">
    <thead>
      <tr>
        <th>Name</th>
        <th>Level</th>
        <th>Grammer 40</th>
        <th>Reading 20</th>
        <th>Writing 20</th>
        <th>Vocabulary 20</th>
        <th>Listening 20</th>
        <th>Speaking 20</th>
        <th>Teacher's Assesment 10</th>
        <th>Total score 150</th>
        <th>Total% 100%</th>
        <th>Attendance 100%</th>
        <th>Teacher's Name</th>
        <th>Teacher's Recommendation</th>
        <th>Delete</th>
        <th>Edit</th>
        <th>View</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($info = $result->fetch_array(MYSQLI_ASSOC)) {
        $TotalS = $info['Grammar'] + $info['Reading'] + $info['Writing'] + $info['Vocab'] + $info['Listening'] + $info['Speaking'] + $info['Tassessment'];
        $TotalP = ($TotalS / 150) * 100;
        $int_cast = floor($TotalP);
      ?>
        <tr>
          <td><?php echo "{$info['studentName']}" ?></td>
          <td><?php echo "{$info['Level']}" ?></td>
          <td><?php echo "{$info['Grammar']}" ?></td>
          <td><?php echo "{$info['Reading']}" ?></td>
          <td><?php echo "{$info['Writing']}" ?></td>
          <td><?php echo "{$info['Vocab']}" ?></td>
          <td><?php echo "{$info['Listening']}" ?></td>
          <td><?php echo "{$info['Speaking']}" ?></td>
          <td><?php echo "{$info['Tassessment']}" ?></td>
          <td><?php echo $TotalS ?></td>
          <td><?php echo $int_cast ?>%</td>
          <td><?php echo "{$info['Attendance']}" ?>%</td>
          <td><?php echo "{$info['TeacherName']}" ?></td>
          <td><?php echo "{$info['TRecom']}" ?></td>
          <td><a class='button-8' onclick="return confirm('Are You Sure to Delete This');" href='academicdelete.php?student_id=<?php echo $info['ID']; ?>'>Delete</a></td>
          <td><a class='button-7' onclick="return confirm('Are You Sure to update This');" href='academicedit1.php?AcademidEdite=<?php echo $info['ID']; ?>'>Edit</a></td>
          <td><a class='button-1' href='academicview.php?AcademidEdite1=<?php echo $info['ID']; ?>'>View</a></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>
</div>