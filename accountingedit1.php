<?php

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

$host="localhost";
$user="root";
$password="";
$db="management_system";

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
    <link rel="stylesheet" href="AdmissionNew.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    <title>Offer Letter form</title> 
</head>
<body>
<div class="overlay">
    <div class="container">
        <header>Finance Statement</header>

        <form action="#" method="POST">
<?php

$connection=mysqli_connect($host,$user,$password,$db);
// to link the button with th page and the database
if (isset($_GET['accountingedit'])){
    $AcEdit=$_GET['accountingedit'];
 
//  this query name is from the database
  $select="select * from accounting where Ref='".$AcEdit."'"; 
  $result=mysqli_query($connection,$select); 
  $info=$result->fetch_assoc();
}
  if (isset($_POST['Acapply']))
{
    
    $studentName=$_POST['studentName'];
    $studentID=$_POST['studentID'];
    $studentNationality=$_POST['studentNationality'];
    $studentPassportNo=$_POST['studentPassportNo'];
    $Date=$_POST['Date'];
    $Ref=$_POST['Ref'];
    $Level=$_POST['Level'];
    $Months=$_POST['Months'];
    // $intake=$_POST['intake'];
    $StudentType=$_POST['StudentType'];
    $PaymentM=$_POST['PaymentM'];
    $RegistrationFee=$_POST['RegistrationFee'];
    $VisaFee=$_POST['VisaFee'];
    $TuitionFee=$_POST['TuitionFee']; 
    $SpecialPass=$_POST['SpecialPass']; 
    $ShortenFee=$_POST['ShortenFee']; 
    $ACFee=$_POST['ACFee']; 
    $MFee=$_POST['MFee']; 
    $OutFees=$_POST['OutFees'];  

    $TotalFees = $RegistrationFee + $VisaFee + $TuitionFee + $SpecialPass + $ShortenFee + $ACFee + $MFee;


    $sql="UPDATE accounting SET  studentID='$studentID', studentName='$studentName', studentNationality='$studentNationality', studentPassportNo='$studentPassportNo', Date='$Date' , Ref='$Ref', Level='$Level', Months='$Months', intake='$intake', StudentType='$StudentType', PaymentM='$PaymentM', RegistrationFee='$RegistrationFee', VisaFee='$VisaFee', TuitionFee='$TuitionFee', SpecialPass='$SpecialPass', ShortenFee='$ShortenFee' , ACFee='$ACFee', MFee='$MFee', TotalFees='$TotalFees', OutFees='$OutFees' WHERE Ref= '$AcEdit'";

    
    $result2=mysqli_query($connection,$sql);

    if($result2)
    {
        echo"your application sent seccessfuly";
        
        header("location:Accounting1.php");

    }

    else
    {
        echo "apply failed";
    }


}
?>
            <div class="form first">
                <div class="details personal">
                    

                    <div class="fields">
                    <div class="input-field">
                        <label>REF NO</label>
                        <input type="hidden" name="Ref" value="<?php  echo "{$info['Ref']}"; ?>">
                        </div>
                        <div class="input-field">
                            <label>Student Name</label>
                            <input type="text" required name="studentName" value="<?php echo"{$info['studentName']}";?>">
                        </div>
                        <div class="input-field">
                            <label>Student ID</label>
                            <input type="text"required name="studentID" value="<?php echo"{$info['studentID']}";?>">
                        </div>
                        <div class="input-field">
                        <div><label>Nationalty</label></div>
                         <input type="text" required name="studentNationality" value="<?php echo"{$info['studentNationality']}";?>">
                        </div> 
                        <div class="input-field">
                        <div><label>Passport Number</label></div>
                         <input type="text" required name="studentPassportNo" value="<?php echo"{$info['studentPassportNo']}";?>">
                        </div>
                        <!-- <div class="input-field">
                            <label>Intake</label>
                            <input type="text"required name= "intake" onkeypress="return onlyNumberKey(event)" maxlength="11" value="<?php echo"{$info['intake']}";?>">
                        </div> -->
                        
                        <div class="input-field">
                            <label>Level</label>
                            <select required name="Level">
                                    <option disabled></option>
                                    <option <?php if ($info['Level'] == 'Starter 1') echo 'selected'; ?>>Starter 1
                                    </option>
                                    <option <?php if ($info['Level'] == 'Starter 2') echo 'selected'; ?>>Starter 2
                                    </option>
                                    <option <?php if ($info['Level'] == 'Starter 3') echo 'selected'; ?>>Starter 3
                                    </option>
                                    <option <?php if ($info['Level'] == 'Elementary 1') echo 'selected'; ?>>Elementary
                                        1</option>
                                    <option <?php if ($info['Level'] == 'Elementary 2') echo 'selected'; ?>>Elementary
                                        2</option>
                                    <option <?php if ($info['Level'] == 'Elementary 3') echo 'selected'; ?>>Elementary
                                        3</option>
                                    <option <?php if ($info['Level'] == 'Preintermediate 1') echo 'selected'; ?>>
                                        Preintermediate 1</option>
                                    <option <?php if ($info['Level'] == 'Preintermediate 2') echo 'selected'; ?>>
                                        Preintermediate 2</option>
                                    <option <?php if ($info['Level'] == 'Preintermediate 3') echo 'selected'; ?>>
                                        Preintermediate 3</option>
                                    <option <?php if ($info['Level'] == 'Intermediate 1') echo 'selected'; ?>>
                                        Intermediate 1</option>
                                    <option <?php if ($info['Level'] == 'Intermediate 2') echo 'selected'; ?>>
                                        Intermediate 2</option>
                                    <option <?php if ($info['Level'] == 'Intermediate 3') echo 'selected'; ?>>
                                        Intermediate 3</option>
                                    <option <?php if ($info['Level'] == 'Advance 1') echo 'selected'; ?>>Advance 1
                                    </option>
                                    <option <?php if ($info['Level'] == 'Advance 2') echo 'selected'; ?>>Advance 2
                                    </option>
                                    <option <?php if ($info['Level'] == 'Advance 3') echo 'selected'; ?>>Advance 3
                                    </option>
                                </select>
                        </div>
                        <div class="input-field">
                            <label>Months</label>
                            <input type="text"required name= "Months" value="<?php echo"{$info['Months']}";?>">
                        </div>
                        <div class="input-field">
                            <label>Date</label>
                            <input type="date"name= "Date" onkeypress="return onlyNumberKey(event)" maxlength="11" size="50%" value="<?php echo"{$info['Date']}";?>">
                        </div>
                        <div class="input-field">
                           <div><label>Student Type</label></div>
                            <Select required name= "StudentType">
                            <option disabled selected>Select</option>
                            <option <?php if($info['StudentType'] == 'Visa Application') echo 'selected'; ?>>Visa Application</option>
                            <option <?php if($info['StudentType'] == 'Non-Visa Application') echo 'selected'; ?>>Non-Visa Application</option>
                        </select>   
                        </div>
                        <div class="input-field">
                           <div><label>Payment Method</label></div>
                            <Select required name= "PaymentM">
                            <option disabled selected>Select</option>
                            <option <?php if($info['PaymentM'] == 'Cash') echo 'selected'; ?>>Cash</option>
                            <option <?php if($info['PaymentM'] == 'Credit/Debit Card') echo 'selected'; ?>>Credit/Debit Card</option>
                            <option <?php if($info['PaymentM'] == 'Paypal') echo 'selected'; ?>>Paypal</option>
                            <option <?php if($info['PaymentM'] == 'TT') echo 'selected'; ?>>TT</option>
                            <option <?php if($info['PaymentM'] == 'Local Bank Transfer') echo 'selected'; ?>>Local Bank Transfer</option>
                            <option <?php if($info['PaymentM'] == 'Westren Union') echo 'selected'; ?>>Westren Union</option>
                            <option <?php if($info['PaymentM'] == 'Cash Deposit') echo 'selected'; ?>>Cash Deposit</option>
                            <option <?php if($info['PaymentM'] == 'Others') echo 'selected'; ?>>Others</option>
                        </select>   
                        </div>
                        <div class="input-field">
                            <label>Registration Fee</label>
                            <input type="text"required name= "RegistrationFee" value="<?php echo"{$info['RegistrationFee']}";?>">
                        </div>
                        <div class="input-field">
                            <label>Visa Application Fee</label>
                            <input type="text"required name= "VisaFee" value="<?php echo"{$info['VisaFee']}";?>">
                        </div>
                        <div class="input-field">
                            <label>Tuition Fee</label>
                            <input type="text"required name= "TuitionFee" value="<?php echo"{$info['TuitionFee']}";?>">
                        </div>
                        <div class="input-field">
                            <label>Special Pass Fee</label>
                            <input type="text"required name= "SpecialPass" value="<?php echo"{$info['SpecialPass']}";?>">
                        </div>
                        <div class="input-field">
                            <label>Shorten Pass Fee</label>
                            <input type="text"required name= "ShortenFee" value="<?php echo"{$info['ShortenFee']}";?>">
                        </div>
                        <div class="input-field">
                            <label>Airport Clearnce Fee</label>
                            <input type="text"required name= "ACFee" value="<?php echo"{$info['ACFee']}";?>">
                        </div>
                        <div class="input-field">
                            <label>Micsellaneous Fee</label>
                            <input type="text"required name= "MFee" value="<?php echo"{$info['MFee']}";?>">
                        </div>
                        <!-- <div class="input-field">
                            <label>Total Fees</label>
                            <input type="number"required name= "TotalFees" onkeypress="return onlyNumberKey(event)" maxlength="11" size="50%" value="<?php echo"{$info['TotalFees']}";?>">
                        </div> -->
                        <div class="input-field">
                            <label>Outstanding Fees</label>
                            <input type="number"required name= "OutFees" onkeypress="return onlyNumberKey(event)" maxlength="11" size="50%" value="<?php echo"{$info['OutFees']}";?>">
                        </div>
                    </div>
                        <button class="sumbit" value="Acapply" name="Acapply">
                            <span class="btnText">Issue Financial</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div> 
            </div>
        </form>
        <button class="submit" onclick="location.href='Accounting1.php'"> <i class="fas fa-arrow-left"></i> </button>
    </div>
    </div>
    <script src="script.js"></script>
</body>
</html>