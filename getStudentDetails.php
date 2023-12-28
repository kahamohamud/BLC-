<?php
// Establish database connection (similar to invoicenew.php)
$host = "localhost";
$user = "root";
$password = "";
$db = "management_system";
$connection = mysqli_connect($host, $user, $password, $db);
if (!$connection) {
    die("Connection error: " . mysqli_connect_error());
}

if (isset($_POST['studentName'])) {
    // Function to get student details based on the selected student name
    function getStudentDetails($connection, $studentName) {
        $sql = "SELECT studentNationality, studentPassportNo, studentID FROM student WHERE studentName = '$studentName'";
        $result = mysqli_query($connection, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                return array(
                    'studentNationality' => $row['studentNationality'],
                    'studentPassportNo' => $row['studentPassportNo'],
                    'studentID' => $row['studentID'],
                    // Add other fields here if needed
                );
            } else {
                // No matching student found
                return null;
            }
        } else {
            // Database query error
            return null;
        }
    }

    $studentName = $_POST['studentName'];
    $studentDetails = getStudentDetails($connection, $studentName);

    // Return the student details as JSON
    echo json_encode($studentDetails);
}
?>
