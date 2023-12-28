<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "management_system";

$connection = mysqli_connect($host, $user, $password, $db);

// Check if the connection is successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();
error_reporting(0);
// session_destroy();

if ($_SESSION['message']) {
    $message = $_SESSION['message'];

    echo "<script type='text/javascript'>
    alert('$message');
    </script>";
}
if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] !== 1 && !isset($_GET['logout']))) {
    header("Location: stafflogin.php");
    exit();
  }
?>

<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Iconscout CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Class Management</title>
</head>

<body>
    <div class="overlay">
        <div class="container">
            <header>Edit class</header>
            <form method="POST" action="#">
                <?php
                if ($_GET['classID']) {
                    $classID = $_GET['classID'];

                    $select = "SELECT * FROM class WHERE classID='" . $classID . "'";
                    $result = mysqli_query($connection, $select);
                    $info = $result->fetch_assoc();

                    if (isset($_POST['Update'])) {
                        $data_classID = $_POST['classID'];
                        $data_level = $_POST['Level'];
                        $ClassVenue = $_POST['ClassVenue'];
                        $data_prog = $_POST['prog'];
                        $data_date = $_POST['Date'];
                        $data_Time = $_POST['Time'];
                        $data_Time1 = $_POST['Time1'];
                        $data_Tname = $_POST['TeacherName'];

                        $sql = "UPDATE class SET classID='$data_classID', Level='$data_level', ClassVenue='$ClassVenue', prog='$data_prog', Date='$data_date', Time='$data_Time', TeacherName='$data_Tname',Time1 ='$data_Time1' WHERE classID='$classID'";

                        $result2 = mysqli_query($connection, $sql);

                        if ($result2) {
                            echo "Your application was updated successfully";
                            header("location:class.php");
                            exit(); // Added exit() to stop further execution
                        } else {
                            echo "Update failed";
                        }
                    }
                }
                ?>
                <div class="form first">
                    <div class="details personal">
                        <div class="fields">
                            <div class="input-field">
                                <label>Class ID</label>
                                <input type="hidden" name="classID" value="<?php echo $info['classID']; ?>">
                            </div>
                            <div class="input-field">
                        <label>Class Venue</label>
                            <input type="Text"required name= "ClassVenue" value="<?php echo $info['ClassVenue']; ?>">
                        </div>
                            <div class="input-field">
                                <label>Level</label>
                                <select required name="Level">
                                    <option disabled></option>
                                    <option <?php if ($info['Level'] == 'Starter 1') echo 'selected'; ?>>Starter 1
                                    </option>
                                    <option <?php if ($info['Level'] == 'Starter 2') echo 'selected'; ?>>Starter 2
                                    </option>
                                    <option <?php if ($info['Level'] == 'Starter 3') echo 'selected'; ?>>Starter 3
                                    </option>
                                    <option <?php if ($info['Level'] == 'Elementary 1') echo 'selected'; ?>>Elementary
                                        1</option>
                                    <option <?php if ($info['Level'] == 'Elementary 2') echo 'selected'; ?>>Elementary
                                        2</option>
                                    <option <?php if ($info['Level'] == 'Elementary 3') echo 'selected'; ?>>Elementary
                                        3</option>
                                    <option <?php if ($info['Level'] == 'Preintermediate 1') echo 'selected'; ?>>
                                        Preintermediate 1</option>
                                    <option <?php if ($info['Level'] == 'Preintermediate 2') echo 'selected'; ?>>
                                        Preintermediate 2</option>
                                    <option <?php if ($info['Level'] == 'Preintermediate 3') echo 'selected'; ?>>
                                        Preintermediate 3</option>
                                    <option <?php if ($info['Level'] == 'Intermediate 1') echo 'selected'; ?>>
                                        Intermediate 1</option>
                                    <option <?php if ($info['Level'] == 'Intermediate 2') echo 'selected'; ?>>
                                        Intermediate 2</option>
                                    <option <?php if ($info['Level'] == 'Intermediate 3') echo 'selected'; ?>>
                                        Intermediate 3</option>
                                    <option <?php if ($info['Level'] == 'Advance 1') echo 'selected'; ?>>Advance 1
                                    </option>
                                    <option <?php if ($info['Level'] == 'Advance 2') echo 'selected'; ?>>Advance 2
                                    </option>
                                    <option <?php if ($info['Level'] == 'Advance 3') echo 'selected'; ?>>Advance 3
                                    </option>
                                </select>
                            </div>
                            <div class="input-field">
                                <div><label>PROGRAMME</label></div>
                                <select required name="prog">
                                    <option disabled></option>
                                    <option <?php if ($info['prog'] == 'GENERAL ENGLISH COURSE (GES)') echo 'selected'; ?>>
                                        GENERAL ENGLISH COURSE (GES)</option>
                                    <option <?php if ($info['prog'] == 'INTENSIVE ENGLISH COURSE (IES)') echo 'selected'; ?>>
                                        INTENSIVE ENGLISH COURSE (IES)</option>
                                    <option <?php if ($info['prog'] == 'IELTS PREPARATION COURSE (IELTS)') echo 'selected'; ?>>
                                        IELTS PREPARATION COURSE (IELTS)</option>
                                    <option <?php if ($info['prog'] == 'ENGLISH FOR KIDS (EFK)') echo 'selected'; ?>>
                                        ENGLISH FOR KIDS (EFK)</option>
                                </select>
                            </div>
                            <div class="input-field">
                                <label>Teacher Name</label>
                                <select name="TeacherName" required>
                                    <?php
                                    // Fetch the names of all academic staff from the authentication table
                                    $sql = "SELECT idAuthintication, staffName FROM authintication WHERE user_type='Acadamic'";
                                    $result = mysqli_query($connection, $sql);

                                    // Create a dropdown list of teacher names
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $selected = ($row['staffName'] == $info['TeacherName']) ? "selected" : "";
                                        echo "<option value='" . $row['staffName'] . "' " . $selected . ">" . $row['staffName'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="input-field">
                                <label>Date</label>
                                <input type="date" required name="Date" value="<?php echo "{$info['Date']}"; ?>">
                            </div>
                            <div class="input-field">
                                <label>Start Time</label>
                                <input type="time" required name="Time" value="<?php echo "{$info['Time']}"; ?>">
                            </div>
                            <div class="input-field">
                                <label>End Time</label>
                                <input type="time" required name="Time1" value="<?php echo "{$info['Time1']}"; ?>">
                            </div>
                        </div>
                        <button class="submit" value="Update" name="Update">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <button class="submit" onclick="location.href='class.php'"> <i class="fas fa-arrow-left"></i> </button>
    </div>
    <script src="script.js"></script>
    
</body>
</html>
