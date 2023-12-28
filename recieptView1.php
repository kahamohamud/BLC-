<?php
error_reporting(0);
$host = "localhost";
$user = "root";
$password = "";
$db = "management_system";

session_start();

$connection = mysqli_connect($host, $user, $password, $db);

error_reporting(0);

// session_destroy();

if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] !== 1 && !isset($_GET['logout']))) {
    header("Location: stafflogin.php");
    exit();
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
        <div class="container">
            <header>Receipt Statement</header>
            <form action="reciept.php" method="POST">
            <?php
            if (isset($_GET['recieptV'])) {
                $AcEdit = $_GET['recieptV'];
            
                $select = "SELECT * FROM receipt WHERE Rref='$AcEdit'";
                $result = mysqli_query($connection, $select);
                $info = $result->fetch_assoc();
            }
             
              ?>
            <br>

                <div class="form first">
                    <div class="details personal">
                        <div class="fields">
                            <div class="input-field">
                                <label>REF NO</label>
                                <input type="hidden" name="Rref" value="<?php echo $info['Rref']; ?>">
                            </div>
                            <div class="input-field">
                                <label>Student Name</label>
                                <input type="text" required name="studentName" value="<?php echo $info['studentName']; ?>">
                            </div>
                            <div class="input-field">
                                <label>Date</label>
                                <input type="date" name="Date" onkeypress="return onlyNumberKey(event)" maxlength="11" size="50%" value="<?php echo $info['Date']; ?>">
                            </div>
                            <div class="input-field">
                                <div><label>Payment Method</label></div>
                                <select required name="PaymentM">
                                    <option disabled selected>Select</option>
                                    <option <?php if ($info['PaymentM'] == 'Cash') echo 'selected'; ?>>Cash</option>
                                    <option <?php if ($info['PaymentM'] == 'Credit/Debit Card') echo 'selected'; ?>>Credit/Debit Card</option>
                                    <option <?php if ($info['PaymentM'] == 'Paypal') echo 'selected'; ?>>Paypal</option>
                                    <option <?php if ($info['PaymentM'] == 'TT') echo 'selected'; ?>>TT</option>
                                    <option <?php if ($info['PaymentM'] == 'Local Bank Transfer') echo 'selected'; ?>>Local Bank Transfer</option>
                                    <option <?php if ($info['PaymentM'] == 'Westren Union') echo 'selected'; ?>>Westren Union</option>
                                    <option <?php if ($info['PaymentM'] == 'Cash Deposit') echo 'selected'; ?>>Cash Deposit</option>
                                </select>   
                            </div>
                            <div class="input-field">
                                <label>Paid Amount in RM</label>
                                <input type="text" required name="PaidAmount" value="<?php echo $info['PaidAmount']; ?>">
                            </div>
                            <div class="input-field">
                                <label>Being Payment Of</label>
                                <input type="text" required name="PaymentOf" value="<?php echo $info['PaymentOf']; ?>">
                            </div>
                            <div class="input-field">
                                <label>Amount in Number</label>
                                <input type="number" required name="PaidInNumber" value="<?php echo $info['PaidInNumber']; ?>">
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
