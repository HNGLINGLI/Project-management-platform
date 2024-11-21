<?php
$servername = "localhost"; 
$username = "Your_database_username";        
$password = "Your_database_password";            
$dbname = "Your_database_name";

try {
    // Connect to the database using PDO
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Execute the query
    $stmt = $pdo->query("SELECT engineer_id AS id, name FROM engineers");
    $engineers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($engineers);
    
} catch (PDOException $e) {
    // Handle errors
    echo json_encode(['error' => $e->getMessage()]);
}
?>