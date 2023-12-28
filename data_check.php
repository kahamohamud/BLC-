<?php

$host="localhost";//database 
$user="root";
$password="";
$db="management_system";


session_start();
$data= mysqli_connect($host, $user, $password, $db); 

if($data===false)
{
    die("connection error");
}


if(isset($_POST['apply']))

{
    
    $data_name=$_POST['studentname'];
    $data_studentPassportNo=$_POST['studentPassportNo'];
    $data_country=$_POST['country'];
    $data_sdate=$_POST['sdate'];
    $data_units=$_POST['units'];
    $data_Levl=$_POST['Levl'];
    $TeacherName=$_POST['TeacherName'];


    $sql="INSERT INTO acadimic(studentname,studentPassportNo,country,sdate,units,Levl,TeacherName)VALUES (
    '$data_name','$data_studentPassportNo',' $data_country','$data_sdate','$data_units','$data_Levl','$TeacherName')";

    $result=mysqli_query($data,$sql);

    if($result)
    {
        $_SESSION['message']= "your application sent seccessfuly";
        
        header("location:newacademic.php");

    }

    else
    {
        echo "apply failed";
    }
    

}



?>