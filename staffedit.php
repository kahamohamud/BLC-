<?php


$host="localhost";
$user="root";
$password="";
$db="management_system";


session_start();
if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] !== 1 && !isset($_GET['logout']))) {
    header("Location: stafflogin.php");
    exit();
  }

$connection=mysqli_connect($host,$user,$password,$db);

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
        <header>Staff Update</header>
        <form method="POST" action="#">
            
                
<?php

if ($_GET['staffID']){
    $staffID=$_GET['staffID'];
 
 
  $select="select * from authintication where idAuthintication='".$staffID."'";
  $result=mysqli_query($connection,$select); 
  $info=$result->fetch_assoc();

  if (isset($_POST['Update']))

{
    $data_Position=$_POST['Position'];
    $data_Name=$_POST['Name'];
    $data_Username=$_POST['Uname'];
    $data_Password=$_POST['Password'];
   


    $sql="UPDATE authintication SET staffName='$data_Name', UserName='$data_Username', staffPassword='$data_Password', user_type='$data_Position' WHERE idAuthintication='$staffID'";


    $result2=mysqli_query($connection,$sql);

    if($result2)
    {
        echo"your application sent seccessfuly";
        
        header("location:Staffm.php");

    }

    else
    {
        echo "apply failed";
    }


}

?>
<div class="form first">
<div class="details personal">

                    <div class="input-field">
                    <div><label>Position</label></div>
                    <select required name="Position">
                        <option disabled selected></option>
                        <option <?php if ($info['user_type'] == 'Admin') echo 'selected'; ?>>Admin</option>
                        <option <?php if ($info['user_type'] == 'Academic') echo 'selected'; ?>>Academic</option>
                        <option <?php if ($info['user_type'] == 'Marketing') echo 'selected'; ?>>Marketing</option>
                        <option <?php if ($info['user_type'] == 'Accounting') echo 'selected'; ?>>Accounting</option>
                        </select>
                    </div>
                    
                    <div class="fields">
                    <div class="input-field">
                        
                        <div><label>New Name</label> 
                        <input type="text"required name="Name" value="<?php echo"{$info['staffName']}";?>">
                    </div>
                </div>
                    <div class="input-field">
                         
                        <div class="input-field">
                            <label>New UserName</label>
                        <div>
                            <input type="text"required name="Uname" value="<?php echo"{$info['UserName']}";?>"></div>
                        </div>
                        <div class="input-field">
                            <label>New Password</label>
                        <div>
                            <input type="password"required name="Password" value="<?php echo"{$info['staffPassword']}";?>" ></div>
                        </div>
                    </div>
                    </div>
                    <button class="search-btn"  name="Update" value= "Update">Save</button>
                    
                    </form>
                    
            </div>
        </div>
    
</div>

</form>
  <?php
 }

  


  
  ?>
<button class="submit" onclick="location.href='staffm.php'"> <i class="fas fa-arrow-left"></i> </button>
</body>
</html>