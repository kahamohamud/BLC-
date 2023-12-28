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
    $data_Position=$_POST['Position'];
    $data_Name=$_POST['Name'];
    $data_Username=$_POST['Uname'];
    $data_Password=$_POST['Password'];
   


    $sql="INSERT INTO authintication(staffName,UserName,staffPassword,user_type)VALUES ('$data_Name','$data_Username','$data_Password','$data_Position')";

    $result=mysqli_query($data,$sql);

    if($result)
    {
        $_SESSION['message']= "your application sent seccessfuly";
        
        header("location:Staffm.php");

    }

    else
    {
        echo "apply failed";
    }


}



?>