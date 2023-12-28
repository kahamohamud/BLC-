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

if (isset($_POST['refund'])) {
    $RefundRef = $_POST['RefundRef'];
    $studentName = $_POST['studentName'];
    $studentNationality = $_POST['studentNationality'];
    $studentPassportNo = $_POST['studentPassportNo'];
    $RDate = $_POST['RDate'];
    $Level = $_POST['Level'];
    $RefundM = $_POST['RefundM'];
    $Reason = $_POST['Reason'];
    $TotalRefund = $_POST['TotalRefund'];
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Refund Receipt</title>
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
    $data .= '<br><div style="position:absolute; top:10; right:200; font-size: 25px;">';
    $data .= '<div style="font-size: 10px;">';
    $data .= '<br>';
    $data .= '<br>';
    $data .= '<strong>     <H1>BRITANNIA LANGUAGE CENTRE</H1>            </strong>';
    $data .= '     Fully owned and operated by PUSAT BAHASA BRITANNIA SDN BHD (1291134-U)<br/>';
    $data .= '     6-1 Menara Genesis Bukit Bintang, 33 Jalan Sultan Ismail<br/>';
    $data .= '     50250 Kuala Lumpur, Malaysia.<br/>';
    $data .= '     +6 03-27327278 &nbsp;&nbsp;   info@britannia.edu.my  &nbsp;&nbsp;   www.britannia.edu.my<br/>';
    $data .= '</div>';
    $data .= '</div>';
    $data .= '<br>';
    $data .= '<br>';
    $data .= '<br>';

    $data .= '<div style="font-size: 15px; text-align: right;">';
    $data .= '<p><strong>Date:</strong> ' . $RDate . '<br/>';
    $data .= '<strong>Refund Number</strong>: ' . $RefundRef . '<br/></p>';
    $data .= '</div>';


    // $data .= '<div style="font-size: 15px;">
    // <strong>TO:</strong><br/>
    //     <strong>STUDENT NAME:</strong> ' . $studentName . ' <br/>
    //     <strong>PASSPORT NUMBER:</strong> ' . $studentPassportNo . ' <br/>
    //     <strong>NATIONALITY:</strong> ' . $studentNationality . '<br/>
    //     <strong>COURSE:</strong> ' . $Level . ' </p><br/>
    // </div>';

    $data .= '<strong><i>Student Name :  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>&nbsp;&nbsp;'. $studentName . '</i><br/>';
    $data .= '<div style="border-bottom: 1px solid black; width: 65%; margin-top: 5px; margin-left: 20%;"></div><br/>'; // Add line under $studentName
    $data .= '<strong><i>Passport Number: &nbsp;&nbsp;</strong>'. $studentPassportNo . '</i><br/>';
    $data .= '<div style="border-bottom: 1px solid black; width: 65%; margin-top: 5px; margin-left: 20%;"></div><br/>';
    $data .= '<i><strong>Nationality: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>   ' . $studentNationality . '</i><br/>';
    $data .= '<div style="border-bottom: 1px solid black; width: 65%; margin-top: 5px; margin-left: 20%;"></div><br/>'; // Add line under $PaidAmount
    $data .= '<i><strong>course: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> &nbsp;&nbsp;       ' . $Level . '</i><br/>';
    $data .= '<div style="border-bottom: 1px solid black; width: 65%; margin-top: 5px; margin-left: 20%;"></div><br/>'; // Add line under $PaymentOf
    


    $data .= '<strong>Amount of refund: </strong> ' . $TotalRefund . '<br/></p>';
    $data .= '<br>';
    $data .= '<strong>Payment Method: </strong> ' . $RefundM . '<br/></p>';
    $data .= '<br>';
    $data .= '<strong>Reason of Refund: </strong>' . $Reason . '<br/></p>';
  


    // Check if $message is defined before appending to $data
    if (isset($message)) {
        $data .= '<br/><strong>Message:</strong><br/>' . $message;
    }

    // Update instead of Insert:
    $sql = "UPDATE refund SET 
        RefundRef='$RefundRef',
        studentName='$studentName',
        Level='$Level',
        studentNationality='$studentNationality',
        studentPassportNo='$studentPassportNo',
        RDate='$RDate',
        TotalRefund='$TotalRefund',
        RefundM='$RefundM',
        Reason='$Reason'
        WHERE RefundRef='$AcEdit'";
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
?>
</body>
</html>
