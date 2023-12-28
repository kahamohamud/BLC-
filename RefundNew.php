<?php

$host="localhost";//database 
$user="root";
$password="";
$db="management_system";




session_start();

if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] !== 1 && !isset($_GET['logout']))) {
    header("Location: stafflogin.php");
    exit();
  }

$connection = mysqli_connect($host, $user, $password, $db);
if (!$connection) {
    die("Connection error: " . mysqli_connect_error());
}


// Fetch the list of students for autocomplete
$sql = "SELECT studentName FROM student";
$result = mysqli_query($connection, $sql);

$students = array();
while ($row = mysqli_fetch_assoc($result)) {
    $students[] = $row['studentName'];
}


if(isset($_POST['Acapply']))

{

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

    if ($studentDetails === null) {
        // Handle the case when the student details are not found
        echo "Student not found";
    } else {


    $RDate = $_POST['RDate'];
    $RefundRef = $_POST['RefundRef'];
    $Level = $_POST['Level'];
    $TotalRefund = $_POST['TotalRefund'];
    $Reason = $_POST['Reason'];
    $RefundM = $_POST['RefundM'];

    // Retrieve the auto-filled nationality and passport number from the $_POST array
$studentNationality = $_POST['studentNationality'];
$studentPassportNo = $_POST['studentPassportNo'];

    $sql="INSERT INTO refund(studentName,studentNationality,studentPassportNo,RDate,RefundRef,Level,TotalRefund,Reason,RefundM)VALUES (
    '$studentName','$studentNationality','$studentPassportNo','$RDate', '$RefundRef','$Level','$TotalRefund','$Reason','$RefundM')";

    $result=mysqli_query($connection,$sql);

    if($result)
    {
        $_SESSION['message']= "your application sent seccessfuly";
        
        header("location:refund.php");

    }

    else
    {
        echo "apply failed";
    }
    

}


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
    <link rel="stylesheet" href="AdmissionNew.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
   <script src="script1.js"></script>

    <title>Refund form</title> 
</head>
<body>
<div class="overlay">
    <div class="container">
        <header>Refund Statement</header>

        <form action="#" method="POST">
            <div class="form first">
                <div class="details personal">
                    

                    <div class="fields">
                    <div class="input-field">
                        <label>REF NO</label>
                        <input type="hidden" name="RefundRef" value="<?php echo uniqid(); ?>">
                        </div>
                         <!-- new code here -->
                         <div class="input-field">
    <label>Search for Student</label>
    <input type="text" id="searchStudent" name="studentName" list="studentSuggestions" autocomplete="off" onchange="fillStudentDetails()">
    <datalist id="studentSuggestions">
        <?php
        if (isset($students)) {
            foreach ($students as $student) {
                echo "<option value='$student'>";
            }
        }
        ?>
    </datalist>
</div>
<script>
    $(document).ready(function() {
        // Trigger autocomplete when typing in the student name field
        $("#searchStudent").on("input", function() {
            var searchTerm = $(this).val();
            if (searchTerm.length > 2) {
                triggerAutocomplete(searchTerm);
            }
        });
    });
</script>

                        <!-- till here -->
                        <div class="input-field">
    <div><label>Nationality</label></div>
    <input type="text" required name="studentNationality" id="studentNationality" value="">
</div> 
<div class="input-field">
    <div><label>Passport Number</label></div>
    <input type="text" required name="studentPassportNo" id="studentPassportNo" value="">
</div> 
                        <div class="input-field">
                            <label>Level</label>
                            <select required name= Level>
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
                            <label>Date</label>
                            <input type="date"name= "RDate">
                        </div>
                        <div class="input-field">
                                <div><label>Payment Method</label></div>
                                <select required name="RefundM">
                                    <option disabled selected>Select</option>
                                    <option>Cash</option>
                                    <option>Credit/Debit Card</option>
                                    <option>Paypal</option>
                                    <option>TT</option>
                                    <option>Local Bank Transfer</option>
                                    <option>Westren Union</option>
                                    <option>Cash Deposit</option>
                                    <option>Others</option>
                                </select>   
                            </div>
                        <div class="input-field">
                            <label>Total Refund</label>
                            <input type="number"required name= "TotalRefund">
                        </div> 
                        <div class="input-field">
                            <label>Reason of Refund</label>
                            <input type="text"required name= "Reason">
                        </div>
                        
                    </div>
                        <button class="sumbit" value="Acapply" name="Acapply">
                            <span class="btnText">Issue Refund</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div> 
            </div>
        </form>
        <button class="submit" onclick="location.href='refund.php'"> <i class="fas fa-arrow-left"></i> </button>
    </div>
    </div>
    <script src="script.js"></script>
</body>
</html>