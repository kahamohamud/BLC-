<?php
$host = "localhost"; // database 
$user = "root";
$password = "";
$db = "management_system";

include('DHeader.php'); // header file
// include('footer.php'); 
session_start();
error_reporting(0);
// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== 1) {
//       header("Location: stafflogin.php");
//       exit();
//   }

$connection = mysqli_connect($host, $user, $password, $db);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT COUNT(*) AS total_records FROM offerletter";
$result = mysqli_query($connection, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalOfferLetters = $row['total_records'];
} else {
    $totalOfferLetters = 0; // Default value in case of an error
}

$sqlCompletedStudents = "SELECT COUNT(*) AS total_completed_students FROM student WHERE status = 'completed'";
$resultCompletedStudents = mysqli_query($connection, $sqlCompletedStudents);

if ($resultCompletedStudents) {
    $rowCompletedStudents = mysqli_fetch_assoc($resultCompletedStudents);
    $totalCompletedStudents = $rowCompletedStudents['total_completed_students'];
} else {
    $totalCompletedStudents = 0; // Default value in case of an error
}

$sql = "SELECT COUNT(*) AS total_students FROM student";
$result = mysqli_query($connection, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalstudents = $row['total_students'];
} else {
    $totalstudents = 0; // Default value in case of an error
}



// Close the database connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Dashboard.css">
    <link rel="stylesheet" href="Dheader.css">
    <link rel="stylesheet" href="Footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
    <link rel="stylesheet" href="menu.css"> <!-- Add the menu CSS -->
        <!-- Montserrat Font -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Admin Home</title>
</head>
<body>
<?php
if ($_SESSION['message']) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
<header>
<div class="overlay">
        <h1>BRITANNIA LANGUAGE CENTRE</h1>
    </div>
    <div class="button-container">
        <a href="logout.php"><button class="button-6" role="button">Logout</button></a>
    </div>
    <input type="checkbox" id="menu-toggle"> 
    <label for="menu-toggle">
        <img id="logo" src="logo2.png" alt="Logo">
    </label>
    
    <div class="menu-container">
        <ul class="menu-list">
            <li><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i> Admission</a></li>
            <li><a href="#"><i class="fas fa-user"></i> Offer Letter</a></li>
            <li class="dropdown">
            <a href="#"><i class="fas fa-cog"></i> Accounting <i class="fas fa-angle-down"></i></a>
                <div class="dropdown-content">
                    <br>
                    <a href="#">- Invoice Record</a>
                    <br>
                    <a href="#">- Reciept Statment</a>
                    <br>
                    <a href="#">- Refund Statment</a>
                </div>
            </li>
            <li><a href="#"><i class="fas fa-sign-out-alt"></i> Academic</a></li>
            <li><a href="#"><i class="fas fa-sign-out-alt"></i> Manage Class</a></li>
            <li><a href="#"><i class="fas fa-sign-out-alt"></i> Manage Staff</a></li>
        </ul>
    </div>
</header>
<!-- Title -->

<div class="title-container">
    <h2>DASHBOARD</h2>
    <h3>Accounting Dashboard</h3>
</div>
<hr class="title-hr"> 
<br>
<br>

<main class="main-container">
    <div class="main-cards">

        <div class="card">
            <div class="card-inner">
                <p class="text-primary">COMPLETE STUDENTS</p>
                <span class="material-icons-outlined text-green icon-small">done</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $totalCompletedStudents;; ?></span>
        </div>

        <div class="card">
            <div class="card-inner">
                <p class="text-primary">TOTAL OFFER LETTER</p>
                <span class="material-icons-outlined text-orange icon-small">description</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $totalOfferLetters; ?></span>
        </div>

        <div class="card">
            <div class="card-inner">
                <p class="text-primary">TOTAL STUDENTS</p>
                <span class="material-icons-outlined text-blue icon-small">group</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $totalstudents; ?></span>
        </div>

    </div>
<!-- Bar Graph -->
<div class="chart-container">
    <h4 class="chart-title">Student Performance Ranges</h4>
    <div class="charts">
        <?php
        // Database connection setup (similar to your existing code)
        $connection = mysqli_connect($host, $user, $password, $db);
        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Performance ranges and labels
// Define the performance ranges and labels
$performanceRanges = array(
    array("80-100", "Excellent"),
    array("70-79", "Good"),
    array("60-69", "Average"),
    array("0-59", "Below Average")
);

// Initialize an array to hold counts for each range
$rangeCounts = array_fill(0, count($performanceRanges), 0);

// Fetch data for each individual value in TotalP column
$sql = "SELECT TotalP FROM acadimic";
$result = mysqli_query($connection, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $totalP = $row['TotalP'];
        
        // Determine which range the value falls into
        foreach ($performanceRanges as $index => $range) {
            list($rangeStart, $rangeEnd) = explode('-', $range[0]);
            if ($totalP >= $rangeStart && $totalP <= $rangeEnd) {
                $rangeCounts[$index]++;
                break;
            }
        }
    }
    
    // Display the bar graph for each range
    for ($i = 0; $i < count($performanceRanges); $i++) {
        $label = $performanceRanges[$i][1];
        $total = $rangeCounts[$i];
        
        // Output bar graph element
        echo '<div class="chart">
                <div class="bar" style="height: ' . ($total * 50) . 'px;"></div>
                <div class="chart-label">' . $label . ' (' . $total . ')</div>
              </div>';
    }
} else {
    // Handle query error
    echo 'Error executing query: ' . mysqli_error($connection);
}



        // Close the database connection
        mysqli_close($connection);
        ?>
    </div>
</div>
<div class="pie-chart-container" style="overflow-y: auto; max-height: 400px;">
    <h4 class="chart-title">Student Sources</h4>
    <canvas id="studentSourcesChart"></canvas>
</div>


<script>
    // Get the data for student sources from your PHP code
    <?php
    // Fetch data from the student table about column
    $sources = array("Agent", "Newspaper", "Event/ fair", "Internet/ social media", "Friend", "School/ Counselor");
    $sourceCounts = array_fill(0, count($sources), 0);
    
    $connection = mysqli_connect($host, $user, $password, $db);
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "SELECT about FROM student";
    $result = mysqli_query($connection, $sql);
    
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $about = $row['about'];
            $sourceIndex = array_search($about, $sources);
            if ($sourceIndex !== false) {
                $sourceCounts[$sourceIndex]++;
            }
        }
    }
    ?>
    
    // Create the pie chart using Chart.js
    var sourcesData = {
        labels: <?php echo json_encode($sources); ?>,
        datasets: [{
            data: <?php echo json_encode($sourceCounts); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)',
                'rgba(255, 159, 64, 0.7)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    };
    
    var ctx = document.getElementById('studentSourcesChart').getContext('2d');
    var studentSourcesChart = new Chart(ctx, {
        type: 'pie',
        data: sourcesData,
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>
</main>

<!-- End Main -->


</body>
</html>
