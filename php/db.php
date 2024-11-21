<?php
$host = 'localhost'; // Your database host
$dbname = 'Your_database_name'; 
$username = 'Your_database_username'; 
$password = 'Your_database_password'; 

try {
    // Adding charset to the connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>