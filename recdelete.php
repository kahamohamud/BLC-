<?php

$host="localhost";//database 
$user="root";
$password="";
$db="management_system";
session_start();
$connection=mysqli_connect($host,$user,$password,$db);



if($_GET['recdelete'])
{
    $id=$_GET['recdelete'];
    
    $sql="DELETE FROM receipt WHERE Rref='$id' ";
    $result=mysqli_query($connection,$sql);

    if($result){
        echo '<script>alert("record has been deleted")</script>';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

}
?>