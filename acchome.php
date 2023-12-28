<?php

$host="localhost";//database 
$user="root";
$password="";
$db="management_system";

include('accheader.php');//header file
include('footer.php'); 
session_start();
error_reporting(0);

if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] !== 1 && !isset($_GET['logout']))) {
  header("Location: stafflogin.php");
  exit();
}


$connection=mysqli_connect($host,$user,$password,$db);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="academichome.css">
    <!-- <link rel="stylesheet" href="AdminHome.css.map"> -->
    <link rel="stylesheet" href="Header.css">
    <link rel="stylesheet" href="Footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
    <title>Admin Home</title>
</head>
<body>
<?php
    if($_SESSION['message']){
      echo $_SESSION['message'];

    }
    unset($_SESSION['message']);

    ?>

   
   <div class="content">
      <!-- card -->
      <div class="card">
         
            <div class="icon"><i class="material-icons md-36">attach_money</i></div>
            <a class="title" href="Accounting.php">Finance</a>
            <p class="text">Manage student's financial statement and issue Invoice</p>
         
      </div>
      <!-- end card -->
    <!-- card -->
    <div class="card">
         
         <div class="icon"><i class="material-icons md-36">receipt</i></div>
         <a class="title" href="rechome.php">Receipt</a>
         <p class="text">View and issue students reciepts</p>
      
   </div>
   <!-- end card -->
   <div class="card">
         
            <div class="icon"><i class="material-icons md-36">payments</i></div>
            <a class="title" href="refund.php">Refund</a>
            <p class="text">View and issue students refund statement</p>
         
      </div> 
   </div>
</div>
</body>
</html>