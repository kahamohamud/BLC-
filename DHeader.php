<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Dheader.css">
    <link rel="stylesheet" href="menu.css"> <!-- Add the menu CSS -->
        <!-- Montserrat Font -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <title>header</title>
</head>
<body>
<header>
<div class="overlay">
        <h1>DASHBOARD</h1>
    </div>
    <div class="button-container">
        <a href="logout.php"><button class="button-6" role="button">Logout</button></a>
    </div>
    <input type="checkbox" id="menu-toggle" checked>  <!-- Remove the 'checked' attribute -->
    <label for="menu-toggle">
        <img id="logo" src="logo2.png" alt="Logo">
    </label>
    <div class="menu-container">
        <ul class="menu-list">
        <br>
            <li><a href="Admission.php"><i class="fas fa-pen"></i> Admission</a></li>
            <br>
            <br>
            <li><a href="OfferLetter.php"><i class="fas fa-window-restore"></i> Offer Letter</a></li>
            <br>
            <br>
            <li class="dropdown">
            <a href="#"><i class="fas fa-dollar-sign"></i> Accounting <i class="fas fa-angle-down"></i></a>
                <div class="dropdown-content">
                    <br>
                    <a href="Accounting.php">- Invoice Record</a>
                    <br>
                    <a href="rechome.php">- Reciept Statment</a>
                    <br>
                    <a href="Refund.php">- Refund Statment</a>
                </div>
            </li>
            <br>
            <br>
            <li><a href="newacademic.php"><i class="fas fa-book"></i> Academic</a></li>
            <br>
            <br>
            <li><a href="class.php"><i class="far fa-building"></i> Manage Class</a></li>
            <br>
            <br>
            <li><a href="staffm.php"><i class="fas fa-user"></i> Manage Staff</a></li>
        </ul>
    </div>
</header>



<script>
    // JavaScript to toggle the show-dropdown class on Accounting click
    document.addEventListener("DOMContentLoaded", function() {
        const accountingLink = document.querySelector(".menu-list .dropdown > a");

        accountingLink.addEventListener("click", function(event) {
            event.preventDefault();
            accountingLink.closest('.dropdown').classList.toggle("show-dropdown");
        });
    });
</script>

</body>
</html>

