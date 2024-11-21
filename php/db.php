<?php
$host = 'localhost'; // Your database host
$dbname = 'project_tracking'; // Your database name
$username = 'hnglingli'; // Your database username
$password = 'Cindy_02052000'; // Your database password

try {
    // Adding charset to the connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>