<?php

require_once "./Website/Video-game-website/includes/db.php";
require_once "./Website/Video-game-website/classes/Database.php";

$db = new Database();

$con = $db->getConnection();

$errors = [];
$success = false;

$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if (empty($username)) {
    $errors['username'] = 'Username is required';
} elseif (strlen($username) < 4) {
    $errors['username'] = 'Username must be at least 4 characters';
}

if (empty($email)) {
    $errors['email'] = 'Email is required';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Invalid email format';
}

if (empty($password)) {
    $errors['password'] = 'Password is required';
} elseif (strlen($password) < 8) {
    $errors['password'] = 'Password must be at least 8 characters';
}

if ($password !== $confirm_password) {
    $errors['confirm_password'] = 'Passwords do not match';
}

if (empty($errors)) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $querry = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
}

?>