<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "management_system";

session_start();
$con = mysqli_connect($host, $user, $password, $db);
if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] !== 1 && !isset($_GET['logout']))) {
    header("Location: stafflogin.php");
    exit();
  }
  

if ($con === false) {
    die("connection error");
}

if (isset($_POST['apply'])) {
    // $studentID = $_POST['studentID'];
    $ref = $_POST['RefNo'];
    $About1 = $_POST['About11'];
    $Sname1 = $_POST['Sname11'];
    $Gender1 = $_POST['Gender11'];
    $Status1 = $_POST['Status11'];
    $Nationality1 = $_POST['Nationality11'];
    $passport1 = $_POST['passport11'];
    $Dateb1 = $_POST['Dateb11'];
    $IC1 = $_POST['IC11'];
    $Caddress1 = $_POST['Caddress11'];
    $Houseno1 = $_POST['Houseno11'];
    $City1 = $_POST['City11'];
    $Postcode1 = $_POST['Postcode11'];
    $State1 = $_POST['State11'];
    $Country1 = $_POST['Country11'];
    $Tel1 = $_POST['Tel11'];
    $Semail1 = $_POST['Semail11'];
    $Pemail1 = $_POST['Pemail11'];
    $Pname1 = $_POST['Pname11'];
    $Smonth1 = $_POST['Smonth11'];
    $Emonth1 = $_POST['Emonth11'];
    $Intro1 = $_POST['Intro11'];
    $Sco1 = $_POST['Sco11'];
    $Status=$_POST['Status'];
    // $studentPic = $_POST['studentPic'];
    ?>

<head>
    <link rel="stylesheet" href="makepdf.css">
</head>

<body>
    <?php
    //create new PDF instance
    require_once __DIR__ . '/vendor/autoload.php';
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->showImageErrors = true;
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->SetDefaultBodyCSS('background-image-resize', 6);
    

    // Set the HTML data
    $data = '';
    $data .= '<br><div style="position:absolute; top:12; right:60;">';
    $data .= '<br><br> <p><strong>PUSAT BAHASA BRITANNIA</strong></p>';
    $data .= '<p style="margin: 0; font-size: 10px;">(MOE NO. Perakuan Pendaftaran <strong>WZ 10035</strong>)</p>';
    $data .= '<p style="margin:0; font-size: 10px;">www.britannia.edu.my</p>';
    $data .= '</div>';

    
    $data .= '<div style="position:absolute; top:0; left:65;">';
    $data .= '<br><img src="unnamed (1).png" alt="Your Image" style="width:39%; height:auto; display:block; margin:0;">';
    $data .= '</div>';
    $data .= '<div style="position:absolute; top:140; left:65; font-size:10px;">';
    $data .= '<strong> Ref No:</strong> ' . $ref;
    $data .='<br>';
    $data .= '</div>';
    $data .= '<br><br><br>';
    $data .='<h1 style="text-align: Center; position:relative; "> STUDENT PROFILE</h1>';
    // $data .= '<hr style="height: 2px; width: 70%; border: none; background-color: #000; margin: 0;">';
    


// Student Information:
    $data .= '<h2 style="text-align: left; position:relative; ">STUDENT INFORMATION:</h2>';
    // $data .= '<br>';
    // $data .= '<br>';
    // $data .= '<br>';
    // $data .= '<br>';
    $data .= '<div style="position: absolute; top: 120; right: 55; border: 2px solid black;">';

    // Fetch the image path for the selected student
    
    $sql = "SELECT studentPic FROM student WHERE studentPassportNo = ?";
    $stmt = mysqli_prepare($con, $sql);
    
    // Bind the parameter to the prepared statement
    mysqli_stmt_bind_param($stmt, "s", $passport1);
    
    // Execute the query
    mysqli_stmt_execute($stmt);
    
    // Bind the result to a variable
    mysqli_stmt_bind_result($stmt, $studentPic);
    
    // Fetch the result
    if (mysqli_stmt_fetch($stmt)) {
        // Add the selected image to the PDF and set its width and height
        $data .= "<img src='{$studentPic}' alt='Student Picture' style='width: 90px; height: 130px;'>";
    } else {
        // Handle the case when the selected student does not have an image
        $data .= "<p>No image available for the selected student.</p>";
    }
    
    // Close the statement
    mysqli_stmt_close($stmt);
    
    $data .= '</div>';
    $data .= '</div>';
    
 // Table starts here with borders, spacing, and adjusted column width
 $data .= '<table style="margin-top: 5px; width: 100%; border-collapse: collapse; border: 1px solid black;">';
 $data .= '<tr style="border: 2px solid black;"><td style="width: 10%; padding: 5px;"><strong>Name:</strong></td><td style="width: 40%; border: 2px solid black; padding: 5px;">' . $Sname1 . '</td></tr>';
 $data .= '<tr style="border: 2px solid black;"><td style="width: 10%; padding: 5px;"><strong>Passport No:</strong></td><td style="border: 2px solid black; padding: 5px;">' . $passport1 . '</td></tr>';
 $data .= '<tr style="border: 2px solid black;"><td style="padding: 5px;"><strong>IC:</strong></td><td style="border: 2px solid black; padding: 5px;">' . $IC1 . '</td></tr>';
 $data .= '<tr style="border: 2px solid black;"><td style="padding: 5px;"><strong>Nationality:</strong></td><td style="border: 2px solid black; padding: 5px;">' . $Nationality1 . '</td></tr>';
 $data .= '<tr style="border: 2px solid black;"><td style="padding: 5px;"><strong>Gender:</strong></td><td style="border: 2px solid black; padding: 5px;">' . $Gender1 . '</td></tr>';
 $data .= '<tr style="border: 2px solid black;"><td style="padding: 5px;"><strong>Martial Status:</strong></td><td style="border: 2px solid black; padding: 5px;">' . $Status1 . '</td></tr>';
 $data .= '<tr style="border: 2px solid black;"><td style="padding: 5px;"><strong>Date of birth:</strong></td><td style="border: 2px solid black; padding: 5px;">' . $Dateb1 . '</td></tr>';
 $data .= '</table>';
 // Table ends here

    
    // $data .= '<br>';
    $data .= '<hr style="height: 2px; width: 70%; border: none; background-color: black; margin: 10px 0;">';

    // Student Data:
    $data .= '<h2 style="text-align: left; margin-top: 10px;">STUDENT DATA:</h2>';
    $data .= '<table style="margin-top: 5px; width: 100%; border-collapse: collapse; border: 1px solid black;">';
    $data .= '<tr style="border: 2px solid black;"><td style="width: 10%; padding: 5px;"><strong>Introducer:</strong></td><td style="width: 70%; border: 1px solid black; padding: 5px;">' . $About1 . '</td></tr>';
    $data .= '<tr style="border: 2px solid black;"><td style="padding: 5px;"><strong>Address:</strong></td><td style="border: 1px solid black; padding: 5px;">' . $Caddress1 . '</td></tr>';
    $data .= '<tr style="border: 2px solid black;"><td style="padding: 5px;"><strong>House No:</strong></td><td style="border: 1px solid black; padding: 5px;">' . $Houseno1 . '</td></tr>';
    $data .= '<tr style="border: 2px solid black;"><td style="padding: 5px;"><strong>City:</strong></td><td style="border: 1px solid black; padding: 5px;">' . $City1 . '</td></tr>';
    $data .= '<tr style="border: 2px solid black;"><td style="padding: 5px;"><strong>Postcode:</strong></td><td style="border: 1px solid black; padding: 5px;">' . $Postcode1 . '</td></tr>';
    $data .= '<tr style="border: 2px solid black;"><td style="padding: 5px;"><strong>State:</strong></td><td style="border: 1px solid black; padding: 5px;">' . $State1 . '</td></tr>';
    $data .= '<tr style="border: 2px solid black;"><td style="padding: 5px;"><strong>Country:</strong></td><td style="border: 1px solid black; padding: 5px;">' . $Country1 . '</td></tr>';
    $data .= '<tr style="border: 2px solid black;"><td style="padding: 5px;"><strong>Telephone:</strong></td><td style="border: 1px solid black; padding: 5px;">' . $Tel1 . '</td></tr>';
    $data .= '<tr style="border: 2px solid black;"><td style="padding: 5px;"><strong>Emails:</strong></td><td style="border: 1px solid black; padding: 5px;">' . $Semail1 . ' / ' . $Pemail1 . '</td></tr>';
    $data .= '</table>';
    
    

    $data .= '<hr style="height: 2px; width: 70%; border: none; background-color: #000; margin: 10px 0;">';
    //Program Enrolemnt
    $data .='<h2 style="text-align: left; margin-top: 10px;">PROGRAM ENROLLMENT:</h2>';
    $data .= '<table style="margin-top: 5px; width: 100%; border-collapse: collapse; border: 1px solid black;">';
    $data .= '<tr style="border: 2px solid black;"><td style="width: 10%; padding: 5px;"><strong>Program Name:</strong></td><td style="width: 70%; border: 1px solid black; padding: 5px;">' . $Pname1 . '</td></tr>';
    $data .= '<tr style="border: 2px solid black;"><td style="padding: 5px;"><strong>Date Range:</strong></td><td style="border: 1px solid black; padding: 5px;">' . $Smonth1 . ' - ' . $Emonth1 . '</td></tr>';
    $data .= '<tr style="border: 2px solid black;"><td style="padding: 5px;"><strong>Student Counselor / Introducer:</strong></td><td style="border: 1px solid black; padding: 5px;">' . $Sco1 . ' / ' . $Intro1 . '</td></tr>';
    $data .= '<tr style="border: 2px solid black;">
                 <td style="padding: 5px;"><strong>Course Status:</strong></td>
                 <td style="border: 1px solid black; padding: 5px; font-weight: bold; color: ' . ($Status === 'Completed' ? 'green' : 'blue') . ';">' . $Status . '</td>
               </tr>';
    $data .= '</table>';
    
    


    if (isset($message)) {
        $data .= '<br/><strong>Message:</strong><br/>' . $message;
    }

    $sql = "UPDATE student SET
    about = '$About1',
    studentName = '$Sname1',
    studentNationality = '$Nationality1',
    studentStatus = '$Status1',
    studentSex = '$Gender1',
    studentDateOfBirth = '$Dateb1',
    studentPassportNo = '$passport1',
    studentICNo = '$IC1',
    studentAddress = '$Caddress1',
    studentPostCode = '$Postcode1',
    studentCity = '$City1',
    studentState = '$State1',
    studentCountry = '$Country1',
    studentMobile = '$Tel1',
    studentHouseNo = '$Houseno1',
    studenEmail = '$Semail1',
    studentPEmail = '$Pemail1',
    studentProgram = '$Pname1',
    studentStart = '$Smonth1',
    studentEnd = '$Emonth1',
    studentIntroducer = '$Intro1',
    Status='$Status',
    studentCouncelor = '$Sco1'
WHERE RefNo = '$ref'";

    

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<script>alert('Your Application has been sent successfully!')</script>";
        echo "<meta http-equiv='refresh' content='2;url=Admission.php'>";
        $mpdf->WriteHTML($data);

        // output to browser 
        $mpdf->Output('myfile.pdf', 'I');
    } else {
        echo "Apply failed";
    }
    ?>
</body>
<?php
}
?>
