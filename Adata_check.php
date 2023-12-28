<!-- Modifed Code -->
<?php

$host="localhost";//database 
$user="root";
$password="";
$db="management_system";

include('header.php');//header file
session_start();
$data= mysqli_connect($host, $user, $password, $db); 

if($data===false)
{
    die("connection error");
}


if(isset($_POST['apply']))
{
    $ref= $_POST['RefNo'];
    $data_about=$_POST['about'];
    $data_Name=$_POST['studentName'];
    $data_Gender=$_POST['Gender'];
    // $data_Dateb=$_POST['Gender'];
    $data_Martials=$_POST['Martials'];
    $data_Nationality=$_POST['studentNationality'];
    $data_Dateb=$_POST['studentDateOfBirth'];
    $data_PassportNo=$_POST['PassportNo'];
    $data_IC =$_POST['IC'];
    $data_Address=$_POST['Address'];
    $data_City=$_POST['City'];
    $data_postcode=$_POST['postcode'];
    $data_State=$_POST['State'];
    $data_Country=$_POST['studentCountry'];
    $data_TelephoneNo=$_POST['TelephoneNo'];
    $data_HouseNo=$_POST['HouseNo'];
    $data_Email=$_POST['Email'];
    $data_PEmail=$_POST['PEmail'];
    $data_pname=$_POST['pname'];
    $data_Startmonth=$_POST['Startmonth'];
    $data_Endmonth=$_POST['Endmonth'];
    $data_Introducer=$_POST['Introducer'];
    $data_StudentCounselor=$_POST['StudentCounselor'];
    $data_StudentCounselor=$_POST['StudentCounselor'];
    $data_Status=$_POST['Status'];

    // Upload photo
$data_pic = $_FILES['studentPic']['name'];
$data_pic_temp = $_FILES['studentPic']['tmp_name'];
$upload_directory = "uploads/"; // Specify the upload directory
$data_pic_path = $upload_directory . $data_pic;
move_uploaded_file($data_pic_temp, $data_pic_path);

$sql = "INSERT INTO student (RefNo, about, studentName, studentNationality, studentStatus, studentSex, studentDateOfBirth, studentPassportNo, studentICNo, studentAddress, studentPostCode, studentCity, studentState, studentCountry, studentMobile, studentHouseNo, studenEmail, studentPEmail, studentProgram, studentStart, studentEnd, studentIntroducer, studentCouncelor, studentPic, Status)
VALUES ('$ref', '$data_about', '$data_Name', '$data_Nationality', '$data_Martials', '$data_Gender', '$data_Dateb', '$data_PassportNo', '$data_IC', '$data_Address', '$data_postcode', '$data_City', '$data_State', '$data_Country', '$data_TelephoneNo', '$data_HouseNo', '$data_Email', '$data_PEmail', '$data_pname', '$data_Startmonth', '$data_Endmonth', '$data_Introducer', '$data_StudentCounselor', '$data_pic_path', '$data_Status')";
$result = mysqli_query($data, $sql);

if ($result) {
    $_SESSION['message'] = "Your application was sent successfully.";
    header("location: Admission.php");
} else {
    echo "Apply failed.";
}


    if($result)
    {
        $_SESSION['message']= "Your application was sent successfully.";
        header("location: Admission.php");
    }
    else
    {
        echo "Apply failed.";
    }
}

?>
