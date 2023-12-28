<?php

$host="localhost";//database 
$user="root";
$password="";
$db="management_system";

include('Header.php');//header file
include('footer.php'); 
session_start();
error_reporting(0);
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== 1) {
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
    <link rel="stylesheet" href="AdminHome.css">
    <link rel="stylesheet" href="AdminHome.css.map">
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
         
            <div class="icon"><i class="material-icons md-36" >edit</i></div>
            <a class="title" href="OfferLetter.php">Offer letter</a> 
            <p class="text">Issue an offer letter</p>
         
      </div>
      <!-- end card -->
      <!-- card -->
      <div class="card">
         
            <div class="icon"><i class="material-icons md-36">verified</i></div>
            <a class="title" href="admission.php">Admission</a>
            <p class="text">Manage student's Admission </p>
         
      </div>
      <!-- end card -->
          <!-- card -->
          <div class="card">
         
         <div class="icon"><i class="material-icons md-36">attach_money</i></div>
         <a class="title" href="acchome.php">Accounting</a>
         <p class="text">Manage student's financial matters</p>
      
   </div>
   <!-- end card -->
      <!-- card -->
      <div class="card">
         
            <div class="icon"><i class="material-icons md-36">description</i></div>
            <a class="title" href="newacademic.php">Academic</a>
            <p class="text">Manage student's and teacher's academic matters</p>
         
      </div>
      <!-- end card -->
           <!-- card -->
           <div class="card">
         
         <div class="icon"><i class="material-icons md-36">group</i></div>
         <a class="title" href="StaffM.php">Manage Staff</a>
         <p class="text">Add and manage staff</p>
      
   </div>
   <!-- end card -->
    <!-- card -->
    <div class="card">
         
         <div class="icon"><i class="material-icons md-36">class</i></div>
         <a class="title" href="class.php">Manage Class</a>
         <p class="text">Add and manage classes</p>
      
   </div>
   <!-- end card -->
   
   

   
   </div>
</div>
</body>
</html>