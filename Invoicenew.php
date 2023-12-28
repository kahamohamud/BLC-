\<?php
error_reporting(0);
$host = "localhost";
$user = "root";
$password = "";
$db = "management_system";

// Create a database connection
$connection = mysqli_connect($host, $user, $password, $db);
if (!$connection) {
    die("Connection error: " . mysqli_connect_error());
}

session_start();

if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] !== 1 && !isset($_GET['logout']))) {
    header("Location: stafflogin.php");
    exit();
  }

// Fetch the list of students for autocomplete
$sql = "SELECT studentName FROM student";
$result = mysqli_query($connection, $sql);

$students = array();
while ($row = mysqli_fetch_assoc($result)) {
    $students[] = $row['studentName'];
}

if (isset($_POST['Acapply'])) {
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
        // Update the corresponding input fields with the fetched data
       // Rest of the code to insert the form data into the database and redirect
$Date = $_POST['Date'];
$Ref = $_POST['Ref'];
$Level = $_POST['Level'];
$Months = $_POST['Months'];
$RegistrationFee = $_POST['RegistrationFee'];
$VisaFee = $_POST['VisaFee'];
$TuitionFee = $_POST['TuitionFee']; 
$SpecialPass = $_POST['SpecialPass']; 
$ShortenFee = $_POST['ShortenFee']; 
$ACFee = $_POST['ACFee']; 
$MFee = $_POST['MFee']; 
$PaymentM = $_POST['PaymentM'];
$StudentType = $_POST['StudentType'];

// Retrieve the auto-filled nationality and passport number from the $_POST array
$studentNationality = $_POST['studentNationality'];
$studentPassportNo = $_POST['studentPassportNo'];
$studentID = $_POST['studentID'];
 
        $TotalFees = $RegistrationFee + $VisaFee + $TuitionFee + $SpecialPass + $ShortenFee + $ACFee + $MFee;

        // Modify the SQL statement to use INSERT
        $sql = "INSERT INTO accounting (StudentType,studentID, studentName, studentNationality, studentPassportNo, Date, Ref, Level, Months, RegistrationFee, VisaFee, TuitionFee, SpecialPass, ShortenFee, ACFee, MFee, TotalFees, PaymentM)
                VALUES ('$StudentType','$studentID','$studentName', '$studentNationality', '$studentPassportNo', '$Date', '$Ref', '$Level', '$Months', '$RegistrationFee', '$VisaFee', '$TuitionFee', '$SpecialPass', '$ShortenFee', '$ACFee', '$MFee', '$TotalFees', '$PaymentM')";

        $result = mysqli_query($connection, $sql);

        if ($result) {
            $_SESSION['message'] = "Your application was sent successfully";
            header("location: accounting.php");
            exit;
        } else {
            echo "Apply failed";
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


    <title>Offer Letter form</title> 

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
<script src="script1.js"></script>



</head>
<body>
<div class="overlay">


     </form>
    <div class="container">
        <header>Finance Statement</header>

        <form action="#" method="POST">
          <div class="form first">
                    <div class="details personal">
                        <div class="fields">
                            <div class="input-field">
                                <label>REF NO</label>
                                <input type="hidden" name="Ref" value="<?php echo uniqid(); ?>">
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
    <div><label>Student ID</label></div>
    <input type="text" required name="studentID" id="studentID" value="">
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
                                <label>Months</label>
                                <input type="text" required name="Months" value="">
                            </div>
                            <div class="input-field">
                                <label>Date</label>
                                <input type="date" name="Date" onkeypress="return onlyNumberKey(event)" maxlength="11" size="50%" value="">
                            </div>
                            <div class="input-field">
                           <div><label>Student Type</label></div>
                            <Select required name= "StudentType">
                            <option disabled selected>Select</option>
                            <option>Visa Application</option>
                            <option>Non-Visa Application</option>
                        </select>   
                        </div>
                            <div class="input-field">
                                <label>Registration Fee</label>
                                <input type="text" required name="RegistrationFee" value="">
                            </div>
                            <div class="input-field">
                                <label>Visa Application Fee</label>
                                <input type="text" required name="VisaFee" value="">
                            </div>
                            <div class="input-field">
                                <label>Tuition Fee</label>
                                <input type="text" required name="TuitionFee" value="">
                            </div>
                            <div class="input-field">
                                <label>Special Pass Fee</label>
                                <input type="text" required name="SpecialPass" value="">
                            </div>
                            <div class="input-field">
                                <label>Shorten Pass Fee</label>
                                <input type="text" required name="ShortenFee" value="">
                            </div>
                            <div class="input-field">
                                <label>Airport Clearance Fee</label>
                                <input type="text" required name="ACFee" value="">
                            </div>
                            <div class="input-field">
                                <label>Miscellaneous Fee</label>
                                <input type="text" required name="MFee" value="">
                            </div>
                            <div class="input-field">
                                <label>Total Fees</label>
                                <input type="number" name="TotalFees" onkeypress="return onlyNumberKey(event)" maxlength="11" size="50%" value="">
                            </div> 
                            <div class="input-field">
                                <div><label>Payment Method</label></div>
                                <select required name="PaymentM">
                                    <option disabled selected>Select</option>
                                    <option>Cash</option>
                                    <option>Credit/Debit Card</option>
                                    <option>Paypal</option>
                                    <option>TT</option>
                                    <option>Local Bank Transfer</option>
                                    <option>Western Union</option>
                                    <option>Cash Deposit</option>
                                    <option>Others</option>
                                </select>   
                            </div>
                        </div>
                        <button class="sumbit" value="Acapply" name="Acapply">
                            <span class="btnText">Issue Invoice</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div> 
            </form>
           
        </div>
        <button class="submit" onclick="location.href='Accounting.php'"> <i class="fas fa-arrow-left"></i> </button>
    </div>
    <script src="script.js"></script>
    
</body>
</html>