<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === 1) {
    // Clear the session variables to log the user out
    session_unset();
    session_destroy();
}

// Redirect the user to the login page after logging out
header("Location: stafflogin.php");
exit();
?>
