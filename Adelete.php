<?php

$host="localhost";//database 
$user="root";
$password="";
$db="management_system";
session_start();
$connection=mysqli_connect($host,$user,$password,$db);



if($_GET['student_id'])
{
    $id=$_GET['student_id'];
    
    $sql="DELETE FROM student WHERE studentID='$id' ";
    $result=mysqli_query($connection,$sql);

    if($result){
        echo '<script>alert("record has been deleted")</script>';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

}
?>