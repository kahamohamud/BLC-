<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "management_system";

session_start();

$connection = mysqli_connect($host, $user, $password, $db);

error_reporting(0);
session_start();
// session_destroy();

if ($_SESSION['message']) {
    $message = $_SESSION['message'];

    echo "<script type='text/javascript'>
    alert('$message'); 
    </script>";
}

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

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="Aedit.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!--<title>Responsive Regisration Form </title>--> 
</head>

<body>
    <div class="overlay">
        <div class="container">

                <header>STUDENT APPLICATION FORM</header>
                <form method="POST" action="AdmissionView.php">
                <?php
                // to link the button with the page and the database
                if ($_GET['admitview']) {
                    $admitview = $_GET['admitview'];

                    $select = "select * from student where studentID='" . $admitview . "'";
                    $result = mysqli_query($connection, $select);
                    $info = $result->fetch_assoc();
                }
                ?>
                <!-- <div class="container"> -->
                <!-- <form action="Adata_check.php" method="POST"> -->
                <div class="details ID">
        <span class="title">STUDENT INFORMATION</span>
        <hr>

                <div class="input-field">
                    <label>REF NO (auto-generated)</label>
                    <input type="hidden" name="RefNo" value="<?php echo $info['RefNo']; ?>">
                </div>

                <div class="input-field">
        <label>Please indicate on how you got to know about Britannia</label>
        <br>
        <select required name="About11" readonly>
            <option disabled>Select</option>
            <option <?php if ($info['about'] == 'Agent') echo 'selected'; ?>>Agent</option>
            <option <?php if ($info['about'] == 'Internet/ social media') echo 'selected'; ?>>Internet/ social media</option>
            <option <?php if ($info['about'] == 'Event/ fair') echo 'selected'; ?>>Event/ fair</option>
            <option <?php if ($info['about'] == 'Newspaper') echo 'selected'; ?>>Newspaper</option>
            <option <?php if ($info['about'] == 'Friend') echo 'selected'; ?>>Friend</option>
            <option <?php if ($info['about'] == 'School/ Counselor') echo 'selected'; ?>>School/ Counselor</option>
        </select>
    </div>

                <div class="details personal">
        <div class="fields">
            <div class="input-field">
                <label>Name as per Passport/ ID</label>
                <input type="text" required name="Sname11" value="<?php echo $info['studentName']; ?>" readonly>
            </div>

            <div class="input-field">
                <label>Gender</label>
                <select required name="Gender11" readonly>
                    <option disabled selected>Select</option>
                    <option <?php if ($info['studentSex'] == 'Male') echo 'selected'; ?>>Male</option>
                    <option <?php if ($info['studentSex'] == 'Female') echo 'selected'; ?>>Female</option>
                </select>
            </div>
                        

            <div class="input-field">
                <label>Martial Status</label>
                <select required name="Status11" readonly>
                    <option disabled selected>Select</option>
                    <option <?php if ($info['studentStatus'] == 'Single') echo 'selected'; ?>>Single</option>
                    <option <?php if ($info['studentStatus'] == 'Married') echo 'selected'; ?>>Married</option>
                </select>
            </div>
        </div>
    </div>

    <div class="fields">
        <div class="input-field">
            <label>Nationality</label>
            <input type="text" required name="Nationality11" value="<?php echo "{$info['studentNationality']}"; ?>" readonly>
        </div>

        <div class="input-field">
            <label>Date of Birth</label>
            <input type="date" required name="Dateb11" value="<?php echo "{$info['studentDateOfBirth']}"; ?>" readonly>
        </div>

        <div class="input-field">
            <label>Passport No. (International Student Only)</label>
            <input type="text" name="passport11" value="<?php echo "{$info['studentPassportNo']}"; ?>" readonly>
        </div>

        <div class="input-field">
            <label>IC No (for Malaysian Student Only)</label>
            <input type="text" name="IC11" value="<?php echo "{$info['studentICNo']}"; ?>" readonly>
        </div>
                    <!-- </div> -->
                <!-- </div> -->

                <div class="details ID">
        <span class="title">ADDRESS</span>
        <hr>
        <div class="fields">
            <div class="input-field">
                <label>Correspondence Address</label>
                <input type="text" required name="Caddress11" value="<?php echo "{$info['studentAddress']}"; ?>" readonly>
            </div>

            <div class="input-field">
                <label>House No</label>
                <input type="text" name="Houseno11" value="<?php echo "{$info['studentHouseNo']}"; ?>" readonly>
            </div>

            <div class="input-field">
                <label>City</label>
                <input type="text" required name="City11" value="<?php echo "{$info['studentCity']}"; ?>" readonly>
            </div>

            <div class="input-field">
                <label>postcode</label>
                <input type="text" name="Postcode11" value="<?php echo "{$info['studentPostCode']}"; ?>" readonly>
            </div>

            <div class="input-field">
                <label>State</label>
                <input type="text" name="State11" value="<?php echo "{$info['studentState']}"; ?>" readonly>
            </div>

            <div class="input-field">
                <label>Country</label>
                <input type="text" required name="Country11" value="<?php echo "{$info['studentCountry']}"; ?>" readonly>
            </div>
                        </div>
                    </div>
                    <div class="input-field">
        <label>Telephone No/ WhatsApp No</label>
        <input type="tel" required name="Tel11" value="<?php echo "{$info['studentMobile']}"; ?>" readonly>
    </div>

    <div class="input-field">
        <label>Student Email address</label>
        <input type="email" name="Semail11" value="<?php echo "{$info['studenEmail']}"; ?>" readonly>
    </div>

    <div class="input-field">
        <label>Parent's Email address</label>
        <input type="email" name="Pemail11" value="<?php echo "{$info['studentPEmail']}"; ?>" readonly>
    </div>
                    </div>
                </div>

                <div class="details ID">
        <span class="title">PROGRAMME ENROLMENT</span>
        <div class="fields">
            <div class="input-field">
                <label>Program name</label>
                <select name="Pname11" readonly>
                    <option disabled></option>
                    <option <?php if ($info['studentProgram'] == 'GENERAL ENGLISH COURSE (GEC)') echo 'selected'; ?>>GENERAL ENGLISH COURSE (GEC)</option>
                    <option <?php if ($info['studentProgram'] == 'INTENSIVE ENGLISH COURSE (IEC)') echo 'selected'; ?>>INTENSIVE ENGLISH COURSE (IEC)</option>
                    <option <?php if ($info['studentProgram'] == 'IELTS PREPARATION COURSE (IELTS)') echo 'selected'; ?>>IELTS PREPARATION COURSE (IELTS)</option>
                    <option <?php if ($info['studentProgram'] == 'ENGLISH FOR KIDS (EFK)') echo 'selected'; ?>>ENGLISH FOR KIDS (EFK)</option>
                </select>
            </div>

            <div class="input-field">
                <label>Start month:</label>
                <input type="date" name="Smonth11" value="<?php echo "{$info['studentStart']}"; ?>" readonly>
            </div>

            <div class="input-field">
                <label>End month:</label>
                <input type="date" name="Emonth11" value="<?php echo "{$info['studentEnd']}"; ?>" readonly>
            </div>

            <div class="input-field">
                <label>Introducer</label>
                <input type="text" name="Intro11" value="<?php echo "{$info['studentIntroducer']}"; ?>" readonly>
            </div>

            <div class="input-field">
                <label>Student Counselor</label>
                <input type="text" name="Sco11" value="<?php echo "{$info['studentCouncelor']}"; ?>" readonly>
            </div>
                        <!-- Photo Upload View -->
                        <div class="input-field">
                            <label>Student Picture</label>
                             <?php
                                 if (!empty($info['studentPic'])) {
                                 $photoPath = 'uploads/' . $info['studentPic'];
                                ?>
                                 <p><?php echo $info['studentPic']; ?></p>
                                 <?php
                                } else {
                                echo "No photo available";
                                }
                             ?>
                        </div>
                        <!-- Photo Upload end code-->
                        <div class="input-field">
                <label>Course Status</label>
                <select required name="Status" readonly>
                    <option disabled selected>Select</option>
                    <option <?php if ($info['Status'] == 'Active') echo 'selected'; ?>>Active</option>
                    <option <?php if ($info['Status'] == 'Completed') echo 'selected'; ?>>Completed</option>
                </select>
                            </div>
                            </div>
                        <script src="Ascripts.js"></script>
                        <button class="sumbit" value="apply" name="apply">
                            <span class="btnText">View</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div>
            </form>
            <button class="submit" onclick="location.href='Admission.php'"> <i class="fas fa-arrow-left"></i> </button>
        </div>
    <!-- </div> -->
    
</body>

</html>
