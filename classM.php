<?php

error_reporting(0);
session_start();

if($_SESSION['message'])
{
    $message=$_SESSION['message'];

    echo "<script type='text/javascript'>
    alert('$message'); 
    </script>";
}

if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] !== 1 && !isset($_GET['logout']))) {
    header("Location: stafflogin.php");
    exit();
  }
  
?>
<?php
// must be included in each and very file.
$host="localhost";//database 
$user="root"; // common username used
$password=""; // no password set
$db="management_system"; // you can choose any name but must be saved in htdocs to work
$conn = mysqli_connect($host, $user, $password, $db);
?>

<?php
$classID = uniqid();
?>

<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Class Managment</title> 
</head>
<body>
<div class="overlay">
    <div class="container">
        <header>New Class</header>

        <form action="classdatacheck.php" method="POST">
            <div class="form first">
                <div class="details personal">
                    <div class="fields">
                    <div class="input-field">
  <label>Class ID</label>
  <input type="hidden" name="classID" value="<?php echo rand(1000, 9999); ?>">
  
</div>


                    <div class="input-field">
                            <label>Level</label>
                            <select required name= Level>
                                <option disabled selected>Select</option>
                                <option>Starter 1</option>
                                <option>Starter 2</option>
                                <option>Starter 3</option>
                                <option>Elementary 1</option>
                                <option>Elementary 2</option>
                                <option>Elementary 3</option>
                                <option>Preintermediate 1</option>
                                <option>Preintermediate 2</option>
                                <option>Preintermediate 3</option>
                                <option>Intermediate 1</option>
                                <option>Intermediate 2</option>
                                <option>Intermediate 3</option>
                                <option>Advance 1</option>
                                <option>Advance 2</option>
                                <option>Advance 3</option>
                            </select>
                        </div>
                        <div class="input-field">
                        <label>Class Venue</label>
                            <input type="Text"required name= "ClassVenue">
                        </div>
                        <div class="input-field">
                           <div><label>PROGRAMME</label></div>
                            <Select required name= "prog">
                            <option disabled selected>Select</option>
                            <option>GENERAL ENGLISH COURSE (GES)</option>
                            <option>INTENSIVE ENGLISH COURSE (IES)</option>
                            <option>IELTS PREPARATION COURSE (IELTS)</option>
                            <option>ENGLISH FOR KIDS (EFK)</option>
                        </select>   
                        </div>
                        <?php
$conn = mysqli_connect($host, $user, $password, $db);

// Check if the connection is successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// Fetch the names of all academic staff from the Authentication table
$sql = "SELECT idAuthintication, staffName FROM authintication WHERE user_type ='Acadamic'";
$result = mysqli_query($conn, $sql);

// Create a dropdown list of teacher names
echo '<div class="input-field">';
echo '<label>Teacher Name</label>';
echo '<select name="TeacherName" required>';
echo '<option disabled selected>Select a teacher</option>';
while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='" . $row['staffName'] . "'>" . $row['staffName'] . "</option>";
}
echo '</select>';
echo '</div>';

// Close the database connection
mysqli_close($conn);
?>

                        <!-- </div> -->

                        <div class="input-field">
                            <label>Date</label>
                            <input type="Date"required name= "Date" >
                        </div>
                        
                        <div class="input-field">
                        <label>Start Time</label>
                            <input type="Time"required name= Time>
                        </div>
                    <!-- </div> -->
                    <div class="input-field">
                        <label>End Time</label>
                            <input type="Time"required name= Time1>
                        </div>
                        <!-- </div> -->
                        
                        <!-- <button class="sumbit" value="submit1" name="submit1">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button> -->
                    </div>
                </div>
                <button class="sumbit" value="submit1" name="submit1">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button> 
            </div>
        </form>
    </div>
    <button class="submit" onclick="location.href='class.php'"> <i class="fas fa-arrow-left"></i> </button>
</div>
    <script src="script.js"></script>
</body>
</html>