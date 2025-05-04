<?php
require_once 'classes/Database.php';
session_start();
$success = $error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    if (strlen($message) >= 10 && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $pdo = (new Database())->getConnection();
        $stmt = $pdo->prepare("INSERT INTO messages (name, email, message, created_at) VALUES (?, ?, ?, NOW())");
        if ($stmt->execute([$name, $email, $message])) {
            $success = "Message sent, thank you for support!";
        } else {
            $error = "Error saving message.";
        }
    } else {
        $error = "Invalid input.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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

    <section class="contact"> 
        <div class="container mt-5">
            <h2>Write us!</h2>

            <?php if ($success): ?>
                <div class="alert alert-success"><?= $success ?></div>
            <?php elseif ($error): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>

            <form id="contactForm" method="POST" action="contact.php">
                <div id="ErrorMassage"></div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message (at least 10 characters long):</label>
                    <textarea class="form-control" id="message" name="message" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
    
    <div class="custom-break"></div>

    <section class="info text-center">
        <h2>Contact information</h2>
        <p><b>Email:</b> testing.gmail.com</p>
        <p><b>Phone:</b> 20 225 269</p>
        <p><b>Address:</b> 	Elizabetes iela 55, Rīga, Latvia</p>
    </section>
    
    <footer id="footer" class="text-center mt-5">
        <p>&copy; <span id="years_before"></span><span id="corrent_year"></span> Our Website. All rights reserved. 
        <a href="https://www.instagram.com/">Instagram</a>, <a href="https://x.com/">X</a></p>
    </footer>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('contactForm');
        const errorBox = document.getElementById('ErrorMassage');

        form.addEventListener('submit', function (e) {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const message = document.getElementById('message').value.trim();

            errorBox.innerHTML = "";
            if (name === "" || !email.includes('@') || message.length < 10) {
                e.preventDefault();
                errorBox.innerHTML = '<div class="alert alert-danger">Please fill out the form correctly.</div>';
            }
        });
    });
    </script>

    <script src="js/DarkTheme.js"></script>
    <script src="js/script.js"></script>
    <script src="js/toggle.js"></script>

</body>
</html>
