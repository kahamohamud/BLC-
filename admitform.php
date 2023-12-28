<?php

error_reporting(0);
session_start();
// session_destroy();

if($_SESSION['message'])
{
    $message=$_SESSION['message'];

    echo "<script type='text/javascript'>
    alert('$message'); 
    </script>";
}
if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] !== 1 && !isset($_GET['logout']))) {
    header("Location: stafflogin.php");
    exit();
  }
  
?>


<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>New student </title> 
</head>
<body>
    <div class="container">
        <header>New Student</header>

        <form action="data_check.php" method="POST">
            <div class="form first">
                <div class="details personal">
                    <span class="title">STUDENT'S DATA</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Student ID</label>
                            <input type="text"required name="studentid">
                        </div>
                        
                        <div class="input-field">
                            <label>Student Name</label>
                            <input type="text"required name= "studentname">
                        </div>

                        <div class="input-field">
                            <label>Student Passport NO.</label>
                            <input type="text"required name= "studentPassportNo" >
                        </div>
                        
                        <div class="input-field">
                        <label>Country</label>
                            <input type="text"required name= country>
                        </div>

                        <div class="input-field">
                            <label>Date</label>
                            <input type="date"required name= sdate>
                        </div>

                        <div class="input-field">
                            <label>Units</label>
                            <input type="text"name= units>
                        </div>

                        <div class="input-field">
                            <label>Level</label>
                            <select required name= Levl>
                                <option disabled selected>Select</option>
                                <option>Starter 1</option>
                                <option>Starter 2</option>
                                <option>Starter 3</option>
                                <option>Elementary 1</option>
                                <option>Elementary 2</option>
                                <option>Elementary 3</option>
                                <option>Preintermediate 1</option>
                                <option>Preintermediate 2</option>
                                <option>Preintermediate 3</option>
                                <option>Intermediate 1</option>
                                <option>Intermediate 2</option>
                                <option>Intermediate 3</option>
                                <option>Advance 1</option>
                                <option>Advance 2</option>
                                <option>Advance 3</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Teacher Name</label>
                            <input type="text"name= TeacherName>
                        </div>

                        




                   
                   
                    </div>
                
                        
                        <button class="sumbit" value="apply" name="apply">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div> 
            </div>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>