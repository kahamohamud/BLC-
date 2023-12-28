
<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "management_system";

session_start();
$con = mysqli_connect($host, $user, $password, $db);
$sql = "SELECT studentPic FROM student";

$stmt = mysqli_prepare($con, $sql);
