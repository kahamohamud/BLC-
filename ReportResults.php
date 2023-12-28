<style>
  .container {
    border: 2px solid black;
  }
</style>
<?php
$host="localhost";//database
$user="root";
$password="";
$db="management_system";
session_start();
error_reporting(0);
$con= mysqli_connect($host, $user, $password, $db);

if($con===false)
{
die("connection error");
}

if(isset($_POST['View']))
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

$TotalS1 = $Grammer1 + $Reading1 + $Writing1 + $VocabSpeaking1 + $Listening1 + $Speaking1 + $Tassessment1;
$TotalP1 = round(($TotalS1 / 150) * 100);
$int_cast = (int)$TotalP1;





?>
<div class="container">
<body>
    
<?php
//create new PDF instance
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$mpdf->SetDisplayMode('fullpage');
$mpdf->SetDefaultBodyCSS('background-image-resize', 6);
// set the background image
$mpdf->SetHTMLHeader('
');



// Set the HTML data
$data = '';
$data .= '<br><div style="position:absolute; top:-7; right:25;">';
$data .= '<br><br> <p style="margin:0;">6-1, Menara Gensis HSBC</p>';
$data .= '<p style="margin:0;">Bukit Bintang, 33 jalan</p>';
$data .= '<p style="margin:0;">Sultan Ismail, bukit bintang,</p>';
$data .= '<p style="margin:0;">50250 Kuala Lumpur,</p>';
$data .= '<p style="margin:0;">Malaysia</p>';
$data .= '</div>';

$data .= '<div style="position:absolute; top:0; left:65;">';
$data .= '<br><img src="unnamed (1).png" alt="Your Image" style="width:39%; height:auto; display:block; margin:0;">';
$data .= '</div>';

$data .='<br><br><br>';
$data .= '<hr size="50" color="red" width="50%">';


$data .= '<br>';
$data .='<h3 style="text-align: center;"> End Of Month Course Test Results</h3>';
$data .= '
<div style="border: 2px solid black; padding: 10px;">
  <p>
    <strong> NAME &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '. $StudentName1 .' </strong> <br/> 
    <strong> STUDENT ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '. $ID .'</strong> <br/>
    <strong> PASSPORT NO &nbsp;&nbsp;: '   . $passport .'</strong> <br/>
    <strong> COUNTRY &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;  : '    . $country .'</strong> <br/>
    <strong> DATE &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : '. $Date .' </strong> <br/>
    <strong> LEVEL &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '. $level .'</strong> <br/>
    <strong> TEACHER &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; : '. $TeacherName1 .'</strong><br/>
  </p>
</div>';



$data .= '<table width ="100%" border="1" cellpadding="5" cellspacing="0">
<tr>
    <th> </th>
    <th><strong>Assessment</th>
</tr>
<tr>
    <td><strong>Grammar:</td>
    <td style="text-align:center;">'. $Grammer1 . '/40</td>
</tr>
<tr>
    <td><strong>Reading:</td>
    <td style="text-align:center;">' . $Reading1 . '/20</td>
</tr>
<tr>
    <td><strong>Writing:</td>
    <td style="text-align:center;">' . $Writing1 . '/20</td>
</tr>
  <tr>
    <td><strong>Vocabulary:</td>
    <td style="text-align:center;">' . $VocabSpeaking1 . '/20</td>
  </tr>
  <tr>
    <td><strong>Listening:</td>
    <td style="text-align:center;">' . $Listening1 . '/20</td>
</tr>
<tr>
<td><strong>Speaking:</td>
<td style="text-align:center;">' . $Speaking1 . '/20</td>
</tr>
  <tr>
    <td><strong>Teacher Assesment:</td>
    <td style="text-align:center;">' . $Tassessment1 . '/10</td>
  </tr>
  <tr>
    <td><strong>TOTAL SCORE:</td>
    <td style="text-align:center;">' . $TotalS1 . '/150</td>  
  </tr>
  <tr>
    <td><strong>Total%:</td>
    <td style="text-align:center;">' . $TotalP1 . '%</td>
  </tr>
  </table>

  <br>
  <table width ="100%" border="1" cellpadding="5" cellspacing="0">
<tr>
<td><strong style="font-size:18px;">Attendance:</strong></td>
<td>' . $Attendance1 . '%</td>
</tr>
<tr>
<br>
<td><strong>Teacher Recommendation:</td>
<td><strong>' . $TRecom1 . '</td>
</tr>
<tr>
<br>
<td><strong>Notes:</td>
<td><strong>' . $Notes . '</td>
</tr>
</table>
';
$data .= '<div style="border: 2px solid black; border="1" padding: 10px; display: flex; justify-content: space-between;">
            <table width="100%" cellpadding="5" cellspacing="0">
            <tr>
            
            <td><br><br><br><br><br>Signed:___________________________<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Class Teacher)</td><br><br>
            <td style = "text-align: right;"><br><br><br><br><br>Signed: ___________________________<br>(Managing Director)</td><br><br>
        </tr>
            </table>
        </div>';



$data .='
<div style=" font-size:10px;">
<p> GRADES/RESULT: 
<br>
65.0% - 100% Pass
<br>
0% - 64.9% Repeat
</p>
</div>
';


//output to browser
$sql="UPDATE acadimic SET 
    studentName='$StudentName1',
    studentPassportNo='$passport',
    studentCountry='$country',
    sdate='$Date',
    Level='$level',
    TeacherName='$TeacherName1',
    Grammar='$Grammer1',
    Reading='$Reading1',
    Writing='$Writing1',
    Vocab='$VocabSpeaking1',
    Listening='$Listening1',
    Speaking='$Speaking1',
    Tassessment='$Tassessment1',
    TotalS='$TotalS1',
    TotalP='$TotalP1',
    Attendance='$Attendance1',
    TRecom='$TRecom1',
    Notes='$Notes',
    Units='$Units' WHERE studentID='$ID'";

$result=mysqli_query($con,$sql);

if($result)
{
    $_SESSION['message']= "your application updated successfully";
    
    $mpdf->WriteHTML($data);

    // output to browser 
    $mpdf->Output('Report.pdf','I');
}
else
{
    echo "update failed";
}

    

}
?>
</div>
</body>


















