<?php

$host = "localhost";
$username = "root";
$password = "arturs2003";
$database = "webdev_project";
$port = 4306;

try {

    $con = new PDO("mysql:host=$host;port=$port;dbname=$database", $username, $password);

} catch (PDOException $e) {
    die("Connection faled: " . $e->getMessage());
}

?>