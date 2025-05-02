<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About the Team</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Video Games Website</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Main Page</a></li>
                <li class="nav-item"><a class="nav-link" href="services.php">List of Services</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About the Team</a></li>
            </ul>
        </div>
        <div class="d-flex">
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="dashboard.php" class="btn btn-success">Dashboard</a>
                <a href="logout.php" class="btn btn-success ml-2">Logout</a>
            <?php else: ?>
                <a href="register.php" class="btn btn-success">Register</a>
                <a href="login.php" class="btn btn-success ml-2">Login</a>
            <?php endif; ?>
            <button id="darkModeToggle" class="btn btn-light ml-2">Toggle Dark Mode</button>
        </div>
    </div>
</nav>

    <div class="container mt-4">
        <h1 class="text-center">About Our Team</h1>
        <div class="row">
            <div class="col-md-4 text-center">
                <h2>John Smith - Head Writer</h2>
                <img src="images/John_Smith.jpeg" class="team-img img-fluid" alt="John Smith">
            </div>
            <div class="col-md-4 text-center">
                <h2>Jack Robinson - Journalist</h2>
                <img src="images/Jack_Robinson.jpeg" class="team-img img-fluid" alt="Jack Robinson" >
            </div>
            <div class="col-md-4 text-center">
                <h2 id="team">Alice Cooper - Assistant Journalist</h2>
                <img src="images/Alice_Cooper.jpeg" class="team-img img-fluid" alt="Alice Cooper">
            </div>
        </div>
    </div>

    <div class="custom-break"></div>

    <div class="container">
        <h2>Our Mission</h2>
        <p><b>
            The main goal of this website is to provide the latest news on video games.
            For new players, we offer guides that help them get started with gaming.
        </b></p>
    </div>

    <div class="custom-break"></div>

    <div class="container">
        <h2>History</h2>
        <ul>
            <li><b>2003:</b> First company magazine about video games was released.</li>
            <li><b>2015:</b> Our company switched from magazine to website.</li>
            <li><b>2019:</b> 1 million users created accounts.</li>
            <li><b>2020:</b> Our company started sponsoring video game tournaments.</li>
            <li><b>2025:</b> 2 million users created accounts.</li>
        </ul>
    </div>

    <footer id="footer" class="text-center mt-4">
        <p>&copy; <span id="years_before"></span><span id="corrent_year"></span> Our Website. All rights reserved. <a href="https://www.instagram.com/">Instagram</a>, <a href="https://x.com/?mx=2">X</a></p>
    </footer>

    <script src="js/DarkTheme.js"></script>
    <script src="js/script.js"></script>
    <script src="js/toggle.js"></script>
    

</body>
</html>