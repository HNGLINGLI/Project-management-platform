<?php
$host = 'localhost'; // Your database host
$dbname = 'meeting_calendar'; // Your database name
$username = 'Hnglingli'; // Your database username
$password = 'Cindy_0205'; // Your database password

try {
    // Adding charset to the connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>