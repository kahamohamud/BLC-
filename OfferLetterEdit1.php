<?php


$host="localhost";
$user="root";
$password="";
$db="management_system";

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

    <!--<title>Responsive Regisration Form </title>--> 
</head>
<body>
<div class="overlay">
<div class="container">
        <header>Offer Letter Update</header>
        <form method="POST" action="#">
            
                
<?php

if ($_GET['offerletterupdate']){
    $offerletteredit=$_GET['offerletterupdate'];
 
 
  $select="select * from offerletter where ID='".$offerletteredit."'";
  $result=mysqli_query($connection,$select); 
  $info=$result->fetch_assoc();
}

  if (isset($_POST['Update']))

{
    $Ref=$_POST['ref'];
    $data_Date=$_POST['date'];
    $Data_Name=$_POST['Name'];
    $Passport=$_POST['passport'];
    $Nationality=$_POST['Nationalty'];
    $prog=$_POST['prog'];
    $CourseD=$_POST['CourseD'];
    $intake=$_POST['intake'];
    $RVPfee=$_POST['RVPfee'];
    $ACPfee=$_POST['ACPfee'];
    $Toutionfee=$_POST['Toutionfee'];
    $other_fees=$_POST['other_fees'];
   


    $sql="UPDATE offerletter SET Ref='$Ref', Date='$data_Date', Name='$Data_Name', passport=' $Passport', Nationalty='$Nationality', prog='$prog', CourseD='$CourseD', intake='$intake', RVPfee=' $RVPfee', ACPfee='$ACPfee', Toutionfee='$Toutionfee',other_fees='$other_fees' WHERE ID='$offerletteredit'";


    $result2=mysqli_query($connection,$sql);

    if($result2)
    {
        echo"your application sent seccessfuly";
        
        header("location:offerletterM.php");

    }

    else
    {
        echo "apply failed";
    }


}

?>
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
                         
                        <div class="input-field">
                            <label>Date</label>
                        <div>
                         <input type="text"required name="date" value="<?php echo"{$info['Date']}";?>"></input>
                        </div>
            
                        <div class="input-field">
                            <label>Name</label>
                        <div>
                        <input type="text"required name="Name" value="<?php echo"{$info['Name']}";?>"></input>
                    </div>
                    <div class="input-field">
                            <label>Passport</label>
                        <div>
                        <input type="text"required name="passport" value="<?php echo"{$info['passport']}";?>"></input>
                    </div>
                    <div class="input-field">
                            <label>Nationality</label>
                        <div>
                        <input type="text"required name="Nationalty" value="<?php echo"{$info['Nationalty']}";?>"></input>
                    </div>
                    <div class="input-field">

                        <div><label>Program</label></div>
                    <select required name="prog">
                        <option disabled selected>Select</option>
                        <option <?php if ($info['prog'] == "GENERAL ENGLISH COURSE (GES)") echo "selected"; ?>>GENERAL ENGLISH COURSE (GES)</option>
                        <option <?php if ($info['prog'] == "INTENSIVE ENGLISH COURSE (IES)") echo "selected"; ?>>INTENSIVE ENGLISH COURSE (IES)</option>
                        <option <?php if ($info['prog'] == "IELTS PREPARATION COURSE (IELTS)") echo "selected"; ?>>IELTS PREPARATION COURSE (IELTS)</option>
                        <option <?php if ($info['prog'] == "ENGLISH FOR KIDS (EFK)") echo "selected"; ?>>ENGLISH FOR KIDS (EFK)</option>
</select>
                    </div>
                    </div>
                    <div class="input-field">
                            <label>Course Duration</label>
                        <div>
                        <input type="text"required name="CourseD" value="<?php echo"{$info['CourseD']}";?>"></input>
                    </div>
                    <div class="input-field">
                            <label>intake</label>
                        <div>
                        <input type="text"required name="intake" value="<?php echo"{$info['intake']}";?>"></input>
                    </div>
                    <div class="input-field">
                            <label>Registration Fee</label>
                        <div>
                        <input type="number"required name="RVPfee" value="<?php echo"{$info['RVPfee']}";?>"></input>
                    </div>
                    <div class="input-field">
                            <label>Airport and Clearance Fee</label>
                        <div>
                        <input type="number"required name="ACPfee" value="<?php echo"{$info['ACPfee']}";?>"></input>
                    </div>
                    <div class="input-field">
                            <label>Tution Fee</label>
                        <div>
                        <input type="number"required name="Toutionfee" value="<?php echo"{$info['Toutionfee']}";?>"></input>
                    </div>
                    <div class="input-field">
                            <label>Other Fees</label>
                            <input type="number"name= "other_fees" onkeypress="return onlyNumberKey(event)" 
                   maxlength="11" size="50%" value="<?php echo"{$info['other_fees']}";?>"></input>
                        </div>
                    </div>
                
                    <button class="search-btn"  name="Update" value= "Update">Save</button>
                    </div>
                </div> 
            </div>
        </form>
    </div>
</div>
  <?php
 

  


  
  ?>
    <script src="OfferLetter.js"></script>
</body>
</html>