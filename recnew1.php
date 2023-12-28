<?php
error_reporting(0);
$host = "localhost";
$user = "root";
$password = "";
$db = "management_system";




// Create a database connection
$connection = mysqli_connect($host, $user, $password, $db);

session_start();

if (!$connection) {
    die("Connection error: " . mysqli_connect_error());
}

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
    $Rref = $_POST['Rref'];
    $studentName = $_POST['studentName'];
    $Date = $_POST['Date'];
    $PaymentM = $_POST['PaymentM'];
    $PaidAmount = $_POST['PaidAmount'];
    $PaymentOf = $_POST['PaymentOf'];
    $PaidInNumber = $_POST['PaidInNumber'];

    $sql = "INSERT INTO receipt(Rref, studentName, Date, PaymentM, PaidAmount, PaymentOf, PaidInNumber) VALUES (
    '$Rref', '$studentName', '$Date', '$PaymentM', '$PaidAmount', '$PaymentOf', '$PaidInNumber')";

    $result = mysqli_query($connection, $sql);

    if ($result) {
        $_SESSION['message'] = "Your application was sent successfully";
        header("location: rechome1.php");
        exit;
    } else {
        echo "Apply failed";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="AdmissionNew.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Receipt Form</title> 
</head>
<body>
    <div class="overlay">
    <script>
            function fetchAutocompleteSuggestions(inputValue) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var suggestions = JSON.parse(this.responseText);
                        populateAutocompleteList(suggestions);
                    }
                };
                xhttp.open("POST", "autocomplete_students.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("searchQuery=" + inputValue);
            }

            function populateAutocompleteList(suggestions) {
                var datalist = document.getElementById("studentSuggestions");
                datalist.innerHTML = ""; // Clear existing options
                suggestions.forEach(function(student) {
                    var option = document.createElement("option");
                    option.value = student;
                    datalist.appendChild(option);
                });
            }

            // Attach the event listener to the input field for autocomplete
            document.getElementById("searchStudent").addEventListener("input", function() {
                var inputValue = this.value;
                if (inputValue.trim() === "") {
                    document.getElementById("studentSuggestions").innerHTML = ""; // Clear the list if no input
                } else {
                    fetchAutocompleteSuggestions(inputValue);
                }
            });
        </script>
        <div class="container">
            <header>Receipt Statement</header>
            <form action="#" method="POST">
            <br>

                <div class="form first">
                    <div class="details personal">
                        <div class="fields">
                            <div class="input-field">
                                <label>REF NO</label>
                                <input type="hidden" name="Rref" value="<?php echo uniqid(); ?>">
                            </div>

                            <!-- new code here -->
                            <div class="input-field">
    <label>Search for Student</label>
    <input type="text" id="searchStudent" name="studentName" list="studentSuggestions" autocomplete="off">
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
                            <!-- till here -->
                            <div class="input-field">
                                <label>Date</label>
                                <input type="date" name="Date" onkeypress="return onlyNumberKey(event)" maxlength="11" size="50%" value="">
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
                                    <option>Westren Union</option>
                                    <option>Cash Deposit</option>
                                    <option>Others</option>
                                </select>   
                            </div>
                            <div class="input-field">
                                <label>Paid Amount in RM</label>
                                <input type="text" required name="PaidAmount" value="">
                            </div>
                            <div class="input-field">
                                <label>Being Payment Of</label>
                                <input type="text" required name="PaymentOf" value="">
                            </div>
                            <div class="input-field">
                                <label>Amount in Number</label>
                                <input type="number" required name="PaidInNumber" value="">
                            </div>
                        </div>
                        <button class="sumbit" value="Acapply" name="Acapply">
                            <span class="btnText">Issue Receipt</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div>
            </form>
            
        </div>
        <button class="submit" onclick="location.href='rechome1.php'"> <i class="fas fa-arrow-left"></i> </button>
    </div>
    <script src="script.js"></script>
</body>
</html>
