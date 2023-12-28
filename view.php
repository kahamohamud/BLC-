<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "management_system";

$connection = mysqli_connect($host, $user, $password, $db);
session_start(); 
if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] !== 1 && !isset($_GET['logout']))) {
    header("Location: stafflogin.php");
    exit();
  }
error_reporting(0);

if ($_GET['offerletterview']) {
    $offerletterview = $_GET['offerletterview'];

    $select = "select * from offerletter where ID='" . $offerletterview . "'";
    $result = mysqli_query($connection, $select);
    $info = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="OfferLetterEdit.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>View PDF Form</title>
</head>

<body>
    <div class="overlay">
        <div class="container">
            <header>View PDF For:</header>

            <form action="makepdf1.php" method="POST">
                <div class="container2">
                    <div class="form first">
                        <div class="details personal">

                            <div class="fields">
                                <div class="input-field">

                                    <div>
                                        <label>Ref NO</label>
                                        <input type="hidden" name="ref" value="<?php echo $info['Ref']; ?>">
                                    </div>

                                    <div class="input-field">
                                        <label>Date</label>
                                        <div>
                                            <input type="text" required name="date"
                                                value="<?php echo "{$info['Date']}"; ?>"></input>
                                        </div>
            
                                        <div class="input-field">
    <label>Name</label>
    <div>
        <input type="text" required name="Name" value="<?php echo "{$info['Name']}"; ?>" readonly>
    </div>
</div>

<div class="input-field">
    <label>Passport</label>
    <div>
        <input type="text" required name="passport" value="<?php echo "{$info['passport']}"; ?>" readonly>
    </div>
</div>
<div class="input-field">
    <label>Nationality</label>
    <div>
        <input type="text" required name="Nationalty" value="<?php echo "{$info['Nationalty']}"; ?>" readonly>
    </div>
</div>
<div class="input-field">
    <label>Program</label>
    <div>
    <input type="text" required name="prog" value="<?php echo "{$info['prog']}"; ?>" readonly> 
    </div>
</div>
<div class="input-field">
    <label>Course Duration</label>
    <div>
        <input type="text" required name="CourseD" value="<?php echo "{$info['CourseD']}"; ?>" readonly>
    </div>
</div>
<div class="input-field">
    <label>intake</label>
    <div>
        <input type="text" name="intake" value="<?php echo date('F Y', strtotime($info['intake'])); ?>" required readonly>
    </div>
</div>
<div class="input-field">
    <label>Registration Fee</label>
    <div>
        <input type="number" required name="RVPfee" value="<?php echo "{$info['RVPfee']}"; ?>" readonly>
    </div>
</div>
<div class="input-field">
    <label>Airport and Clearance Fee</label>
    <div>
        <input type="number" required name="ACPfee" value="<?php echo "{$info['ACPfee']}"; ?>" readonly>
    </div>
</div>
<div class="input-field">
    <label>Tution Fee</label>
    <div>
        <input type="number" required name="Toutionfee" value="<?php echo "{$info['Toutionfee']}"; ?>" readonly>
    </div>
</div>
<div class="input-field">
    <label>Other Fees</label>
    <input type="number" name="other_fees" onkeypress="return onlyNumberKey(event)" 
           maxlength="11" size="50%" value="<?php echo "{$info['other_fees']}"; ?>" readonly>
</div>

                
                    <button class="save"  name="View1" value= "View1" type="submit">View</button>
                    
                    </form>
            </div>
        </div>
    
</div>

</form>
  <?php
 

  


  
  ?>

</body>
</html>