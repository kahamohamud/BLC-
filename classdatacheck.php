<?php

$host="localhost";//database 
$user="root";
$password="";
$db="management_system";


session_start();
error_reporting(E_ALL);
$data= mysqli_connect($host, $user, $password, $db); 

if($data===false)
{
    die("connection error");
}


if(isset($_POST['submit1']))

{
    
    $classID = $_POST['classID'];
    $level = $_POST['Level'];
    $ClassVenue = $_POST['ClassVenue'];
    $prog = $_POST['prog'];
    $teacher_name = $_POST['TeacherName'];
    $date = $_POST['Date'];
    $time = $_POST['Time'];
    $Time1 = $_POST['Time1'];


    $sql="INSERT INTO class(classID,Level,ClassVenue,prog,TeacherName,Date,Time,Time1)VALUES (
    '$classID','$level','$ClassVenue','$prog', '$teacher_name','$date','$time','$Time1')";

    $result=mysqli_query($data,$sql);

    if($result)
    {
        $_SESSION['message']= "your application sent seccessfuly";
        
        header("location:class.php");

    }

    else
    {
        echo "apply failed";
    }
    

}



?>