<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "management_system";

session_start();

$connection = mysqli_connect($host, $user, $password, $db);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID = $_POST['ID'];

    // Use prepared statements to avoid SQL injection
    $select = "SELECT * FROM acadimic WHERE studentpassportno=?";
    $stmt = mysqli_prepare($connection, $select);
    mysqli_stmt_bind_param($stmt, "s", $ID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }

    // Check if there is a row with the given studentpassportno
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['loggedin'] = 1;
        header("location: studentresults.php?studentID={$row['ID']}");
        exit; // Exit to prevent further execution
    } else {
        $_SESSION['loggedin'] = 0;
        echo "This ID does not match any record";
    }
}
?>
