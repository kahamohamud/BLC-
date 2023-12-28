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


if(isset($_POST['reciept']))

{
    $Rref=$_POST['Rref'];
    $studentName=$_POST['studentName'];
    $Date=$_POST['Date'];
    $PaymentM=$_POST['PaymentM'];
    $PaidAmount=$_POST['PaidAmount'];
    $PaymentOf=$_POST['PaymentOf'];
    $PaidInNumber=$_POST['PaidInNumber'];
   


    $sql="INSERT INTO accounting(Rref, studentName, Date, PaymentM, PaidAmount, PaymentOf, PaidInNumber)VALUES ('$Rref', '$studentName', '$Date', '$PaymentM', '$PaidAmount', '$PaymentOf', '$PaidInNumber')";

    $result=mysqli_query($data,$sql);

    if($result)
    {
        $_SESSION['message']= "your application sent seccessfuly";
        
        header("location:rechome.php");

    }

    else
    {
        echo "apply failed";
    }


}



?>