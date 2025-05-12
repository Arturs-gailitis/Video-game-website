<?php

require_once "db.php";

try {

    $con = new PDO("mysql:host=$host;port=$port;dbname=$database", $username, $password);

    $servicesPDO = "CREATE TABLE IF NOT EXISTS services (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        description TEXT,
        image VARCHAR(255) NOT NULL
    )";

    $usersPDO = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL
    )";

    $messagesPDO = "CREATE TABLE messages (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        email VARCHAR(255),
        message TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";


    $con->exec($servicesPDO);

    $con->exec($usersPDO);

    $con->exec($messagesPDO);

    echo "<h2>Setup Complete!</h2>";
    echo "<p>Database and tables created successfully.</p>";
    echo "<p>You can now <a href='../index.php'>access the website</a>.</p>";
    
} catch (PDOException $e) {
    die("Connection faled: " . $e->getMessage());
}
?>