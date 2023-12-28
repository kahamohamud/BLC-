<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "management_system";

session_start();
error_reporting(E_ALL); // Enable error reporting

$connection = mysqli_connect($host, $user, $password, $db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST['UserName'];
    $password = $_POST['Password'];
    $select = "SELECT * FROM Authintication WHERE UserName = '$userName' AND staffPassword = '$password'";
    $result = mysqli_query($connection, $select);
    $row = mysqli_fetch_array($result);

    if ($row) {
        $_SESSION['loggedin'] = 1; // Set the session variable
        if ($row["user_type"] == "Admin") {
            header('location: Dashboard.php');
        } elseif ($row["user_type"] == "Acadamic") {
            header('location: academichome.php');
        } elseif ($row["user_type"] == "Marketing") {
            header('location: marketinghome.php');
        }
        elseif ($row["user_type"] == "Accounting") {
            header('location: Accountinghome.php');
        }
    } 
    else {
      $_SESSION['message'] = "User name or password do not match";
      header("location: stafflogin.php");
      exit(); // Stop further execution
  }
  
}
?>
