<?php

error_reporting(0);
session_start();
if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] !== 1 && !isset($_GET['logout']))) {
    header("Location: stafflogin.php");
    exit();
  }
// session_destroy();

if($_SESSION['message'])
{
    $message=$_SESSION['message'];

    echo "<script type='text/javascript'>
    alert('$message'); 
    </script>";
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
    <link rel="stylesheet" href="style22.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!--<title>Responsive Regisration Form </title>--> 
</head>
<body>
<div class="overlay">
    <div class="container">
        <header>Staff Regestration</header>

        <form action="data_checkstaff.php" method="POST">
            <div class="form first">
                <div class="details personal">
                    
                    <div class="input-field">
                    <div><label>Position</label></div>
                        <select required name="Position">
                            <option disabled selected>Select</option>
                            <option>Admin</option>
                            <option>Acadamic</option>
                            <option>Marketing</option>
                            <option>Accounting</option>
                        </select>
                    </div>
                    
                    <div class="fields">
                    <div class="input-field">
                        
                        <div><label>Name</label> 
                        <input type="text"required name="Name">
                    </div>
                </div>
                    <div class="input-field">
                         
                        <div class="input-field">
                            <label>User Name</label>
                        <div>
                            <input type="text"required name="Uname"></div>
                        </div>
                        <div class="input-field">
                            <label>Password</label>
                        <div>
                            <input type="password"required name="Password"></div>
                        </div>
                    </div>
                    </div>
                    
                    <script src="script22.js"></script>
                <button class="sumbit" value="apply" name="apply">
                    <span class="btnText">Submit</span>
                    <i class="uil uil-navigator"></i>
                </button>
                    </form>
                    
            </div>
        </div>
    
    
</div>
<!-- here -->
<button class="submit" onclick="location.href='staffm.php'"> <i class="fas fa-arrow-left"></i> </button>
</body>
</html>