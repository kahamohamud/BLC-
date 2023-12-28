<?php





$host="localhost";
$user="root";
$password="";
$db="management_system";


session_start();

$connection=mysqli_connect($host,$user,$password,$db);

error_reporting(0);
// session_start();
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
    <link rel="stylesheet" href="academicEdit.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!--<title>Responsive Regisration Form </title>--> 
</head>
<body>
<div class="overlay">
<div class="container">
        <header>Academic Update</header>
        <form action="#" method="POST">
            
                
<?php
// to link the button with th page and the database
if ($_GET['AcademidEdite']){
    $AcademicID=$_GET['AcademidEdite'];
 
//  this query name is from the database
  $select="select * from acadimic where ID='".$AcademicID."'"; 
  $result=mysqli_query($connection,$select); 
  $info=$result->fetch_assoc();
}
  if (isset($_POST['Update']))

{
    $StudentName1=$_POST['StudentName11'];
    $ID=$_POST['ID11'];
    $passport=$_POST['Passport11'];
    $country=$_POST['Country11'];
    $Date=$_POST['Date11'];
    $level=$_POST['level11'];
    $Units=$_POST['Units11'];
    $Grammer1=$_POST['Grammer11'];
    $Reading1=$_POST['Readind11'];
    $Writing1=$_POST['Writing11'];
    $VocabSpeaking1=$_POST['VocabSpeaking11'];
    $Speaking1=$_POST['Speaking11'];
    $Listening1=$_POST['Listening11'];
    $Tassessment1=$_POST['Tassessment11'];
    $TotalS1=$_POST['TotalS11'];
    $TotalP1=$_POST['TotalP11'];
    $Attendance1=$_POST['Attendane11'];
    $TeacherName1=$_POST['TeacherName11'];
    $TRecom1=$_POST['TRecom11'];
    $Notes=$_POST['Notes11'];

    $TotalS = $Grammer1 + $Reading1 + $Writing1 + $VocabSpeaking1 + $Listening1 + $Speaking1 + $Tassessment1;
    $TotalP = ($TotalS / 150) * 100; // Assuming the total possible score for all subjects is 600
    $sql = "UPDATE acadimic SET sdate='$Date', studentName='$StudentName1', Grammar='$Grammer1', Reading='$Reading1', Writing='$Writing1', Vocab='$VocabSpeaking1', Listening='$Listening1', Speaking='$Speaking1', Tassessment='$Tassessment1', TotalS='$TotalS', TotalP='$TotalP', Attendance='$Attendance1', TeacherName='$TeacherName1', TRecom='$TRecom1', Units='$Units', Notes='$Notes' WHERE ID='$AcademicID'";


    
    $result2=mysqli_query($connection,$sql);

    if($result2)
    {
        echo"your application Updated seccessfuly";
        
        header("location:Aacademic.php");

    }

    else
    {
        echo "apply failed";
    }


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
                            <input type="text"required name="ID11" value="<?php echo"{$info['studentID']}";?>"></div>
                        </div>
                    <div class="input-field">
                        <div><label>Student Name</label> 
                        <input type="text"required name="StudentName11" value="<?php echo"{$info['studentName']}";?>">
                    </div>
                </div>
                        <div class="input-field">
                            <label>Passport</label>
                        <div>
                            <input type="text"required name="Passport11" value="<?php echo"{$info['studentPassportNo']}";?>"></div>
                        </div>
                        <div class="input-field">
                            <label>Country</label>
                        <div>
                            <input type="text"required name="Country11" value="<?php echo"{$info['studentCountry']}";?>"></div>
                        </div>
                        <div class="input-field">
                            <label>Exam Date</label>
                        <div>
                            <input placeholder ="e.g. 15 April 2022" type="text"required name="Date11" value="<?php echo"{$info['sdate']}";?>"></div>
                        </div>
                        <div class="input-field">
                            <label>Level</label>
                        <div>
                            <input type="text"required name="level11" value="<?php echo"{$info['Level']}";?>"></div>
                        </div>
                        <div class="input-field">
                            <label>Units</label>
                        <div>
                            <input type="text"required name="Units11" value="<?php echo"{$info['Units']}";?>" ></div>
                        </div>
                        
                        <br>
                        <h3>Student Results:</h3>
                        <div class="input-field">
                            <label>Grammer</label>
                        <div>
                            <input type="number"required name="Grammer11" value="<?php echo"{$info['Grammar']}";?>"></div>
                       </div>
                       
                        <div class="input-field">
                            <label>Reading</label>
                        <div>
                            <input type="number"required name="Readind11" value="<?php echo"{$info['Reading']}";?>" ></div>
                        </div>
                        <div class="input-field">
                            <label>Writing</label>
                        <div>
                            <input type="number"required name="Writing11" value="<?php echo"{$info['Writing']}";?>" ></div>
                        </div>
                        <div class="input-field">
                            <label>Vocabulary</label>
                        <div>
                            <input type="number"required name="VocabSpeaking11" value="<?php echo"{$info['Vocab']}";?>" ></div>
                        </div>
                        <!-- </div> -->
                        <div class="input-field">
                            <label>Listening</label>
                        <div>
                            <input type="number"required name="Listening11" value="<?php echo"{$info['Listening']}";?>" ></div>
                        </div>
                        <div class="input-field">
                            <label>Speaking</label>
                        <div>
                            <input type="number"required name="Speaking11" value="<?php echo"{$info['Speaking']}";?>" ></div>
                        </div>
                        <div class="input-field">
                            <label>Teacher's Assessment</label>
                        <div>
                            <input type="number"required name="Tassessment11" value="<?php echo"{$info['Tassessment']}";?>" ></div>
                        </div>
                      
                        <div class="input-field">
                            <label>Attendance%</label>
                        <div>
                            <input type="text"required name="Attendane11" value="<?php echo"{$info['Attendance']}";?>" ></div>
                        </div>
                        <div class="input-field">
                            <label>Teacher's Name</label>
                        <div>
                            <input type="text"required name="TeacherName11" value="<?php echo"{$info['Teacher']}";?>" ></div>
                        </div>
                        
                        <div class="input-field">
                            <label>Notes</label>
                                <div>
                        <input type="text" required name="Notes11" value="<?php echo "{$info['Notes']}";?>" style="height: 100px;"></div>
                        </div>
                        <!-- </div> -->
                        <div class="input-field">
                            <label>Teacher's Recommendation</label>
                            <select required name="TRecom11" value="<?php echo"{$info['TRecom']}";?>" >
                        <option disabled selected>Select</option>
                        <option <?php if ($info['TRecom'] == 'Progress') echo 'selected'; ?>>Progress</option>
                        <option <?php if ($info['TRecom'] == 'Repeat') echo 'selected'; ?>>Repeat</option>
                        </select>
                    </div>
                    </div>
                    <button class="save"  name="Update" value= "Update" type="submit">Save</button>
                    <!-- </div>
                </div> -->
                    </form>
            </div>
        </div>
    
</div>

</form>
  <?php
 

  


  
  ?>
        <button class="submit" onclick="location.href='Aacademic.php'"> <i class="fas fa-arrow-left"></i> </button>

</body>
</html>