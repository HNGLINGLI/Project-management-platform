<?php
$host = 'localhost'; // Your database host
$dbname = 'project_tracking'; // Your database name
$username = 'root'; // Your database username
$password = ''; // Your database password

try {
    // Adding charset to the connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>