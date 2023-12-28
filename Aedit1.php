<?php





$host="localhost";
$user="root";
$password="";
$db="management_system";


session_start();

$connection=mysqli_connect($host,$user,$password,$db);

error_reporting(0);
session_start();
// session_destroy();

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
        <!-- <form method="POST" action="#"> -->

<?php
// to link the button with th page and the database
if (isset($_GET['Aedit'])){
    $Aedit1=$_GET['Aedit'];
 
//  this query name is from the database
  $select="select * from student where studentPassportNo='".$Aedit1."'"; 
  $result=mysqli_query($connection,$select); 
  $info=$result->fetch_assoc();
}
  if (isset($_POST['apply']))
{
    $ref= $_POST['RefNo'];
    $About1=$_POST['About11'];
    $Sname1=$_POST['Sname11'];
    $Gender1=$_POST['Gender11'];
    $Status1=$_POST['Status11'];
    $Nationality1=$_POST['Nationality11'];
    $passport1=$_POST['passport11'];
    $Dateb1=$_POST['Dateb11'];
    $IC1=$_POST['IC11'];
    $Caddress1=$_POST['Caddress11'];
    $Houseno1=$_POST['Houseno11'];
    $City1=$_POST['City11'];
    $Postcode1=$_POST['Postcode11']; 
    $State1=$_POST['State11']; 
    $Country1=$_POST['Country11']; 
    $Tel1=$_POST['Tel11']; 
    $Semail1=$_POST['Semail11']; 
    $Pemail1=$_POST['Pemail11']; 
    $Pname1=$_POST['Pname11'];  
    $Smonth1=$_POST['Smonth11'];
    $Emonth1=$_POST['Emonth11'];
    $Intro1=$_POST['Intro11'];
    $Sco1=$_POST['Sco11']; 
    $Status=$_POST['Status'];
    
    $sql="UPDATE student SET about='$About1', studentName='$Sname1', studentSex='$Gender1', studentStatus='$Status1', studentNationality='$Nationality1', studentDateOfBirth='$Dateb1', studentICNo='$IC1', studentAddress='$Caddress1', studentHouseNo='$Houseno1', studentCity='$City1', studentPostCode='$Postcode1', studentState='$State1', studentCountry='$Country1', studentMobile='$Tel1', studenEmail='$Semail1', studentPEmail='$Pemail1', studentProgram='$Pname1', studentStart='$Smonth1', studentEnd='$Emonth1', studentIntroducer='$Intro1', studentCouncelor='$Sco1', Status='$Status' WHERE studentPassportNo= '$Aedit1'";

    
    $result2=mysqli_query($connection,$sql);

    if($result2)
    {
        echo"your application sent seccessfuly";
        
        header("location:AdmissionM.php");

    }

    else
    {
        echo "apply failed";
    }


}
?>
    <!-- <div class="container"> -->
    <header>STUDENT APPLICATION FORM</header>
                <form method="POST">
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
                    <select required name="About11">
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
                            <label>Name as per Passport/ ID </label>
                            <input type="text" required name="Sname11" value="<?php echo $info['studentName']; ?>">
                        </div>

                        <div class="input-field">
                            <label>Gender</label>
                            
                                <select required name="Gender11">
                                    <option disabled selected>Select</option>
                                    <option <?php if ($info['studentSex'] == 'Male') echo 'selected'; ?>>Male</option>
                                    <option <?php if ($info['studentSex'] == 'Female') echo 'selected'; ?>>Female</option>
                                </select>
                            </div>
                        

                        <div class="input-field">
                            <label>Martial Status</label>
                            
                                <select required name="Status11" value="<?php echo "{$info['studentStatus']}"; ?>">
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
                                <input type="text" required name="Nationality11" value="<?php echo "{$info['studentNationality']}"; ?>"></input>
                            </div>

                        <div class="input-field">
                            <label>Date of Birth</label>
                            <!-- <div> -->
                                <input type="date" required name="Dateb11" value="<?php echo "{$info['studentDateOfBirth']}"; ?>">
                        </div>

                        <div class="input-field">
                            <label>Passport No.( international Student Only)</label>
                            <input type="text" name="passport11" value="<?php echo "{$info['studentPassportNo']}"; ?>">
                        </div>
                    <!-- </div> -->

                    <div class="input-field">
                        <label>IC No (for Malaysian Student Only)</label>
                        <!-- <div> -->
                            <input type="text" name="IC11" value="<?php echo "{$info['studentICNo']}"; ?>">
                        </div>
                    <!-- </div> -->
                <!-- </div> -->

                <div class="details ID">
                    <span class="title">ADDRESS</span>

                    <hr></hr>
                        <div class="fields">
                        <div class="input-field">
                            <label>Correspondence Address</label>
                            <input type="text" required name="Caddress11" value="<?php echo "{$info['studentAddress']}"; ?>">
                        </div>

                        <div class="input-field">
                            <label>House No</label>
                            <input type="text" name="Houseno11" value="<?php echo "{$info['studentHouseNo']}"; ?>">
                        </div>

                        <div class="input-field">
                            <label>City</label>
                            <input type="text" required name="City11" value="<?php echo "{$info['studentCity']}"; ?>">
                        </div>
                        <div class="input-field">
                            <label>postcode</label>
                            <input type="text" name="Postcode11" value="<?php echo "{$info['studentPostCode']}"; ?>">
                        </div>

                        <div class="input-field">
                            <label>State</label>
                            <input type="text" name="State11" value="<?php echo "{$info['studentState']}"; ?>">
                        </div>

                        <div class="input-field">
                            <label>Country</label>
                                <input type="text" required name="Country11" value="<?php echo "{$info['studentCountry']}"; ?>"></input>
                            </div>
                        </div>
                    </div>
                        <div class="input-field">
                            <label>Telephone No/ WhatsApp No</label>
                            <input type="tel" required name="Tel11" value="<?php echo "{$info['studentMobile']}"; ?>">
                        </div>

                        <div class="input-field">
                            <label>Student Email address</label>
                            <input type="email" name="Semail11" value="<?php echo "{$info['studenEmail']}"; ?>">
                        </div>

                        <div class="input-field">
                            <label>Parent's Email address</label>
                            <input type="email" name="Pemail11" value="<?php echo "{$info['studentPEmail']}"; ?>">
                        </div>
                    </div>
                </div>

                <div class="details ID">
                    <span class="title">PROGRAMME ENROLMENT</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Program name</label>
                            <select name="Pname11">
                                <option disabled></option>
                                <option <?php if ($info['studentProgram'] == 'GENERAL ENGLISH COURSE (GEC)') echo 'selected'; ?>> GENERAL ENGLISH COURSE (GEC)</option>
                                <option <?php if ($info['studentProgram'] == 'INTENSIVE ENGLISH COURSE (IEC)') echo 'selected'; ?>>INTENSIVE ENGLISH COURSE (IEC)</option>
                                <option <?php if ($info['studentProgram'] == 'IELTS PREPARATION COURSE (IELTS)') echo 'selected'; ?>>IELTS PREPARATION COURSE (IELTS)</option>
                                <option <?php if ($info['studentProgram'] == 'ENGLISH FOR KIDS (EFK)') echo 'selected'; ?>>ENGLISH FOR KIDS (EFK)</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Start month:</label>
                            <input type="date" name="Smonth11" value="<?php echo "{$info['studentStart']}"; ?>">
                        </div>

                        <div class="input-field">
                            <label>End month:</label>
                            <input type="date" name="Emonth11" value="<?php echo "{$info['studentEnd']}"; ?>">
                        </div>

                        <div class="input-field">
                            <label>Introducer</label>
                            <input type="text" name="Intro11" value="<?php echo "{$info['studentIntroducer']}"; ?>">
                        </div>

                        <div class="input-field">
                            <label>Student Counselor</label>
                            <input type="text" name="Sco11" value="<?php echo "{$info['studentCouncelor']}"; ?>">
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
                                <select required name="Status" value="<?php echo "{$info['Status']}"; ?>">
                                    <option disabled selected>Select</option>
                                    <option <?php if ($info['Status'] == 'Active') echo 'selected'; ?>>Active</option>
                                    <option <?php if ($info['Status'] == 'Completed') echo 'selected'; ?>>Completed</option>
                                </select>
                            </div>
                            </div>
                        <script src="Ascripts.js"></script>
                        <button class="sumbit" value="apply" name="apply">
                            <span class="btnText">Save</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div>
            </form>
            <button class="submit" onclick="location.href='AdmissionM.php'"> <i class="fas fa-arrow-left"></i> </button>
        </div>
    <!-- </div> -->
    
</body>

</html>

                