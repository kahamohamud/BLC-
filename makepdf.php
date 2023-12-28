<link rel="stylesheet" href="makepdf.css"> 
<?php

$host="localhost";//database 
$user="root";
$password="";
$db="management_system";


session_start();
$con= mysqli_connect($host, $user, $password, $db); 

if($con===false)
{
    die("connection error");
}


if(isset($_POST['apply']))

{
    
$ref= $_POST['ref'];
$date= $_POST['date']; 
$Name= ltrim($_POST['Name']);
$passport= $_POST['passport'];
$Nationalty= $_POST['Nationalty'];
$prog= $_POST['prog'];
$CourseD= $_POST['CourseD'];
$intake= $_POST['intake'];
$RVPfee= $_POST['RVPfee'];
$ACPfee= $_POST['ACPfee'];
$Toutionfee= $_POST['Toutionfee'];
$other_fees= $_POST['other_fees'];
$Totalfees= $Toutionfee+$ACPfee+$RVPfee+$other_fees;


    



?>
<body>
    <div class="area">
<?php

//create new PDF instance
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => 'A4',
    'orientation' => 'P'
]);

// $mpdf->SetDisplayMode('fullpage');
// $mpdf->SetDefaultBodyCSS('background-image-resize', 6);
// set the background image
$mpdf->SetHTMLHeader('
    <div style="background-image: url(\'letterheard-2020.svg\'); background-size: 100% 100%; width: 100%; height: 100%; position: relative; z-index: -1; background-repeat: no-repeat;"></div>
');
$mpdf->SetHTMLFooter('<div style="background-image: url(\'letterheard-2020.svg\'); background-size: 100% 100%; width: 100%; height: 100%; position: relative; z-index: -1;"></div>');

//Create our PDF
$data= '<br/> <br/> <br/> </br>';


//add data 
$data .= '<div style="font-size: 10px;">';
$data .='<br>';
$data .='<br>';
$data .= '<strong>     Ref No           : </strong>' . $ref . '<br/>' ;
$data .= '<strong>     Date             : </strong>' . $date . '<br/>' ;
$data .='<br>';
'<p></p> <br/>' ;


$data .= '<strong>     Name             : </strong>' . $Name . '<br/>' ;
$data .= '<strong>     Passport No      : </strong>' . $passport . '<br/>' ;
$data .= '<strong>     Nationalty       : </strong>' . $Nationalty . '<br/>' ;
$data .='<br>';
'<p></p> <br/>' ;
'<p> </p> <br/>' ;


$data .= '<strong>Dear ' . $Name . '<br/></strong>' ;

$data .='<br>';
$data .= '<strong>Re: OFFER LETTER </strong>';
$data .='<br>';
$data .= '</div>';

$data .='<div style="font-size: 12px;">';
$data .= '<p>We would like to take this opportunity to thank you for your interest in our institution and
would like to inform you that your application to study here at <strong>Britannia Language Centre</strong>
has been approved. We wish to inform you that the details of your enrolment as follows: <br/> </p>';
$data .= '</div>';

$data .='<div style="font-size: 10px;">';
$data .='<nbsp>';
$data .= '<strong>           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Programme &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ' . $prog . '</strong> <br/>' ;
$data .='<br>';
$data .= '<strong>           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    Course Duration &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ' . $CourseD .' MONTHS </strong> <br/>' ;
$data .='<br>';
$data .= '<strong>           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Intake &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ' . $intake . '</strong> <br/>';
$data .='<br>';
$data .= '<strong>           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Registration & visa Processing Fee&nbsp;: RM '  . $RVPfee . ' </strong> <br/>' ;
$data .='<br>';
$data .= '<strong>           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Airport Clearance & Pickup Fee &nbsp;&nbsp;&nbsp;&nbsp;  :  RM ' . $ACPfee . '</strong> <br/>' ;
$data .='<br>';
$data .= '<strong>           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Toution Fee &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  RM ' . $Toutionfee . ' </strong> <br/>' ;
$data .='<br>';
$data .= '<strong>           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Other Fees &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :  RM ' . $other_fees . '</strong> <br/>' ;
$data .='<br>';
$data .= '</div>';
$data .='<div style="font-size: 12px;">';
$data .= '<strong>                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Total Fees   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :  RM ' . $Totalfees . '</strong> <br/>' ;
$data .='<br>';
$data .= '</div>';
$data .='<div style="font-size: 12px;">';
$data .= '<p><strong> NOTE</strong>  : Visa renewal fees RM 500.00 is required at the time visa renewal. This fees is additional
and not included in the total fees above. <strong>*only applicable to students with 8 months course and above.</strong> <br/> </p>';

$data .= '<p>Kindly note that Registration & Visa Processing Fees are to be paid at the time of registration.
The remaining fees must be paid upon arrival to Britannia Language Centre. You may arrange
a Telegraphic Transfer (T.T) of Registration & Visa Processing fees to our account with
the following details: - <br/> </p>';
$data .= '</div>';

$data .='<div style="font-size: 10px;">';
        $data .= '<strong>Account Name&nbsp;&nbsp;&nbsp;&nbsp;:Pusat Bahasa Britannia SdnBhd<br/>
                          Account No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:564221644294 <br/>
                          Bank Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:MayBank Berhad <br/>
                          Bank Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:6-1 Menara Genesis HSBC, 33 Jalan Sultan Ismail, 50250 Kuala Lumpur Malaysia<br/>
                          Swift Code&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :MBBEMYKL </strong>';

                          $data .= '</div>';
                          
$data .='<div style="font-size: 12px;">';
$data .= '<p>We thank you for kind attention and welcome you to Britannia Language Centre. We look
forward to contribute to your academic excellence and wish you best in your endeavors to
improve your language skill. Please feel free to contact us if you need further information and
clarification at +603-21106886 or email at <strong>emgs@brtiannia.edu.my.</strong>';

$data .= '</div>';
$data .='<div style="font-size: 10px;">';
$data .= 'Thank you.<br/>';

$data .= '<br>Yours sincerely, <br/> </p>';
$data .= '</div>';
'<p></p><br/>';
'<p></p><br/>';
'<p></p><br/>';

$data .='<br>';
$data .='<br>';
$data .='<br>';

$data .='<div style="font-size: 10px;">';
$data .= '<p>ThevagiSelvan<br/>
Admin Executive<br/>
Britannia Language Centre<br/> </p>';
$data .= '</div>';



if($message){
    $data .='<br/><strong>Message</strong><br/>' .$message;

}


$sql="INSERT INTO offerletter(Ref,Date,Name,passport,Nationalty,prog,CourseD,intake,RVPfee,ACPfee,Toutionfee,other_fees)VALUES (
    '$ref','$date','$Name','$passport','$Nationalty','$prog','$CourseD','$intake','$RVPfee','$ACPfee','$Toutionfee','$other_fees')";

    $result=mysqli_query($con,$sql);

    if($result)
    {
        echo "<script>alert('Your Application has sent successfully!')</script>";
        echo "<meta http-equiv='refresh' content='2;url=OfferLetter.php'>";        
        $mpdf->WriteHTML($data);


// output to browser 

$mpdf->Output('myfile.pdf','D');

    }

    else
    {
        echo "apply failed";
    }
    

}
?>
    </div>
</body>