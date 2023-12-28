<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "management_system";

session_start();
$con = mysqli_connect($host, $user, $password, $db);
if ($con === false) {
    die("Connection error");
}

if (isset($_POST['Acapply'])) {
    $Rref = $_POST['Rref'];
    $studentName = $_POST['studentName'];
    $Date = $_POST['Date'];
    $PaymentM = $_POST['PaymentM'];
    $PaidAmount = $_POST['PaidAmount'];
    $PaymentOf = $_POST['PaymentOf'];
    $PaidInNumber = $_POST['PaidInNumber'];

    // Create new PDF instance
    require_once __DIR__ . '/vendor/autoload.php';
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->SetDefaultBodyCSS('background-image-resize', 6);

    // Create our PDF content
    $data = '<br/><br/><br/></br>';

    // Add data to the PDF

//Logo
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
    $data .= '<br><div style="position:absolute; top:70; right:50; font-size: 15px; ">';
    $data .= '<strong>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No:       </strong>' . $Rref . '<br/>';
    $data .= '</div>';
    $data .= '<br>';
    
    $data .= '<div style= "position:absolute; font-size: 10px; right:50; top:190;">';
    $data .= '<strong>     Date:             </strong>' . $Date . '<br/>';
    $data .= '</div>';
    $data .= '<div style= "position:absolute; font-size: 20px; right:300; top:180;">';
    $data .= '<strong>     OFFICIAL RECEIPT<br/>';
    $data .= '</div>';
    $data .= '<div style= "position:absolute; font-size: 15px; left:50; top:230;">';
    $data .= '<i><strong>Received From   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong>&nbsp;&nbsp;&nbsp;'. $studentName . '</i><br/>';
    $data .= '<div style="border-bottom: 1px solid black; width: 70%; margin-top: 5px; margin-left: 20%;"></div><br/>'; // Add line under $studentName
    $data .= '<i><strong>Amount In Ringgit:</strong>   &nbsp;&nbsp;' . $PaidAmount . '</i><br/>';
    $data .= '<div style="border-bottom: 1px solid black; width: 70%; margin-top: 5px; margin-left: 20%;"></div><br/>'; // Add line under $PaidAmount
    $data .= '<i><strong>Being Payment Of :</strong>   &nbsp;&nbsp;' . $PaymentOf . '</i><br/>';
    $data .= '<div style="border-bottom: 1px solid black; width: 70%; margin-top: 5px; margin-left: 20%;"></div><br/>'; // Add line under $PaymentOf
    
    $data .= '<p></p><p></p><br/>';
    
    $data .= '<div style= "position:absolute; font-size: 17.5px;">';
    $data .= '  <strong>   RM ' . $PaidInNumber . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' .'</strong><br/>';
    $data .= '<strong> Payment Method: ' .$PaymentM.  '  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  '  . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/> </strong>';
    $data .= '</div>';
    $data .= '</div>';
    $data .= '<div style= "position:absolute; top: 459; font-size: 13.5px;">';
    $data .= '<p><i>This is computer generated no signature required</p></i>';
    $data .= '</div>';



    // Check if $message is defined before appending to $data
    $sql = "UPDATE receipt SET 
    studentName='$studentName',
    Rref='$Rref',
    Date='$Date',
    PaymentM='$PaymentM',
    PaidAmount='$PaidAmount',
    PaymentOf='$PaymentOf',
    PaidInNumber='$PaidInNumber'
    WHERE Rref='$AcEdit'";

    $result = mysqli_query($con, $sql);

    if ($result) {
        $_SESSION['message'] = "Your application was updated successfully";
        
        $mpdf->WriteHTML($data);

        // Output to browser 
        $mpdf->Output('Report.pdf', 'D');
    } else {
        echo "Update failed";
    }
}
?>
