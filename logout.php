<?php
session_start();

$loggedOut = false;
$username = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user_email'])) {
        date_default_timezone_set('America/Chicago');
        
        setcookie("username", $_SESSION['user_email'], time() + (86400 * 30), "/");
        setcookie("last_visit", date("Y-m-d H:i:s"), time() + (86400 * 30), "/");
        $username = $_SESSION['user_email'];
    }

    // Destroy session
    $_SESSION = [];
    session_destroy();
    $loggedOut = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logout</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: darkmagenta;
            font-family: 'Times New Roman', Times, serif;
            color: black;
        }
        .card {
            background-color: darkmagenta;
            border: none;
        }
        .btn-primary {
            background-color: green;
            border-color: black;
        }
        .btn-primary:hover {
            background-color: lightgreen;
            border-color: black;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="card mx-auto text-center p-4" style="max-width: 400px;">
        <h3>Logout</h3>

        <?php if ($loggedOut): ?>
            <p>You have been logged out.</p>
            <?php if (!empty($username)): ?>
                <p>Goodbye, <?php echo htmlspecialchars($username); ?>!</p>
            <?php endif; ?>
            <a href="index.php" class="btn btn-primary mt-3">Return to Home</a>
        <?php else: ?>
            <p>Are you sure you want to log out?</p>
            <form method="POST" action="">
                <button type="submit" class="btn btn-primary mt-3">Log Out</button>
            </form>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
