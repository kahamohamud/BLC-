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


if(isset($_POST['fapply']))

{
    $studentName=$_POST['studentName'];
    $studentID=$_POST['studentID'];
    $studentNationality=$_POST['studentNationality'];
    $Ref=$_POST['Ref'];
    $intake=$_POST['intake'];
    $Level=$_POST['Level'];
    $TotalFees=$_POST['TotalFees'];
    $PaidFees=$_POST['PaidFees'];
    $OutFees =$_POST['OutFees'];
    $FeesType=$_POST['FeesType'];
    $PaymentM=$_POST['PaymentM'];
    $AmountIn=$_POST['AmountIn'];
    $AmountOut=$_POST['AmountOut'];
    $RefundType=$_POST['RefundType'];
    $Date=$_POST['Date'];

    $sql="INSERT INTO accounting (Ref,studentName,studentNationality, intake, studentID, Level, TotalFees, PaidFees, OutFees, FeesType, PaymentM, AmountIn, AmountOut, RefundType, Date)
    VALUES ('$Ref','$studentName','$studentNationality','$intake','$studentID','$Level','$TotalFees','$PaidFees','$OutFees','$FeesType','$PaymentM','$AmountIn','$AmountOut',
    '$RefundType','$Date')";
    $result=mysqli_query($data,$sql);

    if($result)
    {
        $_SESSION['message']= "your application sent seccessfuly";
        
        header("location:accounting.php");

    }

    else
    {
        echo "apply failed";
    }


}



?>
    


