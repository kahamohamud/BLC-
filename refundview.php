<?php

error_reporting(0);
session_start();
// session_destroy();

if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] !== 1 && !isset($_GET['logout']))) {
    header("Location: stafflogin.php");
    exit();
  }


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

    <title>Refund form</title> 
</head>
<body>
<div class="overlay">
    <div class="container">
        <header>Refund Statement</header>

        <form action="refundpdf.php" method="POST" id="invoiceForm">
<?php

$connection=mysqli_connect($host,$user,$password,$db);
// to link the button with th page and the database
if (isset($_GET['refund'])){
    $AcEdit=$_GET['refund'];
 
//  this query name is from the database
  $select="select * from refund where RefundRef='".$AcEdit."'"; 
  $result=mysqli_query($connection,$select); 
  $info=$result->fetch_assoc();
}
  if (isset($_POST['refund']))
{
    
    $studentName=$_POST['studentName'];
    $studentNationality=$_POST['studentNationality'];
    $studentPassportNo=$_POST['studentPassportNo'];
    $RDate=$_POST['RDate'];
    $RefundRef=$_POST['RefundRef'];
    $RefundM=$_POST['RefundM'];
    $Level=$_POST['Level'];
    $Reason = $_POST['Reason']; 
    $TotalRefund=$_POST['TotalRefund'];




    $sql="UPDATE refund SET  studentName='$studentName', studentNationality='$studentNationality',studentPassportNo='$studentPassportNo', RDate='$RDate' , RefundRef='$RefundRef',RefundM='$RefundM', Level='$Level', Reason='$Reason', TotalRefund='$TotalRefund' WHERE RefundRef= '$AcEdit'";

    
    $result2=mysqli_query($connection,$sql);

    if($result2)
    {
        echo"your application sent seccessfuly";
        
        header("location:refund.php");

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
                        <input type="hidden" name="RefundRef" value="<?php echo"{$info['RefundRef']}"; ?>">
                        </div>
                        <div class="input-field">
                            <label>Student Name</label>
                            <input type="text" required name="studentName" value="<?php echo"{$info['studentName']}";?>">
                        </div>
                        <div class="input-field">
                        <div><label>Nationalty</label></div>
                         <input type="text" required name="studentNationality" value="<?php echo"{$info['studentNationality']}";?>">
                        </div> 
                        <div class="input-field">
                        <div><label>Passport Number</label></div>
                         <input type="text" required name="studentPassportNo" value="<?php echo"{$info['studentPassportNo']}";?>">
                        </div> 
                        <div class="input-field">
                            <label>Level</label>
                            <input type="text"required name= "Level" value="<?php echo"{$info['Level']}";?>">
                        </div>
                        <!-- <div class="input-field">
                            <label>Months</label>
                            <input type="text"required name= "Months" value="<?php echo"{$info['Months']}";?>">
                        </div> -->
                        <div class="input-field">
                            <label>RDate</label>
                            <input type="date"name= "RDate" value="<?php echo"{$info['RDate']}";?>">
                        </div>

                        <div class="input-field">
                                <div><label>Payment Method</label></div>
                                <select required name="RefundM">
                                    <option disabled selected>Select</option>
                                    <option <?php if ($info['RefundM'] == 'Cash') echo 'selected'; ?>>Cash</option>
                                    <option <?php if ($info['RefundM'] == 'Credit/Debit Card') echo 'selected'; ?>>Credit/Debit Card</option>
                                    <option <?php if ($info['RefundM'] == 'Paypal') echo 'selected'; ?>>Paypal</option>
                                    <option <?php if ($info['RefundM'] == 'TT') echo 'selected'; ?>>TT</option>
                                    <option <?php if ($info['RefundM'] == 'Local Bank Transfer') echo 'selected'; ?>>Local Bank Transfer</option>
                                    <option <?php if ($info['RefundM'] == 'Westren Union') echo 'selected'; ?>>Westren Union</option>
                                    <option <?php if ($info['RefundM'] == 'Cash Deposit') echo 'selected'; ?>>Cash Deposit</option>
                                </select>   
                            </div>
                            
                        <!-- <div class="input-field">
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
                        </div> -->
                        <div class="input-field">
                            <label>Total Refund</label>
                            <input type="number"required name= "TotalRefund" value="<?php echo"{$info['TotalRefund']}";?>">
                        </div> 
                        <div class="input-field">
                            <label>Reason of Refund</label>
                            <input type="text"required name= "Reason" value="<?php echo"{$info['Reason']}";?>">
                        </div>
                        
                    </div>
                        <button class="sumbit" value="refund" name="refund">
                            <span class="btnText">Issue Refund</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div> 
            </div>
        </form>
        <button class="submit" onclick="location.href='refund.php'"> <i class="fas fa-arrow-left"></i> </button>
    </div>
    </div>
    <script src="script.js"></script>
    <script>
    // Function to disable all form elements
    function disableFormElements() {
        var form = document.getElementById('invoiceForm');
        var elements = form.elements;
        for (var i = 0; i < elements.length; i++) {
            elements[i].disabled = true;
        }
    }

    // Call the disableFormElements function when the page loads
    window.onload = function() {
        disableFormElements();
    };
</script>
</body>
</html>