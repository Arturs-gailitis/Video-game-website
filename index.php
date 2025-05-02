<?php
session_start();
$welcomeBack = '';

if (isset($_SESSION['user_id']) && isset($_COOKIE['username'])) {
    $lastVisit = $_COOKIE['last_visit'] ?? 'a while ago';
    $welcomeBack = "Welcome back, " . htmlspecialchars($_COOKIE['username']) . "! Last visit: " . $lastVisit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                <ul class="navbar-nav">
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

    <?php if (!empty($welcomeBack)): ?>
        <div class="container mt-3">
            <div class="alert alert-info text-center"><?php echo $welcomeBack; ?></div>
        </div>
    <?php endif; ?>

    <section class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="jumbotron bg-light p-4">
                    <h1 class="display-4">Welcome to our website about video games</h1>
                    <p class="lead">Discover the world of video games and other cool stuff.</p>
                    <hr class="my-4">
                    <p>We provide the latest updates and insights on video games for newcomers and enthusiasts alike.</p>
                    <a class="btn btn-primary btn-lg" href="services.php" role="button">Get Started</a>
                </div>
            </div>
        </div>
    </section>

    <div class="custom-break"></div>

    <section class="feature_section">
        <h2>About our site</h2>
        <p><b>This website is for people who doesn't really know about video games.</b></p>
        <p><b>And of course, provide the latest information about video games.</b></p>
    </section>

    <div class="custom-break"></div>

    <section class="column">
        <h2>Important section</h2>
        <p><b>This list provides basic information that will be in this website</b></p>
        <ul>
            <li>Gameplay Mechanics</li>
            <li>Graphics and Visual Effects</li>
            <li>Narrative & World Building</li>
            <li>Multiplayer and Social Features</li>
            <li>Audio and Sound Design</li>
        </ul>
    </section>

    <footer id="footer">
        <p>&copy; <span id="years_before"></span><span id="corrent_year"></span> Our Website. All rights reserved. 
        <a href="https://www.instagram.com/">Instagram</a>, <a href="https://x.com/?mx=2">X</a></p>
    </footer>

    <script src="js/DarkTheme.js"></script>
    <script src="js/script.js"></script>
    <script src="js/toggle.js"></script>

</body>
</html>
