<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "management_system";

session_start();
$con = mysqli_connect($host, $user, $password, $db);

if ($con === false) {
    die("connection error");
}

if (isset($_POST['Acapply'])) {
    $studentName = $_POST['studentName'];
    $studentNationality = $_POST['studentNationality'];
    $studentPassportNo = $_POST['studentPassportNo'];
    $Date = $_POST['Date'];
    $Ref = $_POST['Ref'];
    $Level = $_POST['Level'];
    $Months = $_POST['Months'];
    $RegistrationFee = $_POST['RegistrationFee'];
    $VisaFee = $_POST['VisaFee'];
    $TuitionFee = $_POST['TuitionFee'];
    $SpecialPass = $_POST['SpecialPass'];
    $ShortenFee = $_POST['ShortenFee'];
    $ACFee = $_POST['ACFee'];
    $MFee = $_POST['MFee'];
    $TotalFees = $RegistrationFee + $VisaFee + $TuitionFee + $SpecialPass + $ShortenFee + $ACFee + $MFee;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
      body {
    font-family: Verdana, sans-serif;
}
    </style>
</head>
<body>
<?php
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => 'A4',
    'orientation' => 'P'
]);

    $data .= '<div style="position:absolute; top:0; left:65;">';
    $data .= '<br><img src="unnamed (1).png" alt="Your Image" style="width:39%; height:auto; display:block; margin:0;">';
    $data .= '</div>';
    $data .= '<br><div style="position:absolute; top:70; right:90; font-size: 25px;">';
    $data .= 'INVOICE';
    $data .= '</div>';
    $data .= '<br><br><br>';
    $data .= '<hr style="height: 1px; width: 100%; border: none; background-color:blue; ">';
    $data .= '<br>';


    $data .= '<div style="font-size: 15px; text-align: right;">';
    $data .= '<p><strong>Date:</strong> ' . $Date . '<br/>';
    $data .= '<strong>Invoice Number:</strong> ' . $Ref . '<br/></p>';
    $data .= '</div>';
    

    $data .= '<div style="font-size: 15px;">
    <strong>TO:</strong><br/>
    <strong>Student Name:</strong>  '. $studentName .' <br/>
    <strong>Passport Number:</strong>  '. $studentPassportNo .' <br/>
    <strong>Nationality:</strong>  '. $studentNationality . '<br/>
    <strong>Course:</strong>  '. $Level .' </p><br/>
    </div>';


    $data .= '<div style="font-size: 10px;">';
    $data .= '<table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Description</th>
            <th>Months</th>
            <th>Total</th>
        </tr>
        <tr>
        <td>1</td>
            <td>REGISTRATION FEES</td>
            <td>-</td>
            <td style="text-align:center;">' . $RegistrationFee . '</td>
        </tr>
        <tr>
        <td>2</td>
            <td>VISA FEES</td>
            <td>-</td>
            <td style="text-align:center;">' . $VisaFee . '</td>
            
        </tr>
        <tr>
        <td>3</td>
            <td>TUTION FEES</td>
            <td> '.$Months.' </td>
            <td style="text-align:center;">' . $TuitionFee . '</td>
            
        </tr>
        <tr>
        <td>4</td>
            <td>SPECIAL PASS FEES</td>
            <td>-</td>
            <td style="text-align:center;">' . $SpecialPass . '</td>
          
        </tr>
        <tr>
        <td>5</td>
            <td>SHORETN FEES</td>
            <td>-</td>
            <td style="text-align:center;">' . $ShortenFee . '</td>
           
        </tr>
        <tr>
        <td>6</td>
            <td>AIRPORT CLEARENCE</td>
            <td>-</td>
            <td style="text-align:center;">' . $ACFee . '</td>
           
        </tr>
        <tr>
        <td>7</td>
            <td>MISCELLANEOUS FEES</td>
            <td>-</td>
            <td style="text-align:center;">' . $MFee . '</td>
           
        </tr>
        <tr>
        <td></td>
            <td><strong>TOTAL PAYABLE</td>
            <td>-</td>
           
            <td style="text-align:center;"><strong>' . $TotalFees . '</strong></td>
        </tr>
    </table>';

    $data .= '</div>';
    $data .= '<br>';
    $data .= '<br>';

    $data .= '<strong style="border-bottom: 1px solid black;">Bank Details:</strong>';
    $data .= '<br>';
    $data .= '<br>';

    $data .='<div style="font-size: 15px;">';
    $data .= '<strong>Account Name&nbsp;&nbsp;&nbsp;&nbsp;:</strong> Pusat Bahasa Britannia SdnBhd<br/>
    <strong>Account No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong> 564221644294 <br/>
    <strong>Bank Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong> MayBank Berhad <br/>
    <strong>Bank Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong> Wisma KS, 5, Jalan Meranti, Taman Setapak, 53000 Kuala Lumpur, Malaysia<br/>
    <strong>Swift Code&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong> MBBEMYKL';
      

    $data .= '<br>';
    $data .= '<br>';

    $data .= 'This invoice price validity is for (7) days from the date of issue.<br/>';

    $data .= '<br>';
    
    $data .= '<p>Kindly send the payment receipt scans to khan@britannia.edu.my. The student\'s name and passport number must be clearly mentioned with the payment receipts.</p>';
    $data .= '</div>';  
    // Check if $message is defined before appending to $data
    if (isset($message)) {
        $data .= '<br/><strong>Message:</strong><br/>' . $message;
    }

    // $sql = "INSERT INTO accounting (Ref, studentName, studentPassportNo, studentNationality, Date, Level, Months, RegistrationFee, VisaFee, TuitionFee, SpecialPass, ShortenFee, ACFee, MFee, TotalFees) 
    //         VALUES ('$Ref', '$studentName', '$studentPassportNo', '$studentNationality', '$Date', '$Level', '$Months', '$RegistrationFee', '$VisaFee', '$TuitionFee', '$SpecialPass', '$ShortenFee', '$ACFee', '$MFee', '==')";


// Update instead of Insert:
$sql="UPDATE accounting SET 
Ref='$Ref',
studentName='$studentName',
studentPassportNo='$studentPassportNo',
studentNationality='$studentNationality',
Date='$Date',
Level='$Level',
RegistrationFee='$RegistrationFee',
VisaFee='$VisaFee',
TuitionFee='$TuitionFee',
SpecialPass='$SpecialPass',
ACFee='$ACFee',
MFee='$MFee',
TotalFees='$TotalFees'
WHERE Ref='$AcEdit'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<script>alert('Your Application has been sent successfully!')</script>";
        echo "<meta http-equiv='refresh' content='2;url=Admission.php'>";
        $mpdf->WriteHTML($data);
        $mpdf->Output('myfile.pdf', 'D');
    } else {
        echo "Apply failed";
    }
}
$data .='</div>';
?>
</body>
</html>
