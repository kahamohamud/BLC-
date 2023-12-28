<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "management_system";

session_start();

$connection = mysqli_connect($host, $user, $password, $db);

error_reporting(0);

// session_destroy();
if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] !== 1 && !isset($_GET['logout']))) {
    header("Location: stafflogin.php");
    exit();
  }
?>

<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="academicView.css">

    <!-- Iconscout CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <title>Academic View</title>
</head>

<body>
    <div class="overlay">
        <div class="container">
            <header>Academic View</header>
            <form action="ReportResults.php" method="POST">
                <?php
                if ($_GET['AcademidEdite1']) {
                    $AcademicID = $_GET['AcademidEdite1'];

                    $select = "SELECT * FROM acadimic WHERE ID = '".$AcademicID."'";
                    $result = mysqli_query($connection, $select);
                    $info = $result->fetch_assoc();
                }
                ?>
                <br>
                <h3>Student Information:</h3>
                <div class="form first">
                    <div class="details personal">
                        <div class="fields">
                            <div class="input-field">
                                <label>Student ID</label>
                                <div>
                                    <input type="text" required name="ID11" value="<?php echo $info['studentID']; ?>" readonly>
                                </div>
                            </div>
                            <div class="input-field">
                            <div> <label>Student Name</label>
                                
                                    <input type="text" required name="StudentName11" value="<?php echo $info['studentName']; ?>" readonly>
                                </div>
                            </div>
                            <div class="input-field">
                                <label>Passport</label>
                                <div>
                                    <input type="text" required name="Passport11" value="<?php echo $info['studentPassportNo']; ?>" readonly>
                                </div>
                            </div>
                            <div class="input-field">
                                <label>Country</label>
                                <div>
                                    <input type="text" required name="Country11" value="<?php echo $info['studentCountry']; ?>" readonly>
                                </div>
                            </div>
                            <div class="input-field">
                                <label>Exam Date</label>
                                <div>
                                    <input placeholder="e.g. 15 April 2022" type="text" required name="Date11" value="<?php echo $info['sdate']; ?>" readonly>
                                </div>
                            </div>
                            <div class="input-field">
                                <label>Level</label>
                                <div>
                                    <input type="text" required name="level11" value="<?php echo $info['Level']; ?>" readonly>
                                </div>
                            </div>
                            <div class="input-field">
                                <label>Units</label>
                                <div>
                                    <input type="text" required name="Units11" value="<?php echo $info['Units']; ?>" readonly>
                                </div>
                            </div>
                            <br>
                            <h3>Student Results:</h3>
                            <!-- <div class="input-field">
                                <label>Vocabulary</label>
                                <div>
                                    <input type="number" required name="Vocab11" value="<?php echo $info['Vocab']; ?>" readonly>
                                </div>
                            </div> -->
                            <div class="input-field">
                                <label>Grammer</label>
                                <div>
                                    <input type="number" required name="Grammer11" value="<?php echo $info['Grammar']; ?>" readonly>
                                </div>
                            </div>
                            <div class="input-field">
                                <label>Reading</label>
                                <div>
                                    <input type="number" required name="Readind11" value="<?php echo $info['Reading']; ?>" readonly>
                                </div>
                            </div>
                            <div class="input-field">
                                <label>Writing</label>
                                <div>
                                    <input type="number" required name="Writing11" value="<?php echo $info['Writing']; ?>" readonly>
                                </div>
                            </div>
                            <div class="input-field">
                                <label>Vocabulary</label>
                                <div>
                                    <input type="number" required name="VocabSpeaking11" value="<?php echo $info['Vocab']; ?>" readonly>
                                </div>
                            </div>
                            <div class="input-field">
                                <label>Listening</label>
                                <div>
                                    <input type="number" required name="Listening11" value="<?php echo $info['Listening']; ?>" readonly>
                                </div>
                            </div>
                            <div class="input-field">
                                <label>Speaking</label>
                                <div>
                                    <input type="number" required name="Speaking11" value="<?php echo $info['Speaking']; ?>" readonly>
                                </div>
                            </div>
                            <div class="input-field">
                                <label>Teacher's Assessment</label>
                                <div>
                                    <input type="number" required name="Tassessment11" value="<?php echo $info['Tassessment']; ?>" readonly>
                                </div>
                            </div>
                            <div class="input-field">
                                <label>Attendance%</label>
                                <div>
                                    <input type="text" required name="Attendane11" value="<?php echo $info['Attendance']; ?>" readonly>
                                </div>
                            </div>
                            <div class="input-field">
                                <label>Teacher's Name</label>
                                <div>
                                    <input type="text" required name="TeacherName11" value="<?php echo $info['Teacher']; ?>" readonly>
                                </div>
                            </div>
                            <div class="input-field">
                                <label>Notes</label>
                                <div>
                                    <input type="text" required name="Notes11" value="<?php echo $info['Notes']; ?>" style="height: 100px;" readonly>
                                </div>
                            </div>
                            <div class="input-field">
                                <label>Teacher's Recommendation</label>
                                <select required name="TRecom11" readonly>
                                    <option disabled>Select</option>
                                    <option <?php if ($info['TRecom'] == 'Progress') echo 'selected'; ?>>Progress</option>
                                    <option <?php if ($info['TRecom'] == 'Repeat') echo 'selected'; ?>>Repeat</option>
                                </select>
                            </div>
                        </div>
                        <button class="save" name="View" value="View" type="submit">View</button>
                    </div>
                </div>
            </form>
        </div>
        <button class="submit" onclick="location.href='newacademic.php'"> <i class="fas fa-arrow-left"></i> </button>

        
    </div>
</body>

</html>
